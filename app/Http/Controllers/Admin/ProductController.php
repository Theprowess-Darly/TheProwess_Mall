<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Shop;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the products.
     */
    public function index()
    {
        $products = Product::with(['shop', 'category'])->latest()->paginate(10);
        $categories = Category::all();
        $shops = Shop::where('status', 'active')->get();
        
        return view('admin.products.index', compact('products', 'categories', 'shops'));
    }

    /**
     * Display the specified product.
     */
    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    /**
     * Activer un produit
     * 
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function activate(Product $product)
    {
        \Log::info('Tentative d\'activation du produit: ' . $product->id);
        \Log::info('Statut actuel: ' . $product->status);
        
        try {
            $product->status = 'approved';
            $product->save();
            
            \Log::info('Produit activé avec succès');
            
            return redirect()->route('admin.products.index')
                ->with('success', 'Produit activé avec succès');
        } catch (\Exception $e) {
            \Log::error('Erreur lors de l\'activation du produit: ' . $e->getMessage());
            
            return redirect()->route('admin.products.index')
                ->with('error', 'Erreur lors de l\'activation du produit: ' . $e->getMessage());
        }
    }
    
    /**
     * Désactiver un produit
     * 
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deactivate(Product $product)
    {
        try {
            $product->status = 'rejected';
            $product->save();
            
            return redirect()->route('admin.products.index')
                ->with('success', 'Produit désactivé avec succès.');
        } catch (\Exception $e) {
            \Log::error('Erreur lors de la désactivation du produit: ' . $e->getMessage());
            
            return redirect()->route('admin.products.index')
                ->with('error', 'Erreur lors de la désactivation du produit: ' . $e->getMessage());
        }
    }
}
