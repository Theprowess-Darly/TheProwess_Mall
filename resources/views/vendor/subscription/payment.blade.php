<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between w-full items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Paiement d\'abonnement') }}
            </h2>
            <a href="{{ route('vendor.subscription.plans') }}" class="inline-flex items-center px-4 py-2 bg-green-950 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-950 transition ease-in-out duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Retour aux plans
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-md rounded-lg">
                <div class="p-6">
                    <h3 class="text-2xl font-bold text-green-950 dark:text-green-400 mb-6">Paiement pour l'abonnement {{ $subscription->plan->name }}</h3>
                    
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
    
                    <div class="mb-8">
                        <div class="bg-green-100 dark:bg-gray-700 rounded-lg p-6 shadow-sm">
                            <h4 class="text-lg font-semibold text-green-950 dark:text-green-400 mb-4">Résumé de la commande</h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="flex justify-between py-2 border-b border-gray-200 dark:border-gray-600">
                                    <span class="text-gray-600 dark:text-gray-400">Plan:</span>
                                    <span class="font-semibold text-gray-900 dark:text-white">{{ $subscription->plan->name }}</span>
                                </div>
                                <div class="flex justify-between py-2 border-b border-gray-200 dark:border-gray-600">
                                    <span class="text-gray-600 dark:text-gray-400">Montant:</span>
                                    <span class="font-semibold text-gray-900 dark:text-white">{{ number_format($subscription->amount, 0, ',', ' ') }} FCFA</span>
                                </div>
                                <div class="flex justify-between py-2 border-b border-gray-200 dark:border-gray-600">
                                    <span class="text-gray-600 dark:text-gray-400">Durée:</span>
                                    <span class="font-semibold text-gray-900 dark:text-white">{{ $subscription->plan->duration_in_days }} jours</span>
                                </div>
                                <div class="flex justify-between py-2 border-b border-gray-200 dark:border-gray-600">
                                    <span class="text-gray-600 dark:text-gray-400">Boutique:</span>
                                    <span class="font-semibold text-gray-900 dark:text-white">{{ $subscription->shop->name }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <form action="{{ route('vendor.subscription.process-payment', $subscription->id) }}" method="POST" class="space-y-6">
                        @csrf
                        <div>
                            <label for="payment_method" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Méthode de paiement</label>
                            <select id="payment_method" name="payment_method" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-green-950 focus:border-green-950 sm:text-sm rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-white @error('payment_method') border-red-500 dark:border-red-500 @enderror" required>
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
    
                        <div>
                            <label for="transaction_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Numéro de transaction</label>
                            <input type="text" id="transaction_id" name="transaction_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-950 focus:border-green-950 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white @error('transaction_id') border-red-500 dark:border-red-500 @enderror" required>
                            @error('transaction_id')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Entrez le numéro de transaction ou de référence de votre paiement.</p>
                        </div>
    
                        <div class="flex w-full justify-between items-center space-x-4">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-green-950 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-950 transition ease-in-out duration-150 transform hover:scale-105">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Confirmer le paiement
                            </button>
                            <a href="{{ route('vendor.subscription.plans') }}" class="inline-flex items-center px-4 py-2 bg-yellow-500 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition ease-in-out duration-150 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600">
                                Annuler
                            </a>
                        </div>
                    </form>
    
                    <div class="mt-8">
                        <div class="bg-blue-50 dark:bg-blue-900/30 border-l-4 border-blue-500 text-blue-700 dark:text-blue-300 p-4 rounded">
                            <h5 class="font-semibold mb-2">Instructions de paiement:</h5>
                            <ul class="list-disc pl-5 space-y-1">
                                <li>1. Effectuez votre paiement via l'une des méthodes ci-dessus.</li>
                                <li>2. Notez le numéro de transaction ou de référence.</li>
                                <li>3. Entrez ce numéro dans le formulaire ci-dessus et confirmez.</li>
                                <li>4. Votre abonnement sera activé après vérification du paiement.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
