<x-mail::message>
# Bonjour {{ $order->user->name }},

Nous avons bien reçu votre paiement de **{{ number_format($order->total_amount, 2, ',', ' ') }} FCFA** 
votre commande **No:{{ $order->order_id }}**. est désormais confirmée et sera traitée dans les plus brefs délais.

<x-mail::button :url="$url">
Voir la commande
</x-mail::button>
Si vous avez des questions ou besoin d'assistance, n'hésitez pas à nous contacter.
Merci pour votre confiance renouvelée

Cordialement,  
{{ config('app.name') }}
</x-mail::message>
