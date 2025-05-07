<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-blue-950 dark:text-blue-300 leading-tight">
            {{ __('Mes Commandes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if($orders->isEmpty())
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 text-center">
                    <div class="text-gray-600 dark:text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto mb-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                        <p class="text-lg">Vous n'avez pas encore de commandes</p>
                        <a href="{{ route('home') }}" class="mt-4 inline-block bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition-colors">
                            Commencer vos achats
                        </a>
                    </div>
                </div>
            @else
                <div class="space-y-4">
                    @foreach($orders as $order)
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                                            Commande No: #AGDf{{ $order->user->id . 'tpm'  }}{{ sprintf('%06d', $order->id) }}
                                        </h3>
                                        <p class="text-sm text-gray-600 dark:text-gray-400">
                                            Passée le {{ $order->created_at->format('d/m/Y à H:i') }}
                                        </p>
                                    </div>
                                    <div class="text-right">
                                        <div class="mb-2">
                                            <span class="px-3 py-1 text-sm rounded-full 
                                                @if($order->payment_status === 'pending') bg-yellow-100 text-yellow-800
                                                @elseif($order->payment_status === 'processing') bg-blue-100 text-blue-800
                                                @elseif($order->payment_status === 'complete') bg-green-100 text-green-800
                                                @elseif($order->payment_status === 'cancelled') bg-red-100 text-red-800
                                                @endif">
                                                {{ ucfirst($order->payment_status) }}
                                            </span>
                                        </div>
                                        <p class="text-lg font-bold text-gray-900 dark:text-gray-100">
                                            {{ number_format($order->total_amount, 0, ',', ' ') }} FCFA
                                        </p>
                                    </div>
                                </div>
                                
                                <div class="mt-4 flex justify-between items-center">
                                    <div class="text-sm text-gray-600 dark:text-gray-400">
                                        <p>{{ $order->orderItems->count() }} article(s)</p>
                                        <p>Livraison : {{ $order->shipping_address }}</p>
                                    </div>
                                    <a href="{{ route('client.orders.show', $order) }}" 
                                       class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                        Voir les détails
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-6">
                    {{ $orders->links() }}
                </div>
            @endif
        </div>
    </div>
</x-app-layout>