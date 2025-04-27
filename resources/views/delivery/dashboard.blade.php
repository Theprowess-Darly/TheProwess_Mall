<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-purple-950 dark:text-purple-300 leading-tight">
            {{ __('Tableau de bord livreur') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-purple-50 dark:bg-gray-800">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Statistics Overview -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-8">
                <!-- Pending Deliveries Card -->
                <div class="bg-white dark:bg-gray-700 overflow-hidden shadow-md border-l-4 border-yellow-500 dark:border-yellow-500 rounded-lg p-6 transition-all duration-300 hover:shadow-lg">
                    <div class="text-gray-900 dark:text-gray-100">
                        <div class="flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-purple-950 dark:text-purple-300">En attente</h3>
                            <div class="p-2 bg-yellow-100 dark:bg-yellow-900 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-600 dark:text-yellow-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                        </div>
                        <p class="text-3xl font-bold mt-2 text-purple-800 dark:text-white">{{ $pendingDeliveries ?? 0 }}</p>
                        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Livraisons en attente de prise en charge</p>
                    </div>
                </div>

                <!-- In Progress Deliveries Card -->
                <div class="bg-white dark:bg-gray-700 overflow-hidden shadow-md border-l-4 border-blue-500 dark:border-blue-500 rounded-lg p-6 transition-all duration-300 hover:shadow-lg">
                    <div class="text-gray-900 dark:text-gray-100">
                        <div class="flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-purple-950 dark:text-purple-300">En cours</h3>
                            <div class="p-2 bg-blue-100 dark:bg-blue-900 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600 dark:text-blue-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                            </div>
                        </div>
                        <p class="text-3xl font-bold mt-2 text-purple-800 dark:text-white">{{ $inProgressDeliveries ?? 0 }}</p>
                        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Livraisons en cours de traitement</p>
                    </div>
                </div>

                <!-- Completed Deliveries Card -->
                <div class="bg-white dark:bg-gray-700 overflow-hidden shadow-md border-l-4 border-green-500 dark:border-green-500 rounded-lg p-6 transition-all duration-300 hover:shadow-lg">
                    <div class="text-gray-900 dark:text-gray-100">
                        <div class="flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-purple-950 dark:text-purple-300">Complétées</h3>
                            <div class="p-2 bg-green-100 dark:bg-green-900 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600 dark:text-green-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                        </div>
                        <p class="text-3xl font-bold mt-2 text-purple-800 dark:text-white">{{ $completedDeliveries ?? 0 }}</p>
                        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Livraisons terminées aujourd'hui</p>
                    </div>
                </div>
            </div>

            <!-- Current Deliveries Section -->
            <div class="bg-white dark:bg-gray-700 overflow-hidden shadow-md rounded-lg p-6 mb-8">
                <div class="flex justify-between items-center mb-4 border-b border-gray-200 dark:border-gray-600 pb-2">
                    <h3 class="text-lg font-semibold text-purple-950 dark:text-purple-300">Livraisons actuelles</h3>
                    <a href="#" class="text-sm text-purple-600 dark:text-purple-400 hover:underline">Voir tout</a>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600">
                        <thead class="bg-purple-50 dark:bg-gray-800">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-purple-800 dark:text-purple-300 uppercase tracking-wider">ID</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-purple-800 dark:text-purple-300 uppercase tracking-wider">Client</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-purple-800 dark:text-purple-300 uppercase tracking-wider">Adresse</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-purple-800 dark:text-purple-300 uppercase tracking-wider">Statut</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-purple-800 dark:text-purple-300 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-700 divide-y divide-gray-200 dark:divide-gray-600">
                            @forelse($currentDeliveries ?? [] as $delivery)
                            <tr class="hover:bg-purple-50 dark:hover:bg-gray-600 transition-colors duration-150">
                                <td class="px-6 py-4 whitespace-nowrap text-gray-900 dark:text-gray-100">#{{ $delivery->id }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-gray-900 dark:text-gray-100">{{ $delivery->order->user->name ?? 'N/A' }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-gray-900 dark:text-gray-100">{{ $delivery->delivery_address ?? 'N/A' }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($delivery->status == 'pending')
                                        <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800 dark:bg-yellow-800 dark:text-yellow-100">
                                            En attente
                                        </span>
                                    @elseif($delivery->status == 'in_progress')
                                        <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800 dark:bg-blue-800 dark:text-blue-100">
                                            En cours
                                        </span>
                                    @elseif($delivery->status == 'completed')
                                        <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-800 dark:text-green-100">
                                            Livrée
                                        </span>
                                    @elseif($delivery->status == 'cancelled')
                                        <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800 dark:bg-red-800 dark:text-red-100">
                                            Annulée
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex space-x-2">
                                        <a href="#" class="text-purple-600 hover:text-purple-900 dark:text-purple-400 dark:hover:text-purple-300">
                                            Détails
                                        </a>
                                        @if($delivery->status == 'pending')
                                            <a href="#" class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300">
                                                Accepter
                                            </a>
                                        @elseif($delivery->status == 'in_progress')
                                            <a href="#" class="text-green-600 hover:text-green-900 dark:text-green-400 dark:hover:text-green-300">
                                                Terminer
                                            </a>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                                    Aucune livraison en cours
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Delivery History -->
            <div class="bg-white dark:bg-gray-700 overflow-hidden shadow-md rounded-lg p-6">
                <div class="flex justify-between items-center mb-4 border-b border-gray-200 dark:border-gray-600 pb-2">
                    <h3 class="text-lg font-semibold text-purple-950 dark:text-purple-300">Historique des livraisons</h3>
                    <a href="#" class="text-sm text-purple-600 dark:text-purple-400 hover:underline">Voir tout</a>
                </div>
                
                <div class="space-y-4">
                    @forelse($deliveryHistory ?? [] as $history)
                        <div class="flex items-center justify-between p-3 bg-gray-50 dark:bg-gray-800 rounded-lg">
                            <div class="flex items-center space-x-3">
                                <div class="flex-shrink-0">
                                    <div class="w-10 h-10 rounded-full bg-purple-100 dark:bg-purple-900 flex items-center justify-center">
                                        <span class="text-purple-800 dark:text-purple-200 font-medium">#{{ $history->id }}</span>
                                    </div>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-900 dark:text-gray-100">{{ $history->order->user->name ?? 'Client' }}</p>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">{{ $history->delivery_address ?? 'Adresse de livraison' }}</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ $history->completed_at ? $history->completed_at->format('d/m/Y H:i') : 'N/A' }}</p>
                                <span class="px-2 py-1 text-xs rounded-full 
                                    @if($history->status == 'completed') bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200 @endif
                                    @if($history->status == 'cancelled') bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200 @endif
                                ">
                                    @if($history->status == 'completed') Livrée @endif
                                    @if($history->status == 'cancelled') Annulée @endif
                                </span>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-4 text-gray-500 dark:text-gray-400">
                            Aucun historique de livraison disponible
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>