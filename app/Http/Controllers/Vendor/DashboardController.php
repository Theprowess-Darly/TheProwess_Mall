<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $vendor = auth()->user();
        $shop = $vendor->shop;
        
        if (!$shop) {
            return redirect()->route('vendor.profile')->with('error', 'Vous devez d\'abord créer une boutique');
        }
        
        // Récupérer les produits de la boutique
        $products = $shop->products();
        
        // Total des produits approuvés et rejetés
        $approvedProducts = $products->where('status', 'approved')->count();
        $rejectedProducts = $products->where('status', 'rejected')->count();
        
        // Récupérer les IDs des produits de la boutique
        $productIds = $shop->products()->pluck('id')->toArray();
        
        // Récupérer les commandes qui contiennent des produits de cette boutique
        $orderItems = OrderItem::whereIn('product_id', $productIds)->get();
        $orderIds = $orderItems->pluck('order_id')->unique()->toArray();
        
        // Récupérer les commandes complètes
        $orders = Order::whereIn('id', $orderIds)->get();
        
        // Commandes en cours (statut pending ou processing)
        $pendingOrders = $orders->whereIn('payment_status', ['pending', 'processing'])->count();
        
        // Commandes livrées (statut completed)
        $completedOrders = $orders->where('payment_status', 'complete')->count();

        $paidOrdersId = $orders->where('payment_status', 'complete')->pluck('id')->toArray();
        $orderItemsPaids = OrderItem::whereIn('order_id', $paidOrdersId)->get();
        // dd($paidOrdersId, $orderItemsPaids);
        
        // Total des commandes
        $totalOrders = $orders->count();
        
        // Calculer le revenu total (somme des prix des produits de la boutique dans toutes les commandes)
        $totalRevenue = $orderItemsPaids->sum(function($item) {
            return $item->price * $item->quantity;
        });
        
        // Nombre de clients uniques
        $totalCustomers = $orders->pluck('user_id')->unique()->count();
        
        // Commandes récentes
        $recentOrders = Order::whereIn('id', $orderIds)
            ->with('user')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
        
        // Produits populaires (les plus commandés)
        $topProducts = Product::where('shop_id', $shop->id)
            ->where('status', 'approved')
            ->withCount(['orderItems as sales_count' => function($query) {
                $query->select(DB::raw('SUM(quantity)'));
            }])
            ->orderBy('sales_count', 'desc')
            ->take(5)
            ->get();
        
        // Données pour le graphique des ventes (7 derniers jours)
        $salesData = [];
        $labels = [];
        
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i);
            $labels[] = $date->format('D'); // Jour de la semaine abrégé
            
            // Calculer les ventes pour ce jour
            $dailySales = OrderItem::whereIn('product_id', $productIds)
                ->whereHas('order', function($query) use ($date) {
                    $query->whereDate('created_at', $date);
                })
                ->sum(DB::raw('price * quantity'));
            
            $salesData[] = $dailySales;
        }
        
        $salesChartData = [
            'labels' => $labels,
            'data' => $salesData
        ];
        
        // Exemple de données de localisation des clients (à remplacer par des données réelles si disponibles)
        $customerLocations = [
            ['lat' => 6.1319, 'lng' => 1.2228, 'name' => 'Client A', 'orders' => 5],
            ['lat' => 6.1419, 'lng' => 1.2328, 'name' => 'Client B', 'orders' => 3],
            ['lat' => 6.1219, 'lng' => 1.2128, 'name' => 'Client C', 'orders' => 7],
            ['lat' => 6.1519, 'lng' => 1.2428, 'name' => 'Client D', 'orders' => 2],
            ['lat' => 6.1119, 'lng' => 1.2028, 'name' => 'Client E', 'orders' => 4],
        ];
        
        return view('vendor.dashboard', compact(
            'approvedProducts',
            'rejectedProducts',
            'pendingOrders',
            'completedOrders',
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
