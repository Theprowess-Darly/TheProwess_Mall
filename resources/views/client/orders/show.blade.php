<x-app-layout>
    <x-slot name="header">
        <div class="flex w-full justify-between items-center">
            <h2 class="font-semibold text-xl text-blue-950 dark:text-blue-300 leading-tight">
                {{-- FORMATTAGE DU NUMERO DE COMMANDE --}}
                {{ __('Commande No: #AGDf') }}{{ $order->user->id . 'tpm'  }}{{ sprintf('%06d', $order->id) }}
            </h2>
            <a href="{{ route('client.orders') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                Retour aux commandes
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <!-- Order Status -->
                    <div class="mb-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                                    Statut de la commande
                                </h3>
                                <p class="text-sm text-gray-600 dark:text-gray-400">
                                    Commande passée le {{ $order->created_at->format('d/m/Y à H:i') }}
                                </p>
                            </div>
                            <span class="px-4 py-2 rounded-full text-sm font-semibold
                                @if($order->payment_status === 'pending') bg-yellow-100 text-yellow-800
                                @elseif($order->payment_status === 'processing') bg-blue-100 text-blue-800
                                @elseif($order->payment_status === 'complete') bg-green-100 text-green-800
                                @elseif($order->payment_status === 'cancelled') bg-red-100 text-red-800
                                @endif">
                                {{ ucfirst($order->payment_status) }}
                            </span>
                        </div>
                    </div>

                    <!-- Order Items -->
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">
                            Articles commandés
                        </h3>
                        <div class="divide-y divide-gray-200 dark:divide-gray-700">
                            @if($order->items)
                                @foreach($order->items as $item)
                                    <div class="py-4 flex items-center">
                                        <img loading="lazy" src="{{ $item->product->image_url }}" alt="{{ $item->name }}" class="w-16 h-16 object-cover rounded">
                                        <div class="ml-4 flex-grow">
                                            <h4 class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                                {{ $item->name }}
                                            </h4>
                                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                                Quantité: {{ $item->quantity }}
                                            </p>
                                        </div>
                                        <div class="text-right">
                                            <p class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                                {{ number_format($item->total_amount, 0, ',', ' ') }} FCFA
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="py-4 text-center text-gray-600 dark:text-gray-400">
                                    Aucun article trouvé pour cette commande.
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Order Summary -->
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">
                            Résumé de la commande
                        </h3>
                        <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4">
                            <div class="space-y-2">
                                <div class="flex justify-between">
                                    <span class="text-gray-600 dark:text-gray-400">Sous-total</span>
                                    <span class="text-gray-900 dark:text-gray-100">{{ number_format($order->subtotal, 0, ',', ' ') }} FCFA</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600 dark:text-gray-400">Frais de livraison</span>
                                    <span class="text-gray-900 dark:text-gray-100">{{ number_format($order->shipping, 0, ',', ' ') }} FCFA</span>
                                </div>
                                <div class="border-t border-gray-200 dark:border-gray-600 pt-2 mt-2">
                                    <div class="flex justify-between font-semibold">
                                        <span class="text-gray-900 dark:text-gray-100">Total</span>
                                        <span class="text-gray-900 dark:text-gray-100">{{ number_format($order->total_amount, 0, ',', ' ') }} FCFA</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Shipping Information -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">
                            Informations de livraison
                        </h3>
                        <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4">
                            <p class="text-gray-600 dark:text-gray-400">{{ $order->first_name }} {{ $order->last_name }}</p>
                            <p class="text-gray-600 dark:text-gray-400">{{ $order->address }}</p>
                            <p class="text-gray-600 dark:text-gray-400">{{ $order->city }}, {{ $order->postal_code }}</p>
                            <p class="text-gray-600 dark:text-gray-400">{{ $order->country }}</p>
                            <p class="text-gray-600 dark:text-gray-400">{{ $order->phone }}</p>
                            <p class="text-gray-600 dark:text-gray-400">{{ $order->email }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>