<?php

namespace App\Notifications;

use App\Models\Shop;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ShopRejected extends Notification implements ShouldQueue
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
     *
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Votre boutique a ete rejetée')
            ->greeting('Bonjour ' . $notifiable->name . ',')
            ->line('Nous sommes désolés de vous informer que votre boutique "' . $this->shop->name . '" a été rejetée.')
            ->line('Voici la raison du rejet :')
            ->line($this->shop->rejection_reason)
            ->line('Nous vous invitons à nous contacter pour obtenir plus d\'informations.')
            ->action('Contact action', url('/contact'))
            ->line('Merci pour votre comprehension!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
