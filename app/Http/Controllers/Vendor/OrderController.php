<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Affiche la liste des commandes liées aux produits du vendeur.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Récupérer la boutique du vendeur connecté
        $shop = auth()->user()->shop;
        
        if (!$shop) {
            return redirect()->route('vendor.profile')->with('error', 'Vous devez d\'abord créer une boutique');
        }
        
        // Récupérer les IDs des produits de la boutique
        $productIds = $shop->products()->pluck('id')->toArray();
        
        // Récupérer les commandes qui contiennent des produits de cette boutique
        $orderItems = OrderItem::whereIn('product_id', $productIds)->get();
        $orderIds = $orderItems->pluck('order_id')->unique()->toArray();
        
        // Récupérer les commandes complètes avec pagination
        $orders = Order::whereIn('id', $orderIds)
                      ->with('user')
                      ->orderBy('created_at', 'desc')
                      ->paginate(10);
        
        return view('vendor.orders.index', compact('orders', 'orderItems'));
    }

    /**
     * Affiche les détails d'une commande spécifique.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\View\View
     */
    public function show(Order $order)
    {
        // Récupérer la boutique du vendeur connecté
        $shop = auth()->user()->shop;
        
        if (!$shop) {
            return redirect()->route('vendor.profile')->with('error', 'Vous devez d\'abord créer une boutique');
        }
        
        // Récupérer les IDs des produits de la boutique
        $productIds = $shop->products()->pluck('id')->toArray();
        
        // Vérifier si la commande contient des produits de ce vendeur
        $orderItems = OrderItem::where('order_id', $order->id)
                              ->whereIn('product_id', $productIds)
                              ->get();
        
        if ($orderItems->isEmpty()) {
            abort(403, 'Cette commande ne contient aucun de vos produits.');
        }
        
        // Charger les items de la commande et leurs produits associés
        $order->load(['orderItems' => function($query) use ($productIds) {
            $query->whereIn('product_id', $productIds);
        }, 'orderItems.product', 'user']);
        
        return view('vendor.orders.show', compact('order', 'orderItems'));
    }
}