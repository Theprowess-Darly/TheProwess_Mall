<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the orders.
     */
    public function index()
    {
        $orders = Order::with('user')->latest()->paginate(10);
        
        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Display the specified order.
     */
    public function show(Order $order)
    {
        $order->load(['user', 'orderItems.product']);
        
        return view('admin.orders.show', compact('order'));
    }

    /**
     * Update the status of an order.
     */
    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,processing,shipped,delivered,completed,cancelled',
        ]);

        $order->update([
            'status' => $request->status,
        ]);

        return redirect()->route('admin.orders.show', $order)
            ->with('success', 'Statut de la commande mis à jour avec succès.');
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