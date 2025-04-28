<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    /**
     * Affiche la liste des souhaits de l'utilisateur.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $wishlist = Wishlist::where('user_id', auth()->id())
                           ->with('product')
                           ->paginate(12);
                           
        return view('client.wishlist.index', compact('wishlist'));
    }

    /**
     * Ajoute un produit à la liste des souhaits.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id'
        ]);

        $wishlist = Wishlist::firstOrCreate([
            'user_id' => auth()->id(),
            'product_id' => $request->product_id
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Produit ajouté à votre liste de souhaits'
        ]);
    }

    /**
     * Supprime un produit de la liste des souhaits.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Wishlist::where('user_id', auth()->id())
                ->where('product_id', $id)
                ->delete();

        return back()->with('success', 'Produit retiré de votre liste de souhaits');
    }
}