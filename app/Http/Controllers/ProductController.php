// ... existing code ...

/**
 * Affiche la liste des produits.
 *
 * @return \Illuminate\View\View
 */
public function index()
{
    $products = Product::where('status', 'approved')
                      ->with(['category', 'shop'])
                      ->latest()
                      ->paginate(12);
    
    $categories = Category::all();
    
    return view('products.index', compact('products', 'categories'));
}

// ... existing code ...