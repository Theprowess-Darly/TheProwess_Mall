<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate; // Ajouter cet import
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class VendorProductController extends Controller
{
    public function index()
    {
        // Récupérer uniquement les produits du vendeur connecté
        $shop = auth()->user()->shop;
        $products = $shop->products()->with(['category', 'shop'])->latest()->paginate(12);
        
        $categories = Category::all();
    
        return view('vendor.products.index', compact('products', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('vendor.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // Vérifier si l'image est un fichier valide avant la validation
        if ($request->hasFile('image_url') && !$request->file('image_url')->isValid()) {
            return redirect()->back()
                ->withErrors(['image_url' => 'Le fichier image n\'est pas valide'])
                ->withInput();
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'image_url' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'nullable|string|in:pending,active,suspended,approved',
        ]);

        $imagePath = null;
        
        // Traitement de l'image uniquement si c'est un fichier valide
        if ($request->hasFile('image_url') && $request->file('image_url')->isValid()) {
            $imageName = time() . '.' . $request->image_url->extension();
            // Utiliser le stockage public de Laravel
            $imagePath = $request->file('image_url')->store('images/products', 'public');
            // Ou si vous préférez garder votre approche actuelle:
            // $request->image_url->move(public_path('storage/images/products'), $imageName);
            // $imagePath = 'storage/images/products/' . $imageName;
        } else {
            // Rediriger avec une erreur si l'image est requise mais non valide
            return redirect()->back()
                ->withErrors(['image_url' => 'Une image valide est requise'])
                ->withInput();
        }

        $product = new Product();
        $product->name = $validated['name'];
        $product->description = $validated['description'];
        $product->price = $validated['price'];
        $product->stock = $validated['stock'];
        $product->image_url = $imagePath;
        $product->shop_id = auth()->user()->shop->id;
        $product->status = $validated['status'] ?? 'pending';
        $product->category_id = $validated['category_id'];
        $product->save();

        return redirect()->route('vendor.products.index')->with('success', 'Produit ajouté avec succès!');
    }

    public function edit(Product $product) 
    {
        // Remplacer $this->authorize par Gate::authorize
        Gate::authorize('update', $product); // ou utiliser la façade Gate
        // Ou utiliser cette syntaxe alternative
        // $this->authorizeForUser(auth()->user(), 'update', $product);
        
        $categories = Category::all();
        return view('vendor.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product) 
    {
        // Remplacer $this->authorize par Gate::authorize
        Gate::authorize('update', $product); // ou utiliser la façade Gate
        // Ou utiliser cette syntaxe alternative
        // $this->authorizeForUser(auth()->user(), 'update', $product);
    
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'status' => 'required|in:pending,active,suspended,approved',
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image_url')) {
            $imageName = time() . '.' . $request->image_url->extension();
            // Utiliser le même chemin que dans la méthode store
            $request->image_url->move(public_path('storage/images/products'), $imageName);
            $product->image_url = 'storage/images/products/' . $imageName;
            // Ou utiliser le stockage public de Laravel:
            // $product->image_url = $request->file('image_url')->store('images/products', 'public');
        }

        $product->update([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'stock' => $validated['stock'],
            'category_id' => $validated['category_id'],
            'status' => $validated['status'],
        ]);

        return redirect()->route('vendor.products.index')->with('success', 'Product updated successfully!');
    }
        /**
     * Display the specified product.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        // Ensure the vendor can only view their own products
        if ($product->shop->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

       
        return view('vendor.products.show', compact('product'));
    }

    /**
 * Affiche la liste des produits.
 *
 * @return \Illuminate\View\View
 */


    /**
     * Remove the specified product from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        // Vérifier que le vendeur ne peut supprimer que ses propres produits
        if ($product->shop->user_id !== auth()->id()) {
            abort(403, 'Action non autorisée.');
        }
        
        // Supprimer l'image si elle existe
        if ($product->image) {
            Storage::delete('public/' . $product->image);
        }
        
        $product->delete();
        
        return redirect()->route('vendor.products.index')
            ->with('success', 'Produit supprimé avec succès.');
    }
}
