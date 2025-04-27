<?php

namespace App\Notifications;

use App\Models\Shop;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\DatabaseMessage;

class ShopApproved extends Notification implements ShouldQueue
{
    use Queueable;

    protected $shop;

    /**
     * Create a new notification instance.
     */
    public function __construct(Shop $shop)
    {
        $this->shop = $shop;
    }

    /**
     * Get the notification's delivery channels.
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }
    public function toDatabase(object $notifiable)
    {
        return [
            'title' => 'Subscription Approved',
            'message' => 'Your shop subscription has been approved. Your shop is now active.',
            'link' => route('vendor.dashboard'),
        ];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Votre boutique a été approuvée')
            ->greeting('Bonjour ' . $notifiable->name . ',')
            ->line('Nous sommes heureux de vous informer que votre boutique "' . $this->shop->name . '" a été approuvée.')
            ->line('Vous pouvez maintenant commencer à ajouter des produits à votre boutique.')
            ->action('Gérer ma boutique', url('/vendor/dashboard/'. $this->shop->id))
            ->line('Merci d\'utiliser notre plateforme!');
    }

    /**
     * Get the array representation of the notification.
     */
    public function toArray(object $notifiable): array
    {
        return [
            'shop_id' => $this->shop->id,
            'shop_name' => $this->shop->name,
            'message' => 'Votre boutique "' . $this->shop->name . '" a été approuvée.',
            'action_url' => '/vendor/shops/' . $this->shop->id,
        ];
    }
}
