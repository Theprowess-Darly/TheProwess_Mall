<?php

namespace App\Http\Controllers\Delivery;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Delivery;
use Carbon\Carbon;

class HistoryController extends Controller
{
    /**
     * Affiche l'historique des livraisons du livreur
     * 
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $deliveryPerson = auth()->user();
        
        $query = Delivery::whereIn('status', ['complete', 'cancelled'])
            ->where('delivery_person_id', $deliveryPerson->id)
            ->with(['order.user', 'order.orderItems.product'])
            ->latest();
        
        // Filtrage par période
        $period = $request->input('period', 'all');
        
        if ($period === 'today') {
            $query->whereDate('completed_at', Carbon::today());
        } elseif ($period === 'week') {
            $query->whereBetween('completed_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
        } elseif ($period === 'month') {
            $query->whereMonth('completed_at', Carbon::now()->month)
                  ->whereYear('completed_at', Carbon::now()->year);
        }
        
        $deliveries = $query->paginate(15);
        
        return view('delivery.history.index', compact('deliveries', 'period'));
    }
}