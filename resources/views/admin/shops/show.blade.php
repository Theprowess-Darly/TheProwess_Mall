<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Détails de la Boutique') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between mb-6">
                        <h3 class="text-lg font-semibold">{{ $shop->name }}</h3>
                        <div>
                            <a href="{{ route('admin.shops.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">
                                Retour
                            </a>
                        </div>
                    </div>

                    <!-- Informations de la boutique -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h4 class="text-md font-semibold mb-4 text-green-800">Informations générales</h4>
                            <div class="space-y-2">
                                <div class="flex">
                                    <span class="font-medium w-32">ID:</span>
                                    <span>{{ $shop->id }}</span>
                                </div>
                                <div class="flex">
                                    <span class="font-medium w-32">Nom:</span>
                                    <span>{{ $shop->name }}</span>
                                </div>
                                <div class="flex">
                                    <span class="font-medium w-32">Description:</span>
                                    <span>{{ $shop->description }}</span>
                                </div>
                                <div class="flex">
                                    <span class="font-medium w-32">Email:</span>
                                    <span>{{ $shop->email }}</span>
                                </div>
                                <div class="flex">
                                    <span class="font-medium w-32">Téléphone:</span>
                                    <span>{{ $shop->phone }}</span>
                                </div>
                                <div class="flex">
                                    <span class="font-medium w-32">Adresse:</span>
                                    <span>{{ $shop->address }}</span>
                                </div>
                                <div class="flex">
                                    <span class="font-medium w-32">Statut:</span>
                                    <span>
                                        @if ($shop->status === 'approved')
                                            <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs">Approuvée</span>
                                        @elseif ($shop->status === 'pending')
                                            <span class="px-2 py-1 bg-yellow-100 text-yellow-800 rounded-full text-xs">En attente</span>
                                        @elseif ($shop->status === 'rejected')
                                            <span class="px-2 py-1 bg-red-100 text-red-800 rounded-full text-xs">Rejetée</span>
                                        @elseif ($shop->status === 'suspended')
                                            <span class="px-2 py-1 bg-gray-100 text-gray-800 rounded-full text-xs">Suspendue</span>
                                        @endif
                                    </span>
                                </div>
                                <div class="flex">
                                    <span class="font-medium w-32">Date de création:</span>
                                    <span>{{ $shop->created_at->format('d/m/Y H:i') }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h4 class="text-md font-semibold mb-4 text-green-800">Informations du vendeur</h4>
                            <div class="space-y-2">
                                <div class="flex">
                                    <span class="font-medium w-32">Nom:</span>
                                    <span>{{ $shop->user->name }}</span>
                                </div>
                                <div class="flex">
                                    <span class="font-medium w-32">Email:</span>
                                    <span>{{ $shop->user->email }}</span>
                                </div>
                                <div class="flex">
                                    <span class="font-medium w-32">Téléphone:</span>
                                    <span>{{ $shop->user->phone ?? 'Non renseigné' }}</span>
                                </div>
                                <div class="flex">
                                    <span class="font-medium w-32">Adresse:</span>
                                    <span>{{ $shop->user->address ?? 'Non renseignée' }}</span>
                                </div>
                                <div class="flex">
                                    <span class="font-medium w-32">Date d'inscription:</span>
                                    <span>{{ $shop->user->created_at->format('d/m/Y') }}</span>
                                </div>
                                <div class="mt-4">
                                    <a href="{{ route('admin.users.show', $shop->user->id) }}" class="text-green-600 hover:text-green-800">
                                        Voir le profil complet
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Abonnement actif -->
                    <div class="mb-8">
                        <h4 class="text-md font-semibold mb-4 text-green-800">Abonnement actif</h4>
                        @php
                            $activeSubscription = $shop->subscriptions()->where('status', 'active')->first();
                        @endphp

                        @if ($activeSubscription)
                            <div class="bg-green-50 p-4 rounded-lg">
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                    <div>
                                        <span class="font-medium">Plan:</span>
                                        <span class="block">{{ $activeSubscription->plan->name }}</span>
                                    </div>
                                    <div>
                                        <span class="font-medium">Date de début:</span>
                                        <span class="block">{{ $activeSubscription->starts_at->format('d/m/Y') }}</span>
                                    </div>
                                    <div>
                                        <span class="font-medium">Date d'expiration:</span>
                                        <span class="block">{{ $activeSubscription->ends_at->format('d/m/Y') }}</span>
                                    </div>
                                    <div>
                                        <span class="font-medium">Montant:</span>
                                        <span class="block">{{ number_format($activeSubscription->amount, 2) }} €</span>
                                    </div>
                                    <div>
                                        <span class="font-medium">Méthode de paiement:</span>
                                        <span class="block">{{ $activeSubscription->payment_method }}</span>
                                    </div>
                                    <div>
                                        <span class="font-medium">ID de transaction:</span>
                                        <span class="block">{{ $activeSubscription->payment_id }}</span>
                                    </div>
                                </div>
                            </div>
                        @elseif ($shop->subscriptions()->where('status', 'pending')->first())
                            <div class="bg-yellow-50 p-4 rounded-lg">
                                <p>Cette boutique a un abonnement en attente d'approbation.</p>
                                <a href="{{ route('admin.subscriptions.pending') }}" class="text-green-600 hover:text-green-800">
                                    Voir les abonnements en attente
                                </a>
                            </div>
                        @else
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <p>Cette boutique n'a pas d'abonnement actif.</p>
                            </div>
                        @endif
                    </div>

                    <!-- Historique des abonnements -->
                    <div>
                        <h4 class="text-md font-semibold mb-4 text-green-800">Historique des abonnements</h4>
                        
                        @if ($shop->subscriptions->count() > 0)
                            <div class="overflow-x-auto">
                                <table class="min-w-full bg-white border border-gray-200">
                                    <thead class="bg-green-950 text-white">
                                        <tr>
                                            <th class="py-2 px-4 text-left">ID</th>
                                            <th class="py-2 px-4 text-left">Plan</th>
                                            <th class="py-2 px-4 text-left">Statut</th>
                                            <th class="py-2 px-4 text-left">Montant</th>
                                            <th class="py-2 px-4 text-left">Date de début</th>
                                            <th class="py-2 px-4 text-left">Date de fin</th>
                                            <th class="py-2 px-4 text-left">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200">
                                        @foreach ($shop->subscriptions()->orderBy('created_at', 'desc')->get() as $subscription)
                                            <tr>
                                                <td class="py-2 px-4">{{ $subscription->id }}</td>
                                                <td class="py-2 px-4">{{ $subscription->plan->name }}</td>
                                                <td class="py-2 px-4">
                                                    @if ($subscription->status === 'active')
                                                        <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs">Actif</span>
                                                    @elseif ($subscription->status === 'pending')
                                                        <span class="px-2 py-1 bg-yellow-100 text-yellow-800 rounded-full text-xs">En attente</span>
                                                    @elseif ($subscription->status === 'expired')
                                                        <span class="px-2 py-1 bg-red-100 text-red-800 rounded-full text-xs">Expiré</span>
                                                    @elseif ($subscription->status === 'cancelled')
                                                        <span class="px-2 py-1 bg-gray-100 text-gray-800 rounded-full text-xs">Annulé</span>
                                                    @else
                                                        <span class="px-2 py-1 bg-gray-100 text-gray-800 rounded-full text-xs">{{ $subscription->status }}</span>
                                                    @endif
                                                </td>
                                                <td class="py-2 px-4">{{ number_format($subscription->amount, 2) }} €</td>
                                                <td class="py-2 px-4">{{ $subscription->starts_at ? $subscription->starts_at->format('d/m/Y') : 'N/A' }}</td>
                                                <td class="py-2 px-4">{{ $subscription->ends_at ? $subscription->ends_at->format('d/m/Y') : 'N/A' }}</td>
                                                <td class="py-2 px-4">
                                                    <a href="{{ route('admin.subscriptions.show', $subscription->id) }}" class="text-green-600 hover:text-green-800">
                                                        Détails
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <p>Aucun historique d'abonnement trouvé pour cette boutique.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
