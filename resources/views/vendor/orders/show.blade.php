<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-green-950 dark:text-green-300 leading-tight">
                {{ __('Détails de la commande #') . $order->id }}
            </h2>
            <a href="{{ route('vendor.orders.index') }}" class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                Retour aux commandes
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-green-50 dark:bg-gray-800">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Informations de la commande -->
            <div class="bg-white dark:bg-gray-700 overflow-hidden shadow-md rounded-lg mb-6">
                <div class="p-6 border-b border-gray-200 dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-green-950 dark:text-green-300 mb-4">Informations de la commande</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                        <div>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Numéro de commande</p>
                            <p class="font-semibold text-gray-900 dark:text-gray-100">#{{ $order->id }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Date</p>
                            <p class="font-semibold text-gray-900 dark:text-gray-100">{{ $order->created_at->format('d/m/Y H:i') }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Statut</p>
                            <p>
                                @if($order->status == 'pending')
                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800 dark:bg-yellow-800 dark:text-yellow-100">
                                        En attente
                                    </span>
                                @elseif($order->status == 'processing')
                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800 dark:bg-blue-800 dark:text-blue-100">
                                        En traitement
                                    </span>
                                @elseif($order->status == 'complete')
                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-800 dark:text-green-100">
                                        Complétée
                                    </span>
                                @elseif($order->status == 'cancelled')
                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800 dark:bg-red-800 dark:text-red-100">
                                        Annulée
                                    </span>
                                @endif
                            </p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Montant total</p>
                            <p class="font-semibold text-gray-900 dark:text-gray-100">{{ number_format($order->total_amount, 0, ',', ' ') }} FCFA</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Informations du client -->
            <div class="bg-white dark:bg-gray-700 overflow-hidden shadow-md rounded-lg mb-6">
                <div class="p-6 border-b border-gray-200 dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-green-950 dark:text-green-300 mb-4">Informations du client</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Nom</p>
                            <p class="font-semibold text-gray-900 dark:text-gray-100">{{ $order->user->name ?? 'N/A' }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Email</p>
                            <p class="font-semibold text-gray-900 dark:text-gray-100">{{ $order->user->email ?? 'N/A' }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Téléphone</p>
                            <p class="font-semibold text-gray-900 dark:text-gray-100">{{ $order->user->phone ?? 'N/A' }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Adresse</p>
                            <p class="font-semibold text-gray-900 dark:text-gray-100">{{ $order->shipping_address ?? 'N/A' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Produits commandés -->
            <div class="bg-white dark:bg-gray-700 overflow-hidden shadow-md rounded-lg">
                <div class="p-6 border-b border-gray-200 dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-green-950 dark:text-green-300 mb-4">Produits commandés</h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600">
                        <thead class="bg-green-50 dark:bg-gray-800">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-green-800 dark:text-green-300 uppercase tracking-wider">Produit</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-green-800 dark:text-green-300 uppercase tracking-wider">Prix unitaire</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-green-800 dark:text-green-300 uppercase tracking-wider">Quantité</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-green-800 dark:text-green-300 uppercase tracking-wider">Total</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-700 divide-y divide-gray-200 dark:divide-gray-600">
                            @foreach($orderItems as $item)
                            <tr class="hover:bg-green-50 dark:hover:bg-gray-600 transition-colors duration-150">
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10 rounded-md overflow-hidden">
                                            <img src="{{ $item->product->image_url ? asset('storage/' . str_replace('storage/', '', $item->product->image_url)) : asset('images/placeholder.png') }}" alt="{{ $item->product->name }}" class="h-10 w-10 object-cover">
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ $item->product->name }}</div>
                                            <div class="text-sm text-gray-500 dark:text-gray-400">{{ $item->product->category->name ?? 'Sans catégorie' }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                    {{ number_format($item->price, 0, ',', ' ') }} FCFA
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                    {{ $item->quantity }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                    {{ number_format($item->price * $item->quantity, 0, ',', ' ') }} FCFA
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="bg-green-50 dark:bg-gray-800">
                            <tr>
                                <td colspan="3" class="px-6 py-4 text-right text-sm font-medium text-gray-900 dark:text-gray-100">Total</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-900 dark:text-gray-100">
                                    {{ number_format($orderItems->sum(function($item) { return $item->price * $item->quantity; }), 0, ',', ' ') }} FCFA
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>