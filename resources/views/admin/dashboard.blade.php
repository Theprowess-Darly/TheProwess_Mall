<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-green-950 dark:text-green-300 leading-tight">
            {{ __('Tableau de bord administrateur') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-green-100 dark:bg-gray-800">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Statistics Overview -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
                <!-- Users Card -->
                <div class="bg-white dark:bg-gray-700 overflow-hidden shadow-md border-l-4 border-green-950 dark:border-green-500 rounded-lg p-6 transition-all duration-300 hover:shadow-lg">
                    <div class="text-gray-900 dark:text-gray-100">
                        <div class="flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-green-950 dark:text-green-300">Utilisateurs</h3>
                            <div class="p-2 bg-green-100 dark:bg-green-900 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600 dark:text-green-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            </div>
                        </div>
                        <p class="text-3xl font-bold mt-2 text-green-800 dark:text-white">{{ $totalUsers }}</p>
                        <div class="mt-4 text-sm">
                            <div class="flex justify-between mb-1">
                                <span>Admins</span>
                                <span class="font-medium text-green-700 dark:text-green-300">{{ $usersByRole['admin'] ?? 0 }}</span>
                            </div>
                            <div class="w-full bg-gray-200 dark:bg-gray-600 rounded-full h-2">
                                <div class="bg-purple-600 h-2 rounded-full" style="width: {{ ($usersByRole['admin'] ?? 0) / $totalUsers * 100 }}%"></div>
                            </div>
                            
                            <div class="flex justify-between mb-1 mt-2">
                                <span>Vendeurs</span>
                                <span class="font-medium text-green-700 dark:text-green-300">{{ $usersByRole['Marchand'] ?? 0 }}</span>
                            </div>
                            <div class="w-full bg-gray-200 dark:bg-gray-600 rounded-full h-2">
                                <div class="bg-blue-600 h-2 rounded-full" style="width: {{ ($usersByRole['Marchand'] ?? 0) / $totalUsers * 100 }}%"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Shops Card -->
                <div class="bg-white dark:bg-gray-700 overflow-hidden shadow-md border-l-4 border-green-950 dark:border-green-500 rounded-lg p-6 transition-all duration-300 hover:shadow-lg">
                    <div class="text-gray-900 dark:text-gray-100">
                        <div class="flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-green-950 dark:text-green-300">Boutiques</h3>
                            <div class="p-2 bg-green-100 dark:bg-green-900 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600 dark:text-green-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                </svg>
                            </div>
                        </div>
                        <p class="text-3xl font-bold mt-2 text-green-800 dark:text-white">{{ $totalShops }}</p>
                        <div class="mt-4 text-sm">
                            <div class="flex justify-between mb-1">
                                <span>Actives</span>
                                <span class="font-medium text-green-700 dark:text-green-300">{{ $activeShops }}</span>
                            </div>
                            <div class="w-full bg-gray-200 dark:bg-gray-600 rounded-full h-2">
                                <div class="bg-green-600 h-2 rounded-full" style="width: {{ $totalShops > 0 ? $activeShops / $totalShops * 100 : 0 }}%"></div>
                            </div>
                            
                            <div class="flex justify-between mb-1 mt-2">
                                <span>En attente</span>
                                <span class="font-medium text-green-700 dark:text-green-300">{{ $pendingShops }}</span>
                            </div>
                            <div class="w-full bg-gray-200 dark:bg-gray-600 rounded-full h-2">
                                <div class="bg-yellow-600 h-2 rounded-full" style="width: {{ $totalShops > 0 ? $pendingShops / $totalShops * 100 : 0 }}%"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Products Card -->
                <div class="bg-white dark:bg-gray-700 overflow-hidden shadow-md border-l-4 border-green-950 dark:border-green-500 rounded-lg p-6 transition-all duration-300 hover:shadow-lg">
                    <div class="text-gray-900 dark:text-gray-100">
                        <div class="flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-green-950 dark:text-green-300">Produits</h3>
                            <div class="p-2 bg-green-100 dark:bg-green-900 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600 dark:text-green-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10l-8 4" />
                                </svg>
                            </div>
                        </div>
                        <p class="text-3xl font-bold mt-2 text-green-800 dark:text-white">{{ $totalProducts }}</p>
                        <div class="mt-4">
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-600 dark:text-gray-400">Croissance mensuelle</span>
                                <span class="text-sm font-medium text-green-600 dark:text-green-400">+12%</span>
                            </div>
                            <div class="w-full h-2 bg-gray-200 dark:bg-gray-600 rounded-full mt-1">
                                <div class="h-2 bg-green-600 rounded-full" style="width: 75%"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Orders Card -->
                <div class="bg-white dark:bg-gray-700 overflow-hidden shadow-md border-l-4 border-green-950 dark:border-green-500 rounded-lg p-6 transition-all duration-300 hover:shadow-lg">
                    <div class="text-gray-900 dark:text-gray-100">
                        <div class="flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-green-950 dark:text-green-300">Commandes</h3>
                            <div class="p-2 bg-green-100 dark:bg-green-900 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600 dark:text-green-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                            </div>
                        </div>
                        <p class="text-3xl font-bold mt-2 text-green-800 dark:text-white">{{ $totalOrders }}</p>
                        <p class="mt-2 text-sm">Revenu total: <span class="font-medium text-green-700 dark:text-green-300">{{ number_format($totalRevenue, 0, ',', ' ') }} XAF</span></p>
                        <div class="mt-2">
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-600 dark:text-gray-400">Taux de conversion</span>
                                <span class="text-sm font-medium text-green-600 dark:text-green-400">3.2%</span>
                            </div>
                            <div class="w-full h-2 bg-gray-200 dark:bg-gray-600 rounded-full mt-1">
                                <div class="h-2 bg-green-600 rounded-full" style="width: 32%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts Section -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                <!-- Sales Chart -->
                <div class="bg-white dark:bg-gray-700 overflow-hidden shadow-md rounded-lg p-6 dark:text-white">
                    <h3 class="text-lg font-semibold text-green-950 dark:text-green-300 mb-4 border-b border-gray-200 dark:border-gray-600 pb-2">Ventes des 7 derniers jours</h3>
                    <div class=" dark:text-white h-80">
                        <canvas id="salesChart"></canvas>
                    </div>
                </div>
                
                <!-- User Distribution Chart -->
                <div class="bg-white dark:bg-gray-700 overflow-hidden shadow-md rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-green-950 dark:text-green-300 mb-4 border-b border-gray-200 dark:border-gray-600 pb-2">Distribution des utilisateurs</h3>
                    <div class="h-80">
                        <canvas id="userDistributionChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Recent Orders Section -->
            <div class="bg-white dark:bg-gray-700 overflow-hidden shadow-md rounded-lg p-6 mb-8">
                <div class="flex justify-between items-center mb-4 border-b border-gray-200 dark:border-gray-600 pb-2">
                    <h3 class="text-lg font-semibold text-green-950 dark:text-green-300">Commandes récentes</h3>
                    <a href="{{ route('admin.orders.index') }}" class="text-sm text-green-600 dark:text-green-400 hover:underline">Voir tout</a>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600">
                        <thead class="bg-green-50 dark:bg-gray-800">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-green-800 dark:text-green-300 uppercase tracking-wider">ID</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-green-800 dark:text-green-300 uppercase tracking-wider">Client</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-green-800 dark:text-green-300 uppercase tracking-wider">Total</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-green-800 dark:text-green-300 uppercase tracking-wider">Statut</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-green-800 dark:text-green-300 uppercase tracking-wider">Date</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-green-800 dark:text-green-300 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-700 divide-y divide-gray-200 dark:divide-gray-600">
                            @foreach($recentOrders as $order)
                            <tr class="hover:bg-green-50 dark:hover:bg-gray-600 transition-colors duration-150">
                                <td class="px-6 py-4 whitespace-nowrap text-gray-900 dark:text-gray-100">#{{ $order->id }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-gray-900 dark:text-gray-100">{{ $order->user->name ?? 'N/A' }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-gray-900 dark:text-gray-100">{{ number_format($order->total, 0, ',', ' ') }} XAF</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($order->status == 'pending')
                                        <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800 dark:bg-yellow-800 dark:text-yellow-100">
                                            En attente
                                        </span>
                                    @elseif($order->status == 'processing')
                                        <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800 dark:bg-blue-800 dark:text-blue-100">
                                            En traitement
                                        </span>
                                    @elseif($order->status == 'shipped')
                                        <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-indigo-100 text-indigo-800 dark:bg-indigo-800 dark:text-indigo-100">
                                            Expédiée
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
                                <td class="px-6 py-4 whitespace-nowrap text-gray-900 dark:text-gray-100">{{ $order->created_at->format('d/m/Y') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="{{ route('admin.orders.show', $order->id) }}" class="text-green-600 hover:text-green-900 dark:text-green-400 dark:hover:text-green-300 mr-3">
                                        Voir
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart.js Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Sales Chart
            const salesCtx = document.getElementById('salesChart').getContext('2d');
            const salesChart = new Chart(salesCtx, {
                type: 'line',
                data: {
                    labels: ['Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam', 'Dim'],
                    datasets: [{
                        label: 'Ventes (XAF)',
                        data: [65000, 59000, 80000, 81000, 56000, 95000, 40000],
                        backgroundColor: 'rgba(16, 185, 129, 0.2)',
                        borderColor: 'rgba(16, 185, 129, 1)',
                        borderWidth: 2,
                        tension: 0.3,
                        pointBackgroundColor: 'rgba(16, 185, 129, 1)',
                        pointBorderColor: '#fff',
                        pointBorderWidth: 2,
                        pointRadius: 4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top',
                            labels: {
                                color: document.documentElement.classList.contains('dark') ? '#d1d5db' : '#1f2937'
                            }
                        },
                        tooltip: {
                            mode: 'index',
                            intersect: false,
                            backgroundColor: document.documentElement.classList.contains('dark') ? '#374151' : '#ffffff',
                            titleColor: document.documentElement.classList.contains('dark') ? '#d1d5db' : '#1f2937',
                            bodyColor: document.documentElement.classList.contains('dark') ? '#d1d5db' : '#1f2937',
                            borderColor: document.documentElement.classList.contains('dark') ? '#4b5563' : '#e5e7eb',
                            borderWidth: 1,
                            callbacks: {
                                label: function(context) {
                                    let label = context.dataset.label || '';
                                    if (label) {
                                        label += ': ';
                                    }
                                    if (context.parsed.y !== null) {
                                        label += new Intl.NumberFormat('fr-FR').format(context.parsed.y) + ' XAF';
                                    }
                                    return label;
                                }
                            }
                        }
                    },
                    scales: {
                        x: {
                            grid: {
                                color: document.documentElement.classList.contains('dark') ? 'rgba(75, 85, 99, 0.2)' : 'rgba(229, 231, 235, 0.8)'
                            },
                            ticks: {
                                color: document.documentElement.classList.contains('dark') ? '#d1d5db' : '#4b5563'
                            }
                        },
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: document.documentElement.classList.contains('dark') ? 'rgba(75, 85, 99, 0.2)' : 'rgba(229, 231, 235, 0.8)'
                            },
                            ticks: {
                                color: document.documentElement.classList.contains('dark') ? '#d1d5db' : '#4b5563',
                                callback: function(value) {
                                    return new Intl.NumberFormat('fr-FR').format(value) + ' XAF';
                                }
                            }
                        }
                    }
                }
            });

            // User Distribution Chart
            const userDistributionCtx = document.getElementById('userDistributionChart').getContext('2d');
            const userDistributionChart = new Chart(userDistributionCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Clients', 'Vendeurs', 'Livreurs', 'Admins'],
                    datasets: [{
                        data: [
                            {{ $usersByRole['client'] ?? 0 }}, 
                            {{ $usersByRole['Marchand'] ?? 0 }}, 
                            {{ $usersByRole['livreur'] ?? 0 }}, 
                            {{ $usersByRole['admin'] ?? 0 }}
                        ],
                        backgroundColor: [
                            'rgba(96, 165, 250, 0.8)',
                            'rgba(16, 185, 129, 0.8)',
                            'rgba(251, 191, 36, 0.8)',
                            'rgba(139, 92, 246, 0.8)'
                        ],
                        borderColor: [
                            'rgba(96, 165, 250, 1)',
                            'rgba(16, 185, 129, 1)',
                            'rgba(251, 191, 36, 1)',
                            'rgba(139, 92, 246, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                padding: 20,
                                color: document.documentElement.classList.contains('dark') ? '#d1d5db' : '#1f2937'
                            }
                        },
                        tooltip: {
                            backgroundColor: document.documentElement.classList.contains('dark') ? '#374151' : '#ffffff',
                            titleColor: document.documentElement.classList.contains('dark') ? '#d1d5db' : '#1f2937',
                            bodyColor: document.documentElement.classList.contains('dark') ? '#d1d5db' : '#1f2937',
                            borderColor: document.documentElement.classList.contains('dark') ? '#4b5563' : '#e5e7eb',
                            borderWidth: 1
                        }
                    },
                    cutout: '70%'
                }
            });
        });
    </script>
</x-app-layout>