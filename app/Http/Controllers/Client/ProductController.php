<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Affiche la liste de tous les produits disponibles de manière aléatoire
     * 
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Fetch all products from the database in random order
        $products = Product::where('status', 'approved')
                          ->inRandomOrder()
                          ->paginate(100); // You can adjust the number per page as needed
        
        return view('client.products.index', compact('products'));
    }
}
