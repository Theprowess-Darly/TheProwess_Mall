<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-green-950 dark:text-green-300 leading-tight">
                {{ __('Détails du produit') }}
            </h2>
            <a href="{{ route('admin.products.index') }}" class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 transition-colors duration-200">
                Retour aux produits
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-green-100 dark:bg-gray-800">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-700 overflow-hidden shadow-md rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- Product Image -->
                        <div class="md:col-span-1">
                            <div class="bg-gray-100 dark:bg-gray-800 rounded-lg p-4 flex items-center justify-center">
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="max-w-full h-auto rounded-lg">
                            </div>
                            
                            @if($product->images && $product->images->count() > 0)
                                <div class="mt-4 grid grid-cols-4 gap-2">
                                    @foreach($product->images as $image)
                                        <div class="bg-gray-100 dark:bg-gray-800 rounded-lg p-2">
                                            <img src="{{ asset('storage/' . $image->path) }}" alt="{{ $product->name }}" class="w-full h-auto rounded-lg">
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                            
                            <div class="mt-4 flex space-x-2">
                                @if($product->status == 'active')
                                    <form action="{{ route('admin.products.deactivate', $product->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="px-4 py-2 bg-yellow-600 text-white rounded-md hover:bg-yellow-700 transition-colors duration-200" onclick="return confirm('Êtes-vous sûr de vouloir désactiver ce produit?')">
                                            Désactiver
                                        </button>
                                    </form>
                                @else
                                    <form action="{{ route('admin.products.activate', $product->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 transition-colors duration-200" onclick="return confirm('Êtes-vous sûr de vouloir activer ce produit?')">
                                            Activer
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                        
                        <!-- Product Details -->
                        <div class="md:col-span-2">
                            <h3 class="text-2xl font-bold text-green-950 dark:text-green-300 mb-4">{{ $product->name }}</h3>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                                <div>
                                    <p class="mb-2"><span class="font-medium">ID:</span> {{ $product->id }}</p>
                                    <p class="mb-2"><span class="font-medium">Boutique:</span> {{ $product->shop->name }}</p>
                                    <p class="mb-2"><span class="font-medium">Catégorie:</span> {{ $product->category->name }}</p>
                                    <p class="mb-2"><span class="font-medium">Prix:</span> {{ number_format($product->price, 0, ',', ' ') }} XAF</p>
                                    @if($product->sale_price)
                                        <p class="mb-2"><span class="font-medium">Prix promotionnel:</span> {{ number_format($product->sale_price, 0, ',', ' ') }} XAF</p>
                                    @endif
                                </div>
                                <div>
                                    <p class="mb-2"><span class="font-medium">Stock:</span> {{ $product->quantity }}</p>
                                    <p class="mb-2"><span class="font-medium">Statut:</span> 
                                        @if($product->status == 'active')
                                            <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-800 dark:text-green-100">Actif</span>
                                        @else
                                            <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800 dark:bg-red-800 dark:text-red-100">Inactif</span>
                                        @endif
                                    </p>
                                    <p class="mb-2"><span class="font-medium">Mis en avant:</span> 
                                        @if($product->featured)
                                            <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-purple-100 text-purple-800 dark:bg-purple-800 dark:text-purple-100">Oui</span>
                                        @else
                                            <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800 dark:bg-gray-800 dark:text-gray-100">Non</span>
                                        @endif
                                    </p>
                                    <p class="mb-2"><span class="font-medium">Date de création:</span> {{ $product->created_at->format('d/m/Y H:i') }}</p>
                                    <p class="mb-2"><span class="font-medium">Dernière mise à jour:</span> {{ $product->updated_at->format('d/m/Y H:i') }}</p>
                                </div>
                            </div>
                            
                            <div class="mb-6">
                                <h4 class="text-lg font-semibold text-green-950 dark:text-green-300 mb-2">Description</h4>
                                <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-4">
                                    <p class="text-gray-800 dark:text-gray-200">{{ $product->description }}</p>
                                </div>
                            </div>
                            
                            <!-- Sales Statistics (Placeholder) -->
                            <div>
                                <h4 class="text-lg font-semibold text-green-950 dark:text-green-300 mb-2">Statistiques de vente</h4>
                                <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-4">
                                    <p class="text-gray-800 dark:text-gray-200">Les statistiques de vente seront disponibles prochainement.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>