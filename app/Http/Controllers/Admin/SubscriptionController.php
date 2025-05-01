<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use App\Models\Shop;
use App\Models\Notification;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SubscriptionController extends Controller
{
    /**
     * Display all subscriptions.
     *
     * @return \Illuminate\View\View
     */
    public function all()
    {
        $subscriptions = Subscription::with(['user', 'shop', 'plan'])
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('admin.subscriptions.all', compact('subscriptions'));
    }

    /**
     * Display pending subscriptions.
     *
     * @return \Illuminate\View\View
     */
    public function pending()
    {
        $pendingSubscriptions = Subscription::with(['user', 'shop', 'plan'])
            ->where('status', 'pending')
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('admin.subscriptions.pending', compact('pendingSubscriptions'));
    }

    /**
     * Display subscription details.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $subscription = Subscription::with(['user', 'shop', 'plan'])
            ->findOrFail($id);

        return view('admin.subscriptions.show', compact('subscription'));
    }

    /**
     * Approve a subscription.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function approve($id)
    {
        // Récupérer l'abonnement
        $subscription = Subscription::findOrFail($id);
        
        // Mettre à jour le statut de l'abonnement
        $subscription->status = 'active';
        $subscription->starts_at = now();
        $subscription->ends_at = now()->addDays(10); // Ou la durée définie dans le plan
        $subscription->save();
        
        // Mettre à jour le statut de la boutique
        $shop = Shop::findOrFail($subscription->shop_id);
        // Correction ici - ajouter des guillemets autour de 'active'
        $shop->status = 'approved'; // Au lieu de $shop->status = active;
        $shop->save();
        
        // Rediriger avec un message de succès
        return redirect()->route('admin.subscriptions.all')
            ->with('success', 'Abonnement approuvé avec succès.');
    }

    /**
     * Reject a subscription.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function reject(Request $request, $id)
    {
        $request->validate([
            'rejection_reason' => 'required|string',
        ]);

        $subscription = Subscription::with(['user', 'shop', 'plan'])
            ->findOrFail($id);

        if ($subscription->status !== 'pending') {
            return back()->with('error', 'Cet abonnement ne peut pas être rejeté.');
        }

        // Update subscription
        $subscription->status = 'rejected';
        $subscription->rejection_reason = $request->rejection_reason;
        $subscription->save();

        // Create notification for vendor
        $notification = new Notification();
        $notification->user_id = $subscription->user_id;
        $notification->title = 'Abonnement rejeté';
        $notification->message = 'Votre abonnement "' . $subscription->plan->name . '" a été rejeté. Raison: ' . $request->rejection_reason;
        $notification->type = 'error';
        $notification->save();

        return redirect()->route('admin.subscriptions.pending')
            ->with('success', 'Abonnement rejeté avec succès!');
    }
}
