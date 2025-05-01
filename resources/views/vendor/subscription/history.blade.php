@extends('layouts.vendor')

@section('title', 'Historique des abonnements')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden">
        <div class="p-6">
            <h2 class="text-2xl font-bold text-green-950 dark:text-white mb-6">Historique des abonnements</h2>
            
            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 border-l-4 border-green-950 text-green-950 dark:bg-green-800/30 dark:text-green-100">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="mb-4 p-4 bg-red-100 border-l-4 border-red-500 text-red-700 dark:bg-red-800/30 dark:text-red-100">
                    {{ session('error') }}
                </div>
            @endif

            @if ($subscriptions->count() > 0)
                <div class="overflow-x-auto">
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
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300">{{ $subscription->plan->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300">{{ number_format($subscription->amount, 0, ',', ' ') }} FCFA</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if ($subscription->status == 'pending')
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-700">En attente de paiement</span>
                                        @elseif ($subscription->status == 'pending_approval')
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">En attente d'approbation</span>
                                        @elseif ($subscription->status == 'active')
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-950">Actif</span>
                                        @elseif ($subscription->status == 'expired')
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">Expiré</span>
                                        @elseif ($subscription->status == 'cancelled')
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Annulé</span>
                                        @elseif ($subscription->status == 'rejected')
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Rejeté</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300">{{ $subscription->starts_at ? $subscription->starts_at->format('d/m/Y') : 'N/A' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300">{{ $subscription->ends_at ? $subscription->ends_at->format('d/m/Y') : 'N/A' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300">{{ $subscription->created_at->format('d/m/Y H:i') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        @if ($subscription->status == 'pending')
                                            <a href="{{ route('vendor.subscription.payment', $subscription->id) }}" class="inline-flex items-center px-3 py-1.5 border border-transparent text-xs font-medium rounded-md text-white bg-green-950 hover:bg-green-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-950">
                                                Compléter le paiement
                                            </a>
                                        @elseif ($subscription->status == 'active' && $subscription->ends_at && $subscription->ends_at->isPast())
                                            <a href="{{ route('vendor.subscription.plans') }}" class="inline-flex items-center px-3 py-1.5 border border-transparent text-xs font-medium rounded-md text-white bg-yellow-700 hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-700">
                                                Renouveler
                                            </a>
                                        @elseif ($subscription->status == 'rejected')
                                            <span class="text-red-600 dark:text-red-400">{{ $subscription->rejection_reason }}</span>
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
                <div class="bg-blue-50 dark:bg-blue-900/30 border-l-4 border-blue-500 text-blue-700 dark:text-blue-300 p-4 mb-4">
                    Vous n'avez pas encore d'abonnements.
                </div>
                <a href="{{ route('vendor.subscription.plans') }}" class="inline-flex items-center px-4 py-2 bg-green-950 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-950 transition ease-in-out duration-150">
                    Choisir un plan d'abonnement
                </a>
            @endif
        </div>
    </div>
</div>
@endsection
