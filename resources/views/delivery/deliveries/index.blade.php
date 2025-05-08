<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-purple-950 dark:text-purple-300 leading-tight">
            {{ __('Mes livraisons') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-purple-50 dark:bg-gray-800">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Livraisons en attente -->
            <div class="bg-white dark:bg-gray-700 overflow-hidden shadow-md rounded-lg p-6 mb-8">
                <div class="flex justify-between items-center mb-4 border-b border-gray-200 dark:border-gray-600 pb-2">
                    <h3 class="text-lg font-semibold text-purple-950 dark:text-purple-300">Livraisons disponibles</h3>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600">
                        <thead class="bg-purple-50 dark:bg-gray-800">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-purple-800 dark:text-purple-300 uppercase tracking-wider">ID</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-purple-800 dark:text-purple-300 uppercase tracking-wider">Client</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-purple-800 dark:text-purple-300 uppercase tracking-wider">Adresse</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-purple-800 dark:text-purple-300 uppercase tracking-wider">Date</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-purple-800 dark:text-purple-300 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-700 divide-y divide-gray-200 dark:divide-gray-600">
                            @forelse($pendingDeliveries as $delivery)
                            <tr class="hover:bg-purple-50 dark:hover:bg-gray-600 transition-colors duration-150">
                                <td class="px-6 py-4 whitespace-nowrap text-gray-900 dark:text-gray-100">#{{ $delivery->id }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-gray-900 dark:text-gray-100">{{ $delivery->order->user->name ?? 'N/A' }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-gray-900 dark:text-gray-100">{{ $delivery->delivery_address ?? 'N/A' }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-gray-900 dark:text-gray-100">{{ $delivery->created_at->format('d/m/Y H:i') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('delivery.deliveries.show', $delivery->id) }}" class="text-purple-600 hover:text-purple-900 dark:text-purple-400 dark:hover:text-purple-300">
                                            Détails
                                        </a>
                                        <form action="{{ route('delivery.deliveries.accept', $delivery->id) }}" method="POST" class="inline">
                                            @csrf
                                            <button type="submit" class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300">
                                                Accepter
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                                    Aucune livraison disponible
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
                <div class="mt-4">
                    {{ $pendingDeliveries->links() }}
                </div>
            </div>
            
            <!-- Livraisons en cours -->
            <div class="bg-white dark:bg-gray-700 overflow-hidden shadow-md rounded-lg p-6">
                <div class="flex justify-between items-center mb-4 border-b border-gray-200 dark:border-gray-600 pb-2">
                    <h3 class="text-lg font-semibold text-purple-950 dark:text-purple-300">Mes livraisons en cours</h3>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600">
                        <thead class="bg-purple-50 dark:bg-gray-800">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-purple-800 dark:text-purple-300 uppercase tracking-wider">ID</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-purple-800 dark:text-purple-300 uppercase tracking-wider">Client</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-purple-800 dark:text-purple-300 uppercase tracking-wider">Adresse</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-purple-800 dark:text-purple-300 uppercase tracking-wider">Date</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-purple-800 dark:text-purple-300 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-700 divide-y divide-gray-200 dark:divide-gray-600">
                            @forelse($inProgressDeliveries as $delivery)
                            <tr class="hover:bg-purple-50 dark:hover:bg-gray-600 transition-colors duration-150">
                                <td class="px-6 py-4 whitespace-nowrap text-gray-900 dark:text-gray-100">#{{ $delivery->id }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-gray-900 dark:text-gray-100">{{ $delivery->order->user->name ?? 'N/A' }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-gray-900 dark:text-gray-100">{{ $delivery->delivery_address ?? 'N/A' }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-gray-900 dark:text-gray-100">{{ $delivery->created_at->format('d/m/Y H:i') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('delivery.deliveries.show', $delivery->id) }}" class="text-purple-600 hover:text-purple-900 dark:text-purple-400 dark:hover:text-purple-300">
                                            Détails
                                        </a>
                                        <form action="{{ route('delivery.deliveries.complete', $delivery->id) }}" method="POST" class="inline">
                                            @csrf
                                            <button type="submit" class="text-green-600 hover:text-green-900 dark:text-green-400 dark:hover:text-green-300">
                                                Terminer
                                            </button>
                                        </form>
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
                
                <div class="mt-4">
                    {{ $inProgressDeliveries->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>