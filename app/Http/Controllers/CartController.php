<?php

namespace App\Http\Controllers;

use App\Models\Product; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;


class CartController extends Controller
{
    // public function __construct()
    // {
    //     // Apply auth middleware to all methods in this controller
    //     $this->middleware('auth');
    // }

    /**
     * Get the current cart items and count (Helper for AJAX responses).
     */
    private function getCartData()
    {
        $cart = Session::get('cart', []); // Default to empty array if 'cart' doesn't exist
        $cartCount = 0;
        foreach ($cart as $item) {
            $cartCount += $item['quantity'];
        }
        // Optional: Recalculate total price if needed in response
        $totalPrice = array_reduce($cart, function ($carry, $item) {
            return $carry + ($item['price'] * $item['quantity']);
        }, 0);


        return [
            'items' => $cart,
            'count' => $cartCount,
            'totalPrice' => $totalPrice // Optional
        ];
    }

    /**
     * Display the cart page (Optional - if you have a dedicated cart page)
     */
    public function index()
    {
        $cartData = $this->getCartData();
        return view('cart.index', [
            'cartItems' => $cartData['items'],
            'cartCount' => $cartData['count'],
            'totalPrice' => $cartData['totalPrice']
         ]);
    }


    /**
     * Add an item to the cart via AJAX.
     */
    public function add(Request $request)
    {
        $request->validate([
            'product_id' => ['required', 'integer', Rule::exists('products', 'id')], // Ensure product exists
            'quantity' => ['required', 'integer', 'min:1'],
        ]);

        $productId = $request->input('product_id');
        $quantity = (int) $request->input('quantity');

        $product = Product::findOrFail($productId); // Fetch product details

        // --- Optional: Add Stock Check ---
        if ($product->stock < $quantity) {
            return response()->json([
                'success' => false,
                'message' => 'Not enough stock available.'
            ], 400); // Bad Request
        }
        // --- End Optional Stock Check ---

        $cart = Session::get('cart', []);

        // Check if product already exists in cart
        if (isset($cart[$productId])) {
            // --- Optional: Check Stock for Increased Quantity ---
            $newQuantity = $cart[$productId]['quantity'] + $quantity;
            if ($product->stock < $newQuantity) {
               return redirect()->back()->with('400', 'stock insuffisant pour proceder votre commande.');
              
            }
            $cart[$productId]['quantity'] = $newQuantity;
            // --- End Optional Stock Check ---

             // If stock checks are not used or passed:
             $cart[$productId]['quantity'] += $quantity;

        } else {
            // Add new item
            $cart[$productId] = [
                "id" => $product->id,
                "name" => $product->name,
                "quantity" => $quantity,
                "price" => $product->price, // Store price at time of adding
                "image" => $product->image_url, // Or however you store image URLs
                "shop_id" => $product->shop_id // Important for marketplace context
                // Add other relevant details like options (size, color) if needed
            ];
        }

        Session::put('cart', $cart); // Save cart back to session

        $cartData = $this->getCartData();

        return redirect()->back()->with('success', 'produit ajoute au pannier!');
    }

    /**
     * Update item quantity in cart via AJAX.
     */
    public function update(Request $request)
    {
        $request->validate([
            'product_id' => ['required', 'integer'],
            'quantity' => ['required', 'integer', 'min:1'], // Ensure quantity is at least 1
        ]);

        $productId = $request->input('product_id');
        $quantity = (int) $request->input('quantity');

        $cart = Session::get('cart', []);

        if (isset($cart[$productId])) {

            // --- Optional: Stock Check for Update ---
            $product = Product::find($productId);
            if ($product && $product->stock < $quantity) {
                return response()->json([
                    'success' => false,
                    'message' => 'Not enough stock available for this quantity.'
                ], 400);
            }
            // --- End Stock Check ---

            $cart[$productId]['quantity'] = $quantity;
            Session::put('cart', $cart);
            $cartData = $this->getCartData();

            return response()->json([
                'success' => true,
                'message' => 'Cart updated!',
                'cartCount' => $cartData['count'],
                'totalPrice' => $cartData['totalPrice'], // Useful for updating totals on cart page
                // 'itemTotal' => $cart[$productId]['price'] * $cart[$productId]['quantity'] // Price for the updated item row
            ]);

        } else {
            return response()->json([
                'success' => false,
                'message' => 'Item not found in cart.'
            ], 404); // Not Found
        }
    }

     /**
     * Remove item from cart via AJAX.
     */
    public function remove(Request $request)
    {
        $request->validate([
            'product_id' => ['required', 'integer'],
        ]);

        $productId = $request->input('product_id');
        $cart = Session::get('cart', []);

        if (isset($cart[$productId])) {
            unset($cart[$productId]); // Remove the item
            Session::put('cart', $cart); // Save updated cart
            $cartData = $this->getCartData();

            return response()->json([
                'success' => true,
                'message' => 'Item removed from cart!',
                'cartCount' => $cartData['count'],
                'totalPrice' => $cartData['totalPrice'] // Useful for updating totals on cart page
            ]);
        } else {
             return response()->json([
                'success' => false,
                'message' => 'Item not found in cart.'
            ], 404); // Not Found
        }
    }

    /**
     * Get current cart count (useful for initial page load or periodic checks).
     */
    public function count()
    {
        $cartData = $this->getCartData();
        return response()->json([
            'success' => true,
            'cartCount' => $cartData['count']
        ]);
    }
}