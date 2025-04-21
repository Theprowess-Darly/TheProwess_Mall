<?php

namespace App\Http\Controllers\Delivery;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Delivery;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Get the current delivery person
        $deliveryPerson = Auth::user();
        
        // Count deliveries by status
        $pendingDeliveries = Delivery::where('status', 'pending')->count();
        $inProgressDeliveries = Delivery::where('status', 'in_progress')
            ->where('delivery_person_id', $deliveryPerson->id)
            ->count();
        $completedDeliveries = Delivery::where('status', 'completed')
            ->where('delivery_person_id', $deliveryPerson->id)
            ->whereDate('completed_at', now())
            ->count();
            
        // Get current deliveries for this delivery person
        $currentDeliveries = Delivery::with(['order.user'])
            ->where('delivery_person_id', $deliveryPerson->id)
            ->whereIn('status', ['pending', 'in_progress'])
            ->latest()
            ->take(5)
            ->get();
            
        // Get delivery history
        $deliveryHistory = Delivery::with(['order.user'])
            ->where('delivery_person_id', $deliveryPerson->id)
            ->whereIn('status', ['completed', 'cancelled'])
            ->latest()
            ->take(5)
            ->get();
            
        return view('delivery.dashboard', compact(
            'pendingDeliveries',
            'inProgressDeliveries',
            'completedDeliveries',
            'currentDeliveries',
            'deliveryHistory'
        ));
    }
}