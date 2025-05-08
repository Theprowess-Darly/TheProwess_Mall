<?php

namespace App\Http\Controllers\Delivery;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Delivery;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class EarningsController extends Controller
{
    /**
     * Affiche les gains du livreur
     * 
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $deliveryPerson = auth()->user();
        $period = $request->input('period', 'month');
        
        // Calculer les gains par période
        if ($period === 'week') {
            $startDate = Carbon::now()->startOfWeek();
            $endDate = Carbon::now()->endOfWeek();
            $groupBy = 'day';
            $dateFormat = 'Y-m-d';
            $labelFormat = 'D'; // Jour de la semaine abrégé
        } elseif ($period === 'month') {
            $startDate = Carbon::now()->startOfMonth();
            $endDate = Carbon::now()->endOfMonth();
            $groupBy = 'day';
            $dateFormat = 'Y-m-d';
            $labelFormat = 'd'; // Jour du mois
        } elseif ($period === 'year') {
            $startDate = Carbon::now()->startOfYear();
            $endDate = Carbon::now()->endOfYear();
            $groupBy = 'month';
            $dateFormat = 'Y-m';
            $labelFormat = 'M'; // Mois abrégé
        } else {
            // Par défaut, afficher le mois en cours
            $startDate = Carbon::now()->startOfMonth();
            $endDate = Carbon::now()->endOfMonth();
            $groupBy = 'day';
            $dateFormat = 'Y-m-d';
            $labelFormat = 'd';
        }
        
        // Récupérer les livraisons terminées pour la période
        $deliveries = Delivery::where('delivery_person_id', $deliveryPerson->id)
            ->where('status', 'complete')
            ->whereBetween('completed_at', [$startDate, $endDate])
            ->get();
        
        // Calculer les gains par jour/mois
        $earningsByPeriod = [];
        $labels = [];
        $data = [];
        
        // Initialiser le tableau avec toutes les dates de la période
        $currentDate = clone $startDate;
        while ($currentDate <= $endDate) {
            $dateKey = $currentDate->format($dateFormat);
            $earningsByPeriod[$dateKey] = 0;
            
            if ($groupBy === 'day') {
                $currentDate->addDay();
            } else {
                $currentDate->addMonth();
            }
        }
        
        // Calculer les gains pour chaque livraison (500 FCFA par livraison)
        foreach ($deliveries as $delivery) {
            $dateKey = $delivery->completed_at->format($dateFormat);
            if (isset($earningsByPeriod[$dateKey])) {
                $earningsByPeriod[$dateKey] += 500; // 500 FCFA par livraison
            }
        }
        
        // Préparer les données pour le graphique
        foreach ($earningsByPeriod as $date => $amount) {
            $labels[] = Carbon::createFromFormat($dateFormat, $date)->format($labelFormat);
            $data[] = $amount;
        }
        
        $chartData = [
            'labels' => $labels,
            'data' => $data
        ];
        
        // Calculer les totaux
        $totalEarnings = array_sum($data);
        $totalDeliveries = $deliveries->count();
        $averagePerDay = $totalDeliveries > 0 ? $totalEarnings / count($earningsByPeriod) : 0;
        
        return view('delivery.earnings.index', compact(
            'chartData', 
            'totalEarnings', 
            'totalDeliveries', 
            'averagePerDay', 
            'period'
        ));
    }
}