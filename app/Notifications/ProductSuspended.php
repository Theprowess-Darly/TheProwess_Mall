<?php

namespace App\Notifications;

use App\Models\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ProductSuspended extends Notification
{
    use Queueable;

    protected $product;

    /**
     * Crée une nouvelle instance de notification.
     *
     * @param Product $product Le produit suspendu
     * @return void
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * Obtient les canaux de livraison de la notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Obtient la représentation mail de la notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Votre produit a été suspendu')
            ->line('Votre produit "' . $this->product->name . '" a été suspendu.')
            ->line('Raison: ' . $this->product->suspension_reason)
            ->action('Voir le produit', route('vendor.products.show', $this->product))
            ->line('Veuillez contacter l\'administration pour plus d\'informations.');
    }

    /**
     * Obtient la représentation de la notification pour la base de données.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'product_id' => $this->product->id,
            'product_name' => $this->product->name,
            'message' => 'Votre produit "' . $this->product->name . '" a été suspendu.',
            'reason' => $this->product->suspension_reason
        ];
    }
}