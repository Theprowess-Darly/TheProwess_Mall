<?php

namespace App\Http\Controllers\Delivery;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Delivery;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DeliveryController extends Controller
{
    /**
     * Affiche la liste des livraisons disponibles et en cours pour le livreur
     * 
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Récupérer le livreur connecté
        $deliveryPerson = auth()->user();
        
        // Livraisons en attente (disponibles pour prise en charge)
        $pendingDeliveries = Delivery::where('status', 'pending')
            ->whereNull('delivery_person_id')
            ->with(['order.user', 'order.orderItems.product'])
            ->latest()
            ->paginate(10);
        
        // Livraisons en cours pour ce livreur
        $inProgressDeliveries = Delivery::where('status', 'in_progress')
            ->where('delivery_person_id', $deliveryPerson->id)
            ->with(['order.user', 'order.orderItems.product'])
            ->latest()
            ->paginate(10);
        
        return view('delivery.deliveries.index', compact('pendingDeliveries', 'inProgressDeliveries'));
    }
    
    /**
     * Affiche les détails d'une livraison spécifique
     * 
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $delivery = Delivery::with(['order.user', 'order.orderItems.product'])
            ->findOrFail($id);
        
        return view('delivery.deliveries.show', compact('delivery'));
    }
    
    /**
     * Accepte une livraison en attente
     * 
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function accept($id)
    {
        $delivery = Delivery::findOrFail($id);
        
        // Vérifier que la livraison est en attente et n'est pas déjà assignée
        if ($delivery->status !== 'pending' || $delivery->delivery_person_id !== null) {
            return redirect()->back()->with('error', 'Cette livraison n\'est plus disponible.');
        }
        
        // Assigner la livraison au livreur connecté
        $delivery->update([
            'delivery_person_id' => auth()->id(),
            'status' => 'in_progress'
        ]);
        
        return redirect()->route('delivery.deliveries.show', $delivery->id)
            ->with('success', 'Livraison acceptée avec succès.');
    }
    
    /**
     * Marque une livraison comme terminée
     * 
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function complete($id)
    {
        $delivery = Delivery::findOrFail($id);
        
        // Vérifier que la livraison est en cours et assignée au livreur connecté
        if ($delivery->status !== 'in_progress' || $delivery->delivery_person_id !== auth()->id()) {
            return redirect()->back()->with('error', 'Vous ne pouvez pas terminer cette livraison.');
        }
        
        // Marquer la livraison comme terminée
        $delivery->update([
            'status' => 'complete',
            'completed_at' => now()
        ]);
        
        // Mettre à jour le statut de la commande
        $delivery->order->update([
            'status' => 'delivered'
        ]);
        
        return redirect()->route('delivery.deliveries.index')
            ->with('success', 'Livraison terminée avec succès.');
    }
}