<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Affiche la liste des commandes du client.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $orders = Order::where('user_id', auth()->id())
                      ->orderBy('created_at', 'desc')
                      ->paginate(10);
                      
        return view('client.orders.index', compact('orders'));
    }

    /**
     * Affiche les détails d'une commande spécifique.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\View\View
     */
    public function show(Order $order)
    {
        // Vérifier si la commande appartient au client connecté
        if ($order->user_id !== auth()->id()) {
            abort(403);
        }
        
        // Charger les items de la commande et leurs produits associés
        $order->load('orderItems.product');
        
        return view('client.orders.show', compact('order'));
    }
       /**
     * Enregistre une nouvelle commande dans la base de données.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation des données
        $validated = $request->validate([
            'shipping_address' => 'required|string',
            'city' => 'required|string',
            'phone' => 'required|string',
            'payment_method' => 'required|string|in:cash,card,mobile_money',
            'notes' => 'nullable|string',
        ]);

        // Création de la commande
        $order = Order::create([
            'user_id' => auth()->id(),
            'payment_method' => $request->payment_method,
            'payment_status' => 'pending',
            'status' => 'pending',
            'address' => $request->shipping_address,
            'city' => $request->city,
            'phone' => $request->phone,
            'notes' => $request->notes,
            'total' => 0, // Sera mis à jour après l'ajout des articles
            'subtotal' => 0,
            'shipping_fee' => 0,
        ]);

        // Redirection vers la page de paiement
        return redirect()->route('orders.payment', $order)
            ->with('success', 'Votre commande a été créée avec succès.');
    }
}