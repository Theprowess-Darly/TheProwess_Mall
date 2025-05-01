<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Subscription;
use App\Models\Shop;
use App\Models\Notification;
use Carbon\Carbon;

class CheckSubscriptionExpiration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'subscriptions:check-expiration';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check for expired subscriptions and send notifications for upcoming expirations';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Check for expired subscriptions
        $this->checkExpiredSubscriptions();
        
        // Send notifications for subscriptions about to expire
        $this->sendExpirationNotifications();
        
        $this->info('Subscription expiration check completed successfully.');
    }
    
    /**
     * Check for expired subscriptions and update their status
     * 
     * @return void
     */
    private function checkExpiredSubscriptions()
    {
        $expiredSubscriptions = Subscription::where('status', 'active')
            ->where('ends_at', '<', Carbon::now())
            ->get();
            
        foreach ($expiredSubscriptions as $subscription) {
            // Update subscription status
            $subscription->status = 'expired';
            $subscription->save();
            
            // Update shop status
            $shop = Shop::find($subscription->shop_id);
            $shop->status = 'suspended';
            $shop->save();
            
            // Create notification for vendor
            $notification = new Notification();
            $notification->user_id = $subscription->user_id;
            $notification->title = 'Abonnement expiré';
            $notification->message = 'Votre abonnement "' . $subscription->plan->name . '" a expiré. Votre boutique a été suspendue. Veuillez renouveler votre abonnement pour continuer à utiliser nos services.';
            $notification->type = 'warning';
            $notification->save();
            
            $this->info("Subscription #{$subscription->id} marked as expired and shop #{$shop->id} suspended.");
        }
    }
    
    /**
     * Send notifications for subscriptions about to expire
     * 
     * @return void
     */
    private function sendExpirationNotifications()
    {
        // Get subscriptions that will expire in 7 days
        $sevenDaysFromNow = Carbon::now()->addDays(7);
        $subscriptionsExpiringSoon = Subscription::where('status', 'active')
            ->whereDate('ends_at', '=', $sevenDaysFromNow->toDateString())
            ->get();
            
        foreach ($subscriptionsExpiringSoon as $subscription) {
            // Create notification for vendor
            $notification = new Notification();
            $notification->user_id = $subscription->user_id;
            $notification->title = 'Abonnement expirant bientôt';
            $notification->message = 'Votre abonnement "' . $subscription->plan->name . '" expirera dans 7 jours. Veuillez renouveler votre abonnement pour éviter la suspension de votre boutique.';
            $notification->type = 'info';
            $notification->save();
            
            $this->info("Expiration notification sent for subscription #{$subscription->id}.");
        }
        
        // Calculate 80% of subscription duration
        $activeSubscriptions = Subscription::where('status', 'active')
            ->whereNotNull('starts_at')
            ->whereNotNull('ends_at')
            ->get();
            
        foreach ($activeSubscriptions as $subscription) {
            $startDate = Carbon::parse($subscription->starts_at);
            $endDate = Carbon::parse($subscription->ends_at);
            $totalDuration = $startDate->diffInDays($endDate);
            $eightyPercentDuration = ceil($totalDuration * 0.8);
            $eightyPercentDate = $startDate->copy()->addDays($eightyPercentDuration);
            
            // If today is the 80% mark, send notification
            if (Carbon::now()->isSameDay($eightyPercentDate)) {
                $daysLeft = Carbon::now()->diffInDays($endDate);
                
                $notification = new Notification();
                $notification->user_id = $subscription->user_id;
                $notification->title = 'Abonnement expirant bientôt';
                $notification->message = 'Votre abonnement "' . $subscription->plan->name . '" a atteint 80% de sa durée. Il vous reste ' . $daysLeft . ' jours avant expiration. Pensez à renouveler votre abonnement.';
                $notification->type = 'info';
                $notification->save();
                
                $this->info("80% duration notification sent for subscription #{$subscription->id}.");
            }
        }
    }
}