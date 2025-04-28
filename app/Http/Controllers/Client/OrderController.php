<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Order;
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

        return view('client.orders.show', compact('order'));
    }
}