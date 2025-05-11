<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between w-full items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Mes Abonnements') }}
            </h2>
            <a href="{{ route('vendor.subscription.plans') }}" class="inline-flex items-center px-4 py-2 bg-green-950 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-950 transition ease-in-out duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                Voir les plans disponibles
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-md rounded-lg">
                <div class="p-6">
                    <h2 class="text-2xl font-bold text-green-950 dark:text-green-400 mb-6">Historique des abonnements</h2>
                    
                    @if (session('success'))
                        <div class="mb-6 p-4 bg-green-100 border-l-4 border-green-950 text-green-950 dark:bg-green-800/30 dark:text-green-100 rounded">
                            {{ session('success') }}
                        </div>
                    @endif
    
                    @if (session('error'))
                        <div class="mb-6 p-4 bg-red-100 border-l-4 border-red-500 text-red-700 dark:bg-red-800/30 dark:text-red-100 rounded">
                            {{ session('error') }}
                        </div>
                    @endif
    
                    @if ($subscriptions->count() > 0)
                        <!-- Abonnement actif en évidence -->
                        @php
                            $activeSubscription = $subscriptions->where('status', 'active')->first();
                        @endphp
                        
                        @if($activeSubscription)
                            <div class="mb-8 bg-gradient-to-r from-green-50 to-green-100 dark:from-green-900/20 dark:to-green-800/20 rounded-lg p-6 shadow-md transform transition-all duration-300 hover:shadow-lg border border-green-200 dark:border-green-800">
                                <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                                    <div>
                                        <h3 class="text-xl font-bold text-green-950 dark:text-green-400 mb-2">Abonnement actif</h3>
                                        <div class="text-lg font-semibold text-green-800 dark:text-green-300">{{ $activeSubscription->plan->name }}</div>
                                        <div class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                                            <p>Expire le: <span class="font-medium text-green-700 dark:text-green-300">{{ $activeSubscription->ends_at ? $activeSubscription->ends_at->format('d/m/Y') : 'N/A' }}</span></p>
                                            <p class="mt-1">Jours restants: <span class="font-medium text-green-700 dark:text-green-300">{{ $activeSubscription->ends_at ? $activeSubscription->ends_at->diffInDays(now()) : 'N/A' }}</span></p>
                                        </div>
                                    </div>
                                    <div class="flex flex-col sm:flex-row gap-3">
                                        <a href="{{ route('vendor.dashboard') }}" class="inline-flex items-center justify-center px-4 py-2 bg-green-950 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-950 transition ease-in-out duration-150 transform hover:scale-105">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                            </svg>
                                            Tableau de bord
                                        </a>
                                        <a href="{{ route('vendor.subscription.plans') }}" class="inline-flex items-center justify-center px-4 py-2 bg-white border border-green-950 rounded-md font-semibold text-xs text-green-950 uppercase tracking-widest hover:bg-green-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-950 transition ease-in-out duration-150 transform hover:scale-105">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                            </svg>
                                            Renouveler
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endif
                        
                        <div class="overflow-x-auto bg-white dark:bg-gray-800 rounded-lg shadow-md">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <thead class="bg-gray-50 dark:bg-gray-700">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-green-950 dark:text-gray-300 uppercase tracking-wider">Plan</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-green-950 dark:text-gray-300 uppercase tracking-wider">Montant</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-green-950 dark:text-gray-300 uppercase tracking-wider">Statut</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-green-950 dark:text-gray-300 uppercase tracking-wider">Date de début</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-green-950 dark:text-gray-300 uppercase tracking-wider">Date de fin</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-green-950 dark:text-gray-300 uppercase tracking-wider">Date de création</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-green-950 dark:text-gray-300 uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                    @foreach ($subscriptions as $subscription)
                                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300">{{ $subscription->plan->name }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300">{{ number_format($subscription->amount, 0, ',', ' ') }} FCFA</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                @if ($subscription->status == 'pending')
                                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-700 dark:bg-yellow-800/30 dark:text-yellow-300">En attente de paiement</span>
                                                @elseif ($subscription->status == 'active')
                                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-950 dark:bg-green-800/30 dark:text-green-300">Actif</span>
                                                @elseif ($subscription->status == 'expired')
                                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300">Expiré</span>
                                                @elseif ($subscription->status == 'cancelled')
                                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800 dark:bg-red-800/30 dark:text-red-300">Annulé</span>
                                                @elseif ($subscription->status == 'rejected')
                                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800 dark:bg-red-800/30 dark:text-red-300">Rejeté</span>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300">{{ $subscription->starts_at ? $subscription->starts_at->format('d/m/Y') : 'N/A' }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300">{{ $subscription->ends_at ? $subscription->ends_at->format('d/m/Y') : 'N/A' }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300">{{ $subscription->created_at->format('d/m/Y H:i') }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                                @if ($subscription->status == 'pending')
                                                    <a href="{{ route('vendor.subscription.payment', $subscription->id) }}" class="inline-flex items-center px-3 py-1.5 border border-transparent text-xs font-medium rounded-md text-white bg-green-950 hover:bg-green-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-950 transition-colors duration-200 transform hover:scale-105">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                                        </svg>
                                                        Compléter le paiement
                                                    </a>
                                                @elseif ($subscription->status == 'expired')
                                                    <a href="{{ route('vendor.subscription.plans') }}" class="inline-flex items-center px-3 py-1.5 border border-transparent text-xs font-medium rounded-md text-white bg-yellow-700 hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-700 transition-colors duration-200 transform hover:scale-105">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                                        </svg>
                                                        Renouveler
                                                    </a>
                                                @elseif ($subscription->status == 'rejected')
                                                    <span class="text-red-600 dark:text-red-400 flex items-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                                        </svg>
                                                        {{ $subscription->rejection_reason }}
                                                    </span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                        <div class="mt-4">
                            {{ $subscriptions->links() }}
                        </div>
                    @else
                        <div class="bg-blue-50 dark:bg-blue-900/30 border-l-4 border-blue-500 text-blue-700 dark:text-blue-300 p-4 mb-4 rounded">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-blue-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm">Vous n'avez pas encore d'abonnements.</p>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('vendor.subscription.plans') }}" class="inline-flex items-center px-4 py-2 bg-green-950 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-950 transition ease-in-out duration-150 transform hover:scale-105">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            Choisir un plan d'abonnement
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
