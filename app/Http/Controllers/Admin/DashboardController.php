<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Shop;
use App\Models\Subscription;
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
        $activeShops = Shop::where('status', 'approved')->count();
        $pendingShops = Shop::where('status', 'pending')->count();
        $suspendedShops = Shop::where('status', 'suspended')->count();
        
        // Product statistics
        $totalProducts = Product::count();
        
        // Order statistics
        $totalOrders = Order::count();
        
        //Calcul du chiffre d'affaire total de la plateforme
        // $totalplatformRevenue = Order::where('status', 'delivered')->sum('total'); // Somme de toutes les ventes
        $totalRevenue = Order::where('status', 'delivered')->sum('total');
        
        // Recent orders
        $recentOrders = Order::with('user')->latest()->take(5)->get();
        
        // Calcul du revenu total des abonnements de boutiques
        $totalWalletBalance = Subscription::sum('amount'); // Somme de tous les montants d'abonnement
        // uniquement le abonements payés
       
        //$totalWalletBalance = Subscription::where('status', 'paid')->sum('amount');
      
       
        $conversionRate = 100; // Taux de conversion en FCFA
        $totalWalletBalance = $totalWalletBalance * $conversionRate; // Conversion en FCFA
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
