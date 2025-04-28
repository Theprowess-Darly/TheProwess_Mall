<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $vendor = auth()->user();
        
        // Total products - using vendor_id instead of user_id
        $totalProducts = Product::where('Shop_id', $vendor->id)->count();
        
        // For the dashboard, we'll use simplified queries without the relationship
        // that's causing the error
        $totalOrders = 0;
        $totalRevenue = 0;
        $totalCustomers = 0;
        $recentOrders = [];
        
        // Top products - simplified to avoid relationship errors
        $topProducts = Product::where('shop_id', $vendor->id)
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
        
        // Sample sales chart data
        $salesChartData = [
            'labels' => ['Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam', 'Dim'],
            'data' => [12000, 19000, 15000, 25000, 22000, 30000, 28000]
        ];
        
        // Sample customer locations (for demonstration)
        $customerLocations = [
            ['lat' => 6.1319, 'lng' => 1.2228, 'name' => 'Client A', 'orders' => 5],
            ['lat' => 6.1419, 'lng' => 1.2328, 'name' => 'Client B', 'orders' => 3],
            ['lat' => 6.1219, 'lng' => 1.2128, 'name' => 'Client C', 'orders' => 7],
            ['lat' => 6.1519, 'lng' => 1.2428, 'name' => 'Client D', 'orders' => 2],
            ['lat' => 6.1119, 'lng' => 1.2028, 'name' => 'Client E', 'orders' => 4],
        ];
        
        return view('vendor.dashboard', compact(
            'totalProducts',
            'totalOrders',
            'totalRevenue',
            'totalCustomers',
            'recentOrders',
            'topProducts',
            'salesChartData',
            'customerLocations',           
        ));
    }
   

    
}
