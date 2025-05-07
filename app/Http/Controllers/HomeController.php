<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;

class HomeController extends Controller
{
    /**
     * Show the application home page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
         // Récupérer tous les shops
         $shops = Shop::all();
                        
         // Pour chaque shop, récupérer au moins un produit aléatoire
         $featuredProducts = collect();
         
         foreach ($shops as $shop) {
             // Récupérer un produit aléatoire de ce shop
             $product = $shop->products()->inRandomOrder()->first();
             
             if ($product) {
                 $featuredProducts->push($product);
             }
             
             // Ajouter éventuellement un deuxième produit aléatoire (si le shop a plus d'un produit)
             if ($shop->products()->count() > 1) {
                 $secondProduct = $shop->products()->where('id', '!=', $product ? $product->id : 0)->inRandomOrder()->first();
                 if ($secondProduct) {
                     $featuredProducts->push($secondProduct);
                 }
             }
         }
         
         // Si on n'a pas assez de produits, compléter avec des produits aléatoires
         if ($featuredProducts->count() < 8) {
             $additionalProducts = \App\Models\Product::whereNotIn('id', $featuredProducts->pluck('id'))->inRandomOrder()->take(8 - $featuredProducts->count())->get();
             $featuredProducts = $featuredProducts->merge($additionalProducts);
         }
         
         // Limiter à 8 produits maximum et mélanger
         $featuredProducts = $featuredProducts->take(8)->shuffle();

        return view('home', [
            'shops' => $shops,
           'featuredProducts' => $featuredProducts,
        ]);
    }
}