<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-green-950 dark:text-green-300 leading-tight">
                {{ __('Détails de la commande #') . $order->id }}
            </h2>
            <a href="{{ route('admin.orders.index') }}" class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 transition-colors duration-200">
                Retour aux commandes
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-green-100 dark:bg-gray-800">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Order Information -->
            <div class="bg-white dark:bg-gray-700 overflow-hidden shadow-md rounded-lg mb-6">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold text-green-950 dark:text-green-300 mb-4 border-b border-gray-200 dark:border-gray-600 pb-2">Informations de la commande</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <p class="mb-2"><span class="font-medium">Client:</span> {{ $order->user->name }}</p>
                            <p class="mb-2"><span class="font-medium">Email:</span> {{ $order->user->email }}</p>
                            <p class="mb-2"><span class="font-medium">Téléphone:</span> {{ $order->phone ?? 'Non spécifié' }}</p>
                            <p class="mb-2"><span class="font-medium">Date de commande:</span> {{ $order->created_at->format('d/m/Y H:i') }}</p>
                        </div>
                        <div>
                            <p class="mb-2"><span class="font-medium">Adresse de livraison:</span> {{ $order->address ?? 'Non spécifiée' }}</p>
                            <p class="mb-2"><span class="font-medium">Ville:</span> {{ $order->city ?? 'Non spécifiée' }}</p>
                            <p class="mb-2"><span class="font-medium">Statut de paiement:</span> 
                                @if($order->payment_status == 'paid')
                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-800 dark:text-green-100">Payée</span>
                                @else
                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800 dark:bg-red-800 dark:text-red-100">Non payée</span>
                                @endif
                            </p>
                            <p class="mb-2"><span class="font-medium">Statut de la commande:</span> 
                                @if($order->status == 'pending')
                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800 dark:bg-yellow-800 dark:text-yellow-100">En attente</span>
                                @elseif($order->status == 'processing')
                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800 dark:bg-blue-800 dark:text-blue-100">En traitement</span>
                                @elseif($order->status == 'shipped')
                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-indigo-100 text-indigo-800 dark:bg-indigo-800 dark:text-indigo-100">Expédiée</span>
                                @elseif($order->status == 'delivered')
                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-purple-100 text-purple-800 dark:bg-purple-800 dark:text-purple-100">Livrée</span>
                                @elseif($order->status == 'completed')
                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-800 dark:text-green-100">Terminée</span>
                                @elseif($order->status == 'cancelled')
                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800 dark:bg-red-800 dark:text-red-100">Annulée</span>
                                @endif
                            </p>
                        </div>
                    </div>
                    
                    <!-- Update Order Status Form -->
                    <div class="mt-6 border-t border-gray-200 dark:border-gray-600 pt-4">
                        <h4 class="text-md font-medium text-green-950 dark:text-green-300 mb-3">Mettre à jour le statut</h4>
                        <form action="{{ route('admin.orders.update-status', $order) }}" method="POST" class="flex items-center space-x-4">
                            @csrf
                            @method('PATCH')
                            <select name="status" class="rounded-md border-gray-300 dark:border-gray-600 focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50 dark:bg-gray-800 dark:text-gray-100">
                                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>En attente</option>
                                <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>En traitement</option>
                                <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Expédiée</option>
                                <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Livrée</option>
                                <option value="complete" {{ $order->status == 'completed' ? 'selected' : '' }}>Terminée</option>
                                <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Annulée</option>
                            </select>
                            <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 transition-colors duration-200">
                                Mettre à jour
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            
            <!-- Order Items -->
            <div class="bg-white dark:bg-gray-700 overflow-hidden shadow-md rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold text-green-950 dark:text-green-300 mb-4 border-b border-gray-200 dark:border-gray-600 pb-2">Produits commandés</h3>
                    
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600">
                            <thead class="bg-green-50 dark:bg-gray-800">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-green-800 dark:text-green-300 uppercase tracking-wider">Produit</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-green-800 dark:text-green-300 uppercase tracking-wider">Boutique</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-green-800 dark:text-green-300 uppercase tracking-wider">Prix unitaire</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-green-800 dark:text-green-300 uppercase tracking-wider">Quantité</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-green-800 dark:text-green-300 uppercase tracking-wider">Total</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-700 divide-y divide-gray-200 dark:divide-gray-600">
                                @foreach($order->orderItems as $item)
                                <tr class="hover:bg-green-50 dark:hover:bg-gray-600 transition-colors duration-150">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <img loading="lazy" class="h-10 w-10 rounded-full object-cover" src="{{ asset('storage/' . $item->product->image) }}" alt="{{ $item->product->name }}">
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ $item->product->name }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">{{ $item->product->shop->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">{{ number_format($item->price, 0, ',', ' ') }} XAF</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">{{ $item->quantity }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">{{ number_format($item->price * $item->quantity, 0, ',', ' ') }} XAF</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot class="bg-green-50 dark:bg-gray-800">
                                <tr>
                                    <td colspan="4" class="px-6 py-3 text-right text-sm font-medium text-green-800 dark:text-green-300">Sous-total:</td>
                                    <td class="px-6 py-3 text-sm text-gray-900 dark:text-gray-100">{{ number_format($order->subtotal ?? $order->total, 0, ',', ' ') }} XAF</td>
                                </tr>
                                @if($order->shipping_fee)
                                <tr>
                                    <td colspan="4" class="px-6 py-3 text-right text-sm font-medium text-green-800 dark:text-green-300">Frais de livraison:</td>
                                    <td class="px-6 py-3 text-sm text-gray-900 dark:text-gray-100">{{ number_format($order->shipping_fee, 0, ',', ' ') }} XAF</td>
                                </tr>
                                @endif
                                <tr>
                                    <td colspan="4" class="px-6 py-3 text-right text-sm font-medium text-green-800 dark:text-green-300">Total:</td>
                                    <td class="px-6 py-3 text-sm font-bold text-gray-900 dark:text-gray-100">{{ number_format($order->total, 0, ',', ' ') }} XAF</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>