<?php

namespace App\Http\Controllers\Delivery;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Delivery;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Récupérer le livreur connecté
        $deliveryPerson = auth()->user();
        
        // Livraisons en attente (statut pending)
        $pendingDeliveries = Delivery::where('status', 'pending')
            ->where(function($query) use ($deliveryPerson) {
                $query->whereNull('delivery_person_id')
                      ->orWhere('delivery_person_id', $deliveryPerson->id);
            })
            ->count();
        
        // Livraisons en cours (statut in_progress)
        $inProgressDeliveries = Delivery::where('status', 'in_progress')
            ->where('delivery_person_id', $deliveryPerson->id)
            ->count();
        
        // Livraisons terminées aujourd'hui
        $completedDeliveries = Delivery::where('status', 'complete')
            ->where('delivery_person_id', $deliveryPerson->id)
            ->whereDate('completed_at', Carbon::today())
            ->count();
            
        // Statistiques de performance
        $totalCompletedDeliveries = Delivery::where('status', 'complete')
            ->where('delivery_person_id', $deliveryPerson->id)
            ->count();
            
        $averageDeliveryTime = Delivery::where('status', 'complete')
            ->where('delivery_person_id', $deliveryPerson->id)
            ->whereNotNull('completed_at')
            ->select(DB::raw('AVG(TIMESTAMPDIFF(MINUTE, created_at, completed_at)) as avg_time'))
            ->first()?->avg_time ?? 0;
            
        // Livraisons actuelles (en attente ou en cours)
        $currentDeliveries = Delivery::whereIn('status', ['pending', 'in_progress'])
            ->where(function($query) use ($deliveryPerson) {
                $query->where('delivery_person_id', $deliveryPerson->id)
                      ->orWhereNull('delivery_person_id');
            })
            ->with(['order.user', 'order.orderItems.product'])
            ->latest()
            ->get();
        
        // Historique des livraisons (terminées ou annulées)
        $deliveryHistory = Delivery::whereIn('status', ['complete', 'cancelled'])
            ->where('delivery_person_id', $deliveryPerson->id)
            ->with(['order.user', 'order.orderItems.product'])
            ->latest()
            ->take(5)
            ->get();
            
        // Données pour le graphique des livraisons (7 derniers jours)
        $deliveryData = [];
        $labels = [];
        
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i);
            $labels[] = $date->format('D'); // Jour de la semaine abrégé
            
            // Calculer les livraisons pour ce jour
            $dailyDeliveries = Delivery::where('delivery_person_id', $deliveryPerson->id)
                ->where('status', 'complete')
                ->whereDate('completed_at', $date)
                ->count();
            
            $deliveryData[] = $dailyDeliveries;
        }
        
        $deliveryChartData = [
            'labels' => $labels,
            'data' => $deliveryData
        ];
        
        // Revenus générés par les livraisons
        $totalEarnings = Delivery::where('delivery_person_id', $deliveryPerson->id)
            ->where('status', 'complete')
            ->count() * 500; // Supposons 500 FCFA par livraison
            
        // Revenus des 7 derniers jours
        $recentEarnings = [];
        
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i);
            
            $dailyEarnings = Delivery::where('delivery_person_id', $deliveryPerson->id)
                ->where('status', 'complete')
                ->whereDate('completed_at', $date)
                ->count() * 500; // 500 FCFA par livraison
            
            $recentEarnings[] = $dailyEarnings;
        }
        
        $earningsChartData = [
            'labels' => $labels,
            'data' => $recentEarnings
        ];
        
        return view('delivery.dashboard', compact(
            'pendingDeliveries',
            'inProgressDeliveries',
            'completedDeliveries',
            'totalCompletedDeliveries',
            'averageDeliveryTime',
            'currentDeliveries',
            'deliveryHistory',
            'deliveryChartData',
            'totalEarnings',
            'earningsChartData'
        ));
    }
}