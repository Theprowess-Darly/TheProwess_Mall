<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use App\Models\Notification;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

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
            ->where('status', 'pending_approval')
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
        $subscription = Subscription::with(['user', 'shop', 'plan'])
            ->findOrFail($id);

        if ($subscription->status !== 'pending_approval') {
            return back()->with('error', 'Cet abonnement ne peut pas être approuvé.');
        }

        // Calculate start and end dates
        $startDate = Carbon::now();
        $endDate = $startDate->copy()->addDays($subscription->plan->duration_in_days);

        // Update subscription
        $subscription->status = 'active';
        $subscription->starts_at = $startDate;
        $subscription->ends_at = $endDate;
        $subscription->save();

        // Update shop status
        $shop = Shop::find($subscription->shop_id);
        $shop->status = 'active';
        $shop->save();

        // Create notification for vendor
        $notification = new Notification();
        $notification->user_id = $subscription->user_id;
        $notification->title = 'Abonnement approuvé';
        $notification->message = 'Votre abonnement "' . $subscription->plan->name . '" a été approuvé. Votre boutique est maintenant active.';
        $notification->type = 'success';
        $notification->save();

        return redirect()->route('admin.subscriptions.pending')
            ->with('success', 'Abonnement approuvé avec succès!');
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

        if ($subscription->status !== 'pending_approval') {
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
