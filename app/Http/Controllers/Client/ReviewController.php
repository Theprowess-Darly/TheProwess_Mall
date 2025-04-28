<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Affiche la liste des avis de l'utilisateur.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $reviews = Review::where('user_id', auth()->id())
                        ->with('product')
                        ->orderBy('created_at', 'desc')
                        ->paginate(10);
                        
        return view('client.reviews.index', compact('reviews'));
    }

    /**
     * Affiche le formulaire de création d'un avis.
     *
     * @param  int  $productId
     * @return \Illuminate\View\View
     */
    public function create($productId)
    {
        $product = Product::findOrFail($productId);
        return view('client.reviews.create', compact('product'));
    }

    /**
     * Enregistre un nouvel avis.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'rating' => 'required|integer|between:1,5',
            'comment' => 'required|string|min:10'
        ]);

        Review::create([
            'user_id' => auth()->id(),
            'product_id' => $request->product_id,
            'rating' => $request->rating,
            'comment' => $request->comment,
            'status' => 'pending'
        ]);

        return redirect()->route('client.reviews')->with('success', 'Votre avis a été soumis avec succès');
    }

    /**
     * Supprime un avis.
     *
     * @param  Review  $review
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Review $review)
    {
        if ($review->user_id !== auth()->id()) {
            abort(403);
        }

        $review->delete();
        return back()->with('success', 'Avis supprimé avec succès');
    }
}