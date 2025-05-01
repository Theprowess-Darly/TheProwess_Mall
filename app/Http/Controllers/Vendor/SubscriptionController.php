<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\SubscriptionPlan;
use App\Models\Shop;
use App\Models\Subscription;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    /**
     * Display the subscription plans.
     *
     * @return \Illuminate\View\View
     */
    public function plans()
    {
        // Check if vendor has a shop
        $shop = Shop::where('user_id', Auth::id())->first();
        
        if (!$shop) {
            return redirect()->route('vendor.shop.create')
                ->with('error', 'Vous devez d\'abord créer une boutique avant de choisir un plan d\'abonnement.');
        }
        
        // Get all active plans
        $plans = SubscriptionPlan::where('is_active', true)->get();
        
        return view('vendor.subscription.plans', compact('plans'));
    }

    /**
     * Subscribe to a plan.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function subscribe(Request $request)
    {
        $request->validate([
            'plan_id' => 'required|exists:subscription_plans,id',
        ]);

        $plan = SubscriptionPlan::findOrFail($request->plan_id);
        $shop = Shop::where('user_id', Auth::id())->firstOrFail();

        // Check if there's already a pending subscription
        $pendingSubscription = Subscription::where('shop_id', $shop->id)
            ->whereIn('status', ['pending', 'approved'])
            ->first();

        if ($pendingSubscription) {
            return redirect()->route('vendor.subscription.payment', $pendingSubscription->id)
                ->with('info', 'Vous avez déjà un abonnement en attente. Veuillez compléter le paiement.');
        }

        // Create new subscription
        $subscription = new Subscription();
        $subscription->user_id = Auth::id();
        $subscription->shop_id = $shop->id;
        $subscription->subscription_plan_id = $plan->id;
        $subscription->amount = $plan->price;
        $subscription->status = 'pending';
        $subscription->save();

        return redirect()->route('vendor.subscription.payment', $subscription->id)
            ->with('success', 'Plan sélectionné. Veuillez procéder au paiement.');
    }

    /**
     * Show payment page for subscription.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function payment($id)
    {
        $subscription = Subscription::with(['plan', 'shop'])
            ->where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        if ($subscription->status !== 'pending') {
            return redirect()->route('vendor.subscription.history')
                ->with('info', 'Cet abonnement n\'est plus en attente de paiement.');
        }

        return view('vendor.subscription.payment', compact('subscription'));
    }

    /**
     * Process payment for subscription.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function processPayment(Request $request, $id)
    {
        $request->validate([
            'payment_method' => 'required|string',
            'transaction_id' => 'required|string',
        ]);

        $subscription = Subscription::with(['plan', 'shop'])
            ->where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        if ($subscription->status !== 'pending') {
            return redirect()->route('vendor.subscription.history')
                ->with('error', 'Cet abonnement n\'est plus en attente de paiement.');
        }

        // Update subscription with payment details
        $subscription->payment_method = $request->payment_method;
        $subscription->payment_id = $request->transaction_id;
        $subscription->status = 'pending';
        $subscription->save();

        // Create notification for admin
        $notification = new Notification();
        $notification->user_id = 1; // Assuming admin has ID 1, adjust as needed
        $notification->title = 'Nouvel abonnement en attente d\'approbation';
        $notification->message = 'Un nouvel abonnement pour la boutique "' . $subscription->shop->name . '" est en attente d\'approbation.';
        $notification->type = 'info';
        $notification->link = route('admin.subscriptions.show', $subscription->id);
        $notification->save();

        // Create notification for vendor
        $vendorNotification = new Notification();
        $vendorNotification->user_id = Auth::id();
        $vendorNotification->title = 'Paiement d\'abonnement reçu';
        $vendorNotification->message = 'Votre paiement pour l\'abonnement "' . $subscription->plan->name . '" a été reçu et est en attente d\'approbation par l\'administrateur.';
        $vendorNotification->type = 'info';
        $vendorNotification->save();

        return redirect()->route('vendor.dashboard')
            ->with('success', 'Paiement effectué avec succès! Votre abonnement est en attente d\'approbation par l\'administrateur.');
    }

    /**
     * Display subscription history.
     *
     * @return \Illuminate\View\View
     */
    public function history()
    {
        $subscriptions = Subscription::with(['plan', 'shop'])
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('vendor.subscription.history', compact('subscriptions'));
    }
}