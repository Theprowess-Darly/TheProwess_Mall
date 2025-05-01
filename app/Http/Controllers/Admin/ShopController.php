<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ShopController extends Controller
{
    /**
     * Afficher la liste des boutiques
     */
    public function index()
    {
        $shops = Shop::with('user')->latest()->paginate(10);
        return view('admin.shops.index', compact('shops'));
    }

    /**
     * Afficher les détails d'une boutique
     */
    public function show(Shop $shop)
    {
        $shop->load(['user', 'products']);
        return view('admin.shops.show', compact('shop'));
    }

    /**
     * Approuver une boutique
     */
    public function approve(Shop $shop)
    {
        \Log::info('Tentative d\'approbation de la boutique: ' . $shop->id);
        \Log::info('Statut actuel: ' . $shop->status);
        
        try {
            $shop->update([
                'status' => 'approved',
                'approved_at' => now(),
            ]);
            
            \Log::info('Boutique approuvée avec succès');

            // Notification au vendeur
            $shop->user->notify(new \App\Notifications\ShopApproved($shop));

            return redirect()->route('admin.shops.index')
                ->with('success', 'La boutique a été approuvée avec succès.');
        } catch (\Exception $e) {
            \Log::error('Erreur lors de l\'approbation de la boutique: ' . $e->getMessage());
            
            return redirect()->route('admin.shops.index')
                ->with('error', 'Erreur lors de l\'approbation de la boutique: ' . $e->getMessage());
        }
    }

    /**
     * Rejeter une boutique
     */
    public function reject(Request $request, Shop $shop)
    {
        $validated = $request->validate([
            'rejection_reason' => 'required|string|max:500',
        ]);

        $shop->update([
            'status' => 'rejected',
            'rejection_reason' => $validated['rejection_reason'],
        ]);

        // Notification au vendeur
        $shop->user->notify(new \App\Notifications\ShopRejected($shop));

        return redirect()->route('admin.shops.index')
            ->with('success', 'La boutique a été rejetée.');
    }

    /**
     * Suspendre une boutique
     */
    public function suspend(Request $request, Shop $shop)
    {
        $validated = $request->validate([
            'suspension_reason' => 'required|string|max:500',
        ]);

        $shop->update([
            'status' => 'suspended',
            'suspension_reason' => $validated['suspension_reason'],
        ]);

        // Notification au vendeur
        $shop->user->notify(new \App\Notifications\ShopSuspended($shop));

        return redirect()->route('admin.shops.index')
            ->with('success', 'La boutique a été suspendue.');
    }

    /**
     * Réactiver une boutique suspendue
     */
    public function reactivate(Shop $shop)
    {
        $shop->update([
            'status' => 'approved',
            'suspension_reason' => null,
        ]);

        // Notification au vendeur
        $shop->user->notify(new \App\Notifications\ShopReactivated($shop));

        return redirect()->route('admin.shops.index')
            ->with('success', 'La boutique a été réactivée avec succès.');
    }

    /**
     * Afficher les boutiques en attente d'approbation
     */
    public function pending()
    {
        $shops = Shop::where('status', 'pending')->with('user')->latest()->paginate(10);
        return view('admin.shops.pending', compact('shops'));
    }
}
