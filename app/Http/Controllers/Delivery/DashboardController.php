<?php

namespace App\Http\Controllers\Delivery;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Get the current delivery person
        $deliveryPerson = auth()->user();
        
        // Pending deliveries (orders ready for delivery)
        $pendingDeliveries = Order::where('status', 'ready_for_delivery')
            ->count();
        
        // In progress deliveries (orders in transit)
        $inProgressDeliveries = Order::where('status', 'in_transit')
            ->count();
        
        // Completed deliveries today
        $completedDeliveries = Order::where('status', 'delivered')
            ->whereDate('updated_at', Carbon::today())
            ->count();
        
        // Current deliveries (orders ready for delivery or in transit)
        $currentDeliveries = Order::whereIn('status', ['ready_for_delivery', 'in_transit'])
            ->with('user')
            ->latest()
            ->get();
        
        // Delivery history (completed or cancelled deliveries)
        $deliveryHistory = Order::whereIn('status', ['delivered', 'cancelled'])
            ->with('user')
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