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
     * Approuver un produit
     * 
     * @param Product $product Le produit à approuver
     * @return \Illuminate\Http\RedirectResponse
     */
    public function activate(Product $product)
    {
        \Log::info('Tentative d\'approbation du produit: ' . $product->id);
        \Log::info('Statut actuel: ' . $product->status);
        
        try {
            $product->update([
                'status' => 'approved',
                'approved_at' => now()
            ]);
            
            \Log::info('Produit approuvé avec succès');
            
            // Notification au vendeur que son produit a été approuvé
            if ($product->shop && $product->shop->user) {
                // Décommentez cette ligne si vous avez créé la notification
                // $product->shop->user->notify(new \App\Notifications\ProductApproved($product));
            }
            
            return redirect()->route('admin.products.index')
                ->with('success', 'Le produit a été approuvé avec succès.');
        } catch (\Exception $e) {
            \Log::error('Erreur lors de l\'approbation du produit: ' . $e->getMessage());
            
            return redirect()->route('admin.products.index')
                ->with('error', 'Erreur lors de l\'approbation du produit: ' . $e->getMessage());
        }
    }
    
    /**
     * Suspendre un produit
     * 
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function suspend(Request $request, Product $product)
    {
        try {
            $validated = $request->validate([
                'suspension_reason' => 'required|string|max:500',
            ]);
            
            $product->update([
                'status' => 'suspended',
                'suspension_reason' => $validated['suspension_reason']
            ]);
            
            // Notification au vendeur
            if ($product->shop && $product->shop->user) {
                $product->shop->user->notify(new \App\Notifications\ProductSuspended($product));
            }
            
            return redirect()->route('admin.products.index')
                ->with('success', 'Produit suspendu avec succès.');
        } catch (\Exception $e) {
            \Log::error('Erreur lors de la suspension du produit: ' . $e->getMessage());
            
            return redirect()->route('admin.products.index')
                ->with('error', 'Erreur lors de la suspension du produit: ' . $e->getMessage());
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
            $product->update([
                'status' => 'rejected'
            ]);
            
            return redirect()->route('admin.products.index')
                ->with('success', 'Produit désactivé avec succès.');
        } catch (\Exception $e) {
            \Log::error('Erreur lors de la désactivation du produit: ' . $e->getMessage());
            
            return redirect()->route('admin.products.index')
                ->with('error', 'Erreur lors de la désactivation du produit: ' . $e->getMessage());
        }
    }
}
