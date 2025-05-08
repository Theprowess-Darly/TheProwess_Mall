<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-green-950 dark:text-green-300 leading-tight">
            {{ __('Tableau de bord marchand') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-green-50 dark:bg-gray-800">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Statistics Overview -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
                <!-- Products Card -->
                <div class="bg-white dark:bg-gray-700 overflow-hidden shadow-md border-l-4 border-blue-500 dark:border-blue-500 rounded-lg p-6 transition-all duration-300 hover:shadow-lg">
                    <div class="text-gray-900 dark:text-gray-100">
                        <div class="flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-green-950 dark:text-green-300">Produits</h3>
                            <div class="p-2 bg-blue-100 dark:bg-blue-900 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600 dark:text-blue-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10l-8 4" />
                                </svg>
                            </div>
                        </div>
                        <div class="flex justify-between w-full">
                            <div>                            
                                <p class="text-3xl font-bold mt-2 text-green-800 dark:text-white">{{ auth()->user()->shop->products()->where('status', 'approved')->count() }}</p>
                                <p class="mt-2 text-sm text-gray-600 dark:text-gray-400"> Approuvés</p>
                            </div>
                            <div>
                                <p class="text-3xl font-bold mt-2 text-yellow-700 dark:text-white">{{ auth()->user()->shop->products()->where('status', 'rejected')->count() }}</p>
                                <p class="mt-2 text-sm text-gray-600 dark:text-gray-400"> Rejettés</p>
          
                            </div>         
                        </div>
                    </div>
                </div>

                <!-- Orders Card -->
                <div class="bg-white dark:bg-gray-700 overflow-hidden shadow-md border-l-4 border-yellow-500 dark:border-yellow-500 rounded-lg p-6 transition-all duration-300 hover:shadow-lg">
                    <div class="text-gray-900 dark:text-gray-100">
                        <div class="flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-green-950 dark:text-green-300">Commandes</h3>
                            <div class="p-2 bg-yellow-100 dark:bg-yellow-900 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-600 dark:text-yellow-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                            </div>
                        </div>
                        <div class="flex justify-between w-full">
                            <div>  
                                <p class="text-3xl font-bold mt-2 text-green-800 dark:text-white">{{ $pendingOrders }}</p>
                                <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">En cours</p>
                            </div>
                            <div>
                                <p class="text-3xl font-bold mt-2 text-green-800 dark:text-white">{{ $completedOrders }}</p>
                                <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Payés</p>
                            </div>
                        </div>
                        <div class="flex justify-between w-full mt-2">
                            <p class="text-sm text-gray-600 dark:text-gray-400">Total des commandes</p>                            
                            <p class="text-lg font-bold text-green-800 dark:text-white">{{ $totalOrders }}</p>
                        </div>
                    </div>
                </div>

                <!-- Revenue Card -->
                <div class="bg-white dark:bg-gray-700 overflow-hidden shadow-md border-l-4 border-green-500 dark:border-green-500 rounded-lg p-6 transition-all duration-300 hover:shadow-lg">
                    <div class="text-gray-900 dark:text-gray-100">
                        <div class="flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-green-950 dark:text-green-300">Revenus</h3>
                            <div class="p-2 bg-green-100 dark:bg-green-900 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600 dark:text-green-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                        </div>
                        <p class="text-xl font-bold mt-2 text-green-800 dark:text-white">{{ number_format($totalRevenue, 0, ',', ' ') }} FCFA</p>
                        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Mon chifre d'affaire sur TPM </p>
                    </div>
                </div>

                <!-- Customers Card -->
                <div class="bg-white dark:bg-gray-700 overflow-hidden shadow-md border-l-4 border-purple-500 dark:border-purple-500 rounded-lg p-6 transition-all duration-300 hover:shadow-lg">
                    <div class="text-gray-900 dark:text-gray-100">
                        <div class="flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-green-950 dark:text-green-300">Clients</h3>
                            <div class="p-2 bg-purple-100 dark:bg-purple-900 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600 dark:text-purple-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </div>
                        </div>
                        <p class="text-3xl font-bold mt-2 text-green-800 dark:text-white">{{ $totalCustomers }}</p>
                        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Clients uniques</p>
                    </div>
                </div>
            </div>

            <!-- Sales Chart -->
            <div class="bg-white dark:bg-gray-700 overflow-hidden shadow-md rounded-lg p-6 mb-8">
                <div class="flex justify-between items-center mb-4 border-b border-gray-200 dark:border-gray-600 pb-2">
                    <h3 class="text-lg font-semibold text-green-950 dark:text-green-300">Évolution des ventes</h3>
                    <div class="flex space-x-2">
                        <button class="px-3 py-1 text-xs bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200 rounded-full">Semaine</button>
                        <button class="px-3 py-1 text-xs bg-gray-100 text-gray-800 dark:bg-gray-800 dark:text-gray-200 rounded-full">Mois</button>
                        <button class="px-3 py-1 text-xs bg-gray-100 text-gray-800 dark:bg-gray-800 dark:text-gray-200 rounded-full">Année</button>
                    </div>
                </div>
                
                <div class="w-full h-64">
                    <!-- Sales Chart Canvas -->
                    <canvas id="salesChart"></canvas>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                <!-- Recent Orders -->
                <div class="bg-white dark:bg-gray-700 overflow-hidden shadow-md rounded-lg p-6">
                    <div class="flex justify-between items-center mb-4 border-b border-gray-200 dark:border-gray-600 pb-2">
                        <h3 class="text-lg font-semibold text-green-950 dark:text-green-300">Commandes récentes</h3>
                        <a href="{{ route('vendor.orders.index') }}" class="text-sm text-green-600 dark:text-green-400 hover:underline">Voir tout</a>
                    </div>
                    
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600">
                            <thead class="bg-green-50 dark:bg-gray-800">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-green-800 dark:text-green-300 uppercase tracking-wider">ID</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-green-800 dark:text-green-300 uppercase tracking-wider">Client</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-green-800 dark:text-green-300 uppercase tracking-wider">Montant</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-green-800 dark:text-green-300 uppercase tracking-wider">Statut de paiement</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-green-800 dark:text-green-300 uppercase tracking-wider">Statut de livrason</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-700 divide-y divide-gray-200 dark:divide-gray-600">
                                @forelse($recentOrders ?? [] as $order)
                                <tr class="hover:bg-green-50 dark:hover:bg-gray-600 transition-colors duration-150">
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-900 dark:text-gray-100">#{{ $order->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-900 dark:text-gray-100">{{ $order->user->name ?? 'N/A' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-900 dark:text-gray-100">{{ number_format($order->total_amount, 0, ',', ' ') }} FCFA</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($order->payment_status == 'pending')
                                            <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800 dark:bg-yellow-800 dark:text-yellow-100">
                                                En attente
                                            </span>
                                        @elseif($order->payment_status == 'processing')
                                            <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800 dark:bg-blue-800 dark:text-blue-100">
                                                En traitement
                                            </span>
                                        @elseif($order->payment_status == 'complete')
                                            <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-800 dark:text-green-100">
                                                Complétée
                                            </span>
                                        @elseif($order->payment_status == 'cancelled')
                                            <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800 dark:bg-red-800 dark:text-red-100">
                                                Annulée
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($order->status == 'pending')
                                            <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800 dark:bg-yellow-800 dark:text-yellow-100">
                                                En attente
                                            </span>
                                        @elseif($order->status == 'processing')
                                            <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800 dark:bg-blue-800 dark:text-blue-100">
                                                En préparation
                                            </span>
                                        @elseif($order->status == 'ready_for_delivery')
                                            <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-purple-100 text-purple-800 dark:bg-purple-800 dark:text-purple-100">
                                                Prête à livrer
                                            </span>
                                        @elseif($order->status == 'in_transit')
                                            <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-indigo-100 text-indigo-800 dark:bg-indigo-800 dark:text-indigo-100">
                                                En transit
                                            </span>
                                        @elseif($order->status == 'delivered')
                                            <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-800 dark:text-green-100">
                                                Livrée
                                            </span>
                                        @elseif($order->status == 'cancelled')
                                            <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800 dark:bg-red-800 dark:text-red-100">
                                                Annulée
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                                        Aucune commande récente
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Top Products -->
                <div class="bg-white dark:bg-gray-700 overflow-hidden shadow-md rounded-lg p-6">
                    <div class="flex justify-between items-center mb-4 border-b border-gray-200 dark:border-gray-600 pb-2">
                        <h3 class="text-lg font-semibold text-green-950 dark:text-green-300">Produits populaires</h3>
                        <a href="#" class="text-sm text-green-600 dark:text-green-400 hover:underline">Voir tout</a>
                    </div>
                    
                    <div class="space-y-4">
                        @forelse($topProducts ?? [] as $product)
                            <div class="flex items-center p-3 bg-gray-50 dark:bg-gray-800 rounded-lg">
                                <div class="flex-shrink-0 h-12 w-12 rounded-md overflow-hidden">
                                    <img loading="lazy" src="{{ $product->image_url ? asset('storage/' . str_replace('storage/', '', $product->image_url)) : asset('images/placeholder.png') }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">                                </div>
                                <div class="ml-4 flex-1">
                                    <div class="flex justify-between">
                                        <p class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ $product->name }}</p>
                                        <p class="text-sm font-medium text-green-600 dark:text-green-400">{{ number_format($product->price, 0, ',', ' ') }} FCFA</p>
                                    </div>
                                    <div class="flex justify-between items-center mt-1">
                                        <p class="text-xs text-gray-500 dark:text-gray-400">{{ $product->category->name ?? 'Sans catégorie' }}</p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">{{ $product->sales_count ?? 0 }} ventes</p>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-4 text-gray-500 dark:text-gray-400">
                                Aucun produit populaire
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Map of Customer Distribution -->
            <div class="bg-white dark:bg-gray-700 overflow-hidden shadow-md rounded-lg p-6">
                <div class="flex justify-between items-center mb-4 border-b border-gray-200 dark:border-gray-600 pb-2">
                    <h3 class="text-lg font-semibold text-green-950 dark:text-green-300">Répartition géographique des clients</h3>
                </div>
                
                <div class="w-full h-96">
                    <!-- Map Canvas -->
                    <div id="customerMap" class="w-full h-full rounded-lg"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart.js and Map Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    
    <script>
        // Sales Chart
        const ctx = document.getElementById('salesChart').getContext('2d');
        const salesChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!! json_encode($salesChartData['labels'] ?? ['Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam', 'Dim']) !!},
                datasets: [{
                    label: 'Ventes',
                    data: {!! json_encode($salesChartData['data'] ?? [12000, 19000, 15000, 25000, 22000, 30000, 28000]) !!},
                    backgroundColor: 'rgba(34, 197, 94, 0.2)',
                    borderColor: 'rgba(34, 197, 94, 1)',
                    borderWidth: 2,
                    tension: 0.3,
                    pointBackgroundColor: 'rgba(34, 197, 94, 1)',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2,
                    pointRadius: 4,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(0, 0, 0, 0.05)'
                        },
                        ticks: {
                            callback: function(value) {
                                return value.toLocaleString() + ' FCFA';
                            }
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return context.raw.toLocaleString() + ' FCFA';
                            }
                        }
                    }
                }
            }
        });

        // Customer Map
        const map = L.map('customerMap').setView([6.1319, 1.2228], 13); // Lomé, Togo coordinates
        
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Sample customer locations (replace with actual data)
        const customerLocations = {!! json_encode($customerLocations ?? [
            ['lat' => 6.1319, 'lng' => 1.2228, 'name' => 'Client A', 'orders' => 5],
            ['lat' => 6.1419, 'lng' => 1.2328, 'name' => 'Client B', 'orders' => 3],
            ['lat' => 6.1219, 'lng' => 1.2128, 'name' => 'Client C', 'orders' => 7],
            ['lat' => 6.1519, 'lng' => 1.2428, 'name' => 'Client D', 'orders' => 2],
            ['lat' => 6.1119, 'lng' => 1.2028, 'name' => 'Client E', 'orders' => 4],
        ]) !!};

        customerLocations.forEach(location => {
            L.marker([location.lat, location.lng]).addTo(map)
                .bindPopup(`<b>${location.name}</b><br>Commandes: ${location.orders}`);
        });
    </script>
</x-app-layout>