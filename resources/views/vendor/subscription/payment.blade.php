@extends('layouts.vendor')

@section('title', 'Paiement d\'abonnement')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden">
            <div class="border-b border-gray-200 dark:border-gray-700 px-6 py-4">
                <h2 class="text-xl font-bold text-green-950 dark:text-white">Paiement pour l'abonnement {{ $subscription->plan->name }}</h2>
            </div>
            <div class="p-6">
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

                <div class="mb-6">
                    <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4">
                        <h3 class="text-lg font-semibold text-green-950 dark:text-white mb-3">Résumé de la commande</h3>
                        <div class="space-y-2">
                            <div class="flex justify-between">
                                <span class="text-gray-600 dark:text-gray-400">Plan:</span>
                                <span class="font-medium text-gray-900 dark:text-white">{{ $subscription->plan->name }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600 dark:text-gray-400">Montant:</span>
                                <span class="font-medium text-gray-900 dark:text-white">{{ number_format($subscription->amount, 0, ',', ' ') }} FCFA</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600 dark:text-gray-400">Durée:</span>
                                <span class="font-medium text-gray-900 dark:text-white">{{ $subscription->plan->duration_in_days }} jours</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600 dark:text-gray-400">Boutique:</span>
                                <span class="font-medium text-gray-900 dark:text-white">{{ $subscription->shop->name }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <form action="{{ route('vendor.subscription.process-payment', $subscription->id) }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="payment_method" class="block text-sm font-medium text-green-950 dark:text-gray-300 mb-1">Méthode de paiement</label>
                        <select class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 shadow-sm focus:border-green-950 focus:ring focus:ring-green-950 focus:ring-opacity-50 @error('payment_method') border-red-500 @enderror" id="payment_method" name="payment_method" required>
                            <option value="">Sélectionner une méthode de paiement</option>
                            <option value="orange_money">Orange Money</option>
                            <option value="mtn_momo">MTN Mobile Money</option>
                            <option value="moov_money">Moov Money</option>
                            <option value="wave">Wave</option>
                            <option value="bank_transfer">Virement bancaire</option>
                        </select>
                        @error('payment_method')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="transaction_id" class="block text-sm font-medium text-green-950 dark:text-gray-300 mb-1">Numéro de transaction</label>
                        <input type="text" class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 shadow-sm focus:border-green-950 focus:ring focus:ring-green-950 focus:ring-opacity-50 @error('transaction_id') border-red-500 @enderror" id="transaction_id" name="transaction_id" required>
                        @error('transaction_id')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Entrez le numéro de transaction ou de référence de votre paiement.</p>
                    </div>

                    <div class="flex space-x-3">
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-green-950 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-950 transition ease-in-out duration-150">
                            Confirmer le paiement
                        </button>
                        <a href="{{ route('vendor.subscription.plans') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 dark:bg-gray-700 border border-transparent rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest hover:bg-gray-300 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition ease-in-out duration-150">
                            Annuler
                        </a>
                    </div>
                </form>

                <div class="mt-6">
                    <div class="bg-blue-50 dark:bg-blue-900/30 border-l-4 border-blue-500 text-blue-700 dark:text-blue-300 p-4">
                        <h4 class="text-lg font-semibold mb-2">Instructions de paiement:</h4>
                        <ol class="list-decimal pl-5 space-y-1">
                            <li>Effectuez votre paiement via l'une des méthodes ci-dessus.</li>
                            <li>Notez le numéro de transaction ou de référence.</li>
                            <li>Entrez ce numéro dans le formulaire ci-dessus et confirmez.</li>
                            <li>Votre abonnement sera activé après vérification du paiement.</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
