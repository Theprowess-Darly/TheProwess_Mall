<?php

// app/Http/Controllers/Vendor/ProductController.php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VendorProductController extends Controller
{
    public function index()
    {
        // Get the authenticated user's shop
        $shop = auth()->user()->shop;

        // Fetch the products related to this shop
        $products = $shop->products()->latest()->paginate(10);

        return view('vendor.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('vendor.products.create' , compact('categories'));
    }




    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id', 
            'status' =>'required|in:pending,active,suspended,approved',
            'image_url' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle file upload
        $imagePath = $request->file('image_url')->store('products', 'public');
        // Handle image upload
        if ($request->hasFile('image_url')) {
            $imageName = time() . '.' . $request->image_url->extension();  
            $request->image_url->move(public_path('images/products'), $imageName);
            $imagePath = 'images/products/' . $imageName;
        }

         // Create the product
        $product = new Product();
        $product->name = $validated['name'];
        $product->description = $validated['description'];
        $product->price = $validated['price'];
        $product->stock = $validated['stock'];
        $product->image_url = $imagePath;  // Save the image path
        $product->shop_id = auth()->user()->shop->id;
        $product->status = 'pending';  // Default status
        $product->category_id = $validated['category_id'];
        
        $product->save();

    return redirect()->route('vendor.products.index')->with('success', 'Product added successfully!');

    }
}
