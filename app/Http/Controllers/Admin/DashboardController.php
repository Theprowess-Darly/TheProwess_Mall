<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // User statistics
        $totalUsers = User::count();
        $usersByRole = User::selectRaw('role, count(*) as count')
            ->groupBy('role')
            ->pluck('count', 'role')
            ->toArray();
        
        // Shop statistics
        $totalShops = Shop::count();
        $activeShops = Shop::where('status', 'active')->count();
        $pendingShops = Shop::where('status', 'pending')->count();
        $suspendedShops = Shop::where('status', 'suspended')->count();
        
        // Product statistics
        $totalProducts = Product::count();
        
        // Order statistics
        $totalOrders = Order::count();
        // Modified this line to use 'status' instead of 'payment_status'
        $totalRevenue = Order::where('status', 'delivered')->sum('total');
        
        // Recent orders
        $recentOrders = Order::with('user')->latest()->take(5)->get();
        
        // Wallet balance (placeholder - adjust based on your actual model)
        $totalWalletBalance = 0; // Replace with actual wallet balance calculation
        
        // Recent users
        $recentUsers = User::latest()->take(5)->get();
        
        // Recent shops
        $recentShops = Shop::with('user')->latest()->take(5)->get();
        
        return view('admin.dashboard', compact(
            'totalUsers',
            'usersByRole',
            'totalShops',
            'activeShops',
            'pendingShops',
            'suspendedShops',
            'totalProducts',
            'totalOrders',
            'totalRevenue',
            'totalWalletBalance',
            'recentUsers',
            'recentShops',
            'recentOrders'
        ));
    }
}
