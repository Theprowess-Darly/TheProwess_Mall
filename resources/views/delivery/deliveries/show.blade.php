<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-purple-950 dark:text-purple-300 leading-tight">
                {{ __('Détails de la livraison #') . $delivery->id }}
            </h2>
            <a href="{{ route('delivery.deliveries.index') }}" class="px-4 py-2 bg-purple-600 text-white rounded-md hover:bg-purple-700 transition-colors duration-200">
                Retour aux livraisons
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-purple-50 dark:bg-gray-800">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Informations de livraison -->
            <div class="bg-white dark:bg-gray-700 overflow-hidden shadow-md rounded-lg p-6 mb-8">
                <h3 class="text-lg font-semibold text-purple-950 dark:text-purple-300 mb-4 border-b border-gray-200 dark:border-gray-600 pb-2">Informations de livraison</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <div class="mb-4">
                            <p class="text-sm text-gray-500 dark:text-gray-400">Statut</p>
                            <div class="mt-1">
                                @if($delivery->status == 'pending')
                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800 dark:bg-yellow-800 dark:text-yellow-100">
                                        En attente
                                    </span>
                                @elseif($delivery->status == 'in_progress')
                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800 dark:bg-blue-800 dark:text-blue-100">
                                        En cours
                                    </span>
                                @elseif($delivery->status == 'complete')
                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-800 dark:text-green-100">
                                        Livrée
                                    </span>
                                @elseif($delivery->status == 'cancelled')
                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800 dark:bg-red-800 dark:text-red-100">
                                        Annulée
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <p class="text-sm text-gray-500 dark:text-gray-400">Adresse de livraison</p>
                            <p class="mt-1 text-gray-900 dark:text-gray-100">{{ $delivery->delivery_address ?? 'N/A' }}</p>
                        </div>
                        
                        <div class="mb-4">
                            <p class="text-sm text-gray-500 dark:text-gray-400">Notes</p>
                            <p class="mt-1 text-gray-900 dark:text-gray-100">{{ $delivery->delivery_notes ?? 'Aucune note' }}</p>
                        </div>
                    </div>
                    
                    <div>
                        <div class="mb-4">
                            <p class="text-sm text-gray-500 dark:text-