<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    /**
     * Affiche la page de checkout avec les données du panier
     * 
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Récupérer les données du panier depuis la session
        $cart = Session::get('cart', []);
        $cartCount = 0;
        $totalPrice = 0;
        
        // Calculer le nombre d'articles et le prix total
        foreach ($cart as $item) {
            $cartCount += $item['quantity'];
            $totalPrice += $item['price'] * $item['quantity'];
        }
        
        return view('checkout', [
            'cartItems' => $cart,
            'cartCount' => $cartCount,
            'totalPrice' => $totalPrice
        ]);
    }
}