<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-green-950 dark:text-green-300 leading-tight">
            {{ __('Détails de l\'abonnement') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-green-100 dark:bg-gray-800">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-700 overflow-hidden shadow-md rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-semibold text-green-950 dark:text-green-300">Détails de l'abonnement #{{ $subscription->id }}</h3>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <h4 class="text-md font-semibold mb-3">Détails de l'abonnement</h4>
                            <p class="mb-2"><span class="font-medium">Plan:</span> {{ $subscription->plan->name }}</p>
                            <p class="mb-2"><span class="font-medium">Montant:</span> ${{ number_format($subscription->amount, 2) }}</p>
                            <p class="mb-2"><span class="font-medium">Statut:</span> 
                                @if ($subscription->status == 'pending')
                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800 dark:bg-yellow-800 dark:text-yellow-100">En attente</span>
                                @elseif ($subscription->status == 'active')
                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-800 dark:text-green-100">Actif</span>
                                @elseif ($subscription->status == 'expired')
                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800 dark:bg-gray-800 dark:text-gray-100">Expiré</span>
                                @elseif ($subscription->status == 'cancelled')
                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800 dark:bg-red-800 dark:text-red-100">Annulé</span>
                                @elseif ($subscription->status == 'rejected')
                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800 dark:bg-red-800 dark:text-red-100">Rejeté</span>
                                @endif
                            </p>
                            <p class="mb-2"><span class="font-medium">Méthode de paiement:</span> {{ $subscription->payment_method }}</p>
                            <p class="mb-2"><span class="font-medium">ID de transaction:</span> {{ $subscription->payment_id }}</p>
                            <p class="mb-2"><span class="font-medium">Date de création:</span> {{ $subscription->created_at->format('d/m/Y H:i') }}</p>
                            @if($subscription->starts_at)
                                <p class="mb-2"><span class="font-medium">Date de début:</span> {{ $subscription->starts_at->format('d/m/Y') }}</p>
                            @endif
                            @if($subscription->ends_at)
                                <p class="mb-2"><span class="font-medium">Date de fin:</span> {{ $subscription->ends_at->format('d/m/Y') }}</p>
                            @endif
                        </div>
                        <div>
                            <h4 class="text-md font-semibold mb-3">Détails du marchand</h4>
                            <p class="mb-2"><span class="font-medium">Nom:</span> {{ $subscription->user->name }}</p>
                            <p class="mb-2"><span class="font-medium">Email:</span> {{ $subscription->user->email }}</p>
                            <p class="mb-2"><span class="font-medium">Téléphone:</span> {{ $subscription->user->phone }}</p>
                            <p class="mb-2"><span class="font-medium">Adresse:</span> {{ $subscription->user->address }}</p>
                            <p class="mb-2"><span class="font-medium">Ville:</span> {{ $subscription->user->city }}</p>
                            <p class="mb-2"><span class="font-medium">Pays:</span> {{ $subscription->user->country }}</p>
                        </div>
                    </div>

                    <div class="mb-6">
                        <h4 class="text-md font-semibold mb-3">Détails de la boutique</h4>
                        <p class="mb-2"><span class="font-medium">Nom de la boutique:</span> {{ $subscription->shop->name }}</p>
                        <p class="mb-2"><span class="font-medium">Description:</span> {{ $subscription->shop->description }}</p>
                        <p class="mb-2"><span class="font-medium">Email:</span> {{ $subscription->shop->email }}</p>
                        <p class="mb-2"><span class="font-medium">Téléphone:</span> {{ $subscription->shop->phone }}</p>
                        <p class="mb-2"><span class="font-medium">Adresse:</span> {{ $subscription->shop->address }}, {{ $subscription->shop->city }}, {{ $subscription->shop->country }}</p>
                    </div>

                    <hr class="my-6 border-gray-300 dark:border-gray-600">

                    @if($subscription->status == 'pending')
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <form action="{{ route('admin.subscriptions.approve', $subscription->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                    Approuver
                                </button>
                            </form>
                        </div>
                        <div>
                            <button type="button" class="w-full bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" onclick="document.getElementById('rejectModal').classList.remove('hidden')">
                                Rejeter
                            </button>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Reject Modal -->
    <div id="rejectModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden" x-data="{ open: false }">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white dark:bg-gray-800">
            <div class="mt-3 text-center">
                <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-gray-100">Rejeter l'abonnement</h3>
                <form action="{{ route('admin.subscriptions.reject', $subscription->id) }}" method="POST" class="mt-4">
                    @csrf
                    <div class="mt-2 px-7 py-3">
                        <label for="rejection_reason" class="block text-left text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Raison du rejet</label>
                        <textarea id="rejection_reason" name="rejection_reason" rows="4" class="shadow-sm focus:ring-green-500 focus:border-green-500 mt-1 block w-full sm:text-sm border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md" required></textarea>
                    </div>
                    <div class="items-center px-4 py-3">
                        <button type="button" class="px-4 py-2 bg-gray-500 text-white text-base font-medium rounded-md w-full sm:w-auto sm:ml-4 shadow-sm hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-300 mr-2" onclick="document.getElementById('rejectModal').classList.add('hidden')">
                            Annuler
                        </button>
                        <button type="submit" class="px-4 py-2 bg-red-600 text-white text-base font-medium rounded-md w-full sm:w-auto sm:ml-4 shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-300">
                            Rejeter
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
