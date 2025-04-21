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
     * Activate a product.
     */
    public function activate(Product $product)
    {
        $product->update(['status' => 'active']);
        
        return redirect()->route('admin.products.index')
            ->with('success', 'Produit activé avec succès.');
    }

    /**
     * Deactivate a product.
     */
    public function deactivate(Product $product)
    {
        $product->update(['status' => 'inactive']);
        
        return redirect()->route('admin.products.index')
            ->with('success', 'Produit désactivé avec succès.');
    }
}
