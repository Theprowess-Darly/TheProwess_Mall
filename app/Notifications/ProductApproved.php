<?php

namespace App\Notifications;

use App\Models\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ProductApproved extends Notification
{
    use Queueable;

    protected $product;

    /**
     * Crée une nouvelle instance de notification.
     *
     * @param Product $product Le produit approuvé
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
            ->subject('Votre produit a été approuvé')
            ->line('Votre produit "' . $this->product->name . '" a été approuvé et est maintenant visible pour les clients.')
            ->action('Voir le produit', route('vendor.products.show', $this->product))
            ->line('Merci d\'utiliser notre plateforme!');
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
            'message' => 'Votre produit "' . $this->product->name . '" a été approuvé.'
        ];
    }
}