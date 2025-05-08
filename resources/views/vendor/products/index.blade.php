<x-app-layout>
    <x-slot name="header" class="container mx-auto px-4 py-8">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mes Produits') }}
        </h2>
        <a href="{{ route('vendor.products.create') }}" class="bg-blue-600 hover:bg-green-600  px-4 py-2 rounded-md transition-colors shadow-md flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
            </svg>
            Ajouter un Produit
        </a>
    </x-slot>

    <div class="mx-10">
        <div class="flex justify-between items-center mb-6">
          
        </div>
    
        @if($products->isEmpty())
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                </svg>
                <p class="text-gray-600 dark:text-gray-400">Aucun produit trouvé.</p>
                <p class="text-sm text-gray-500 dark:text-gray-500 mt-2">Commencez par ajouter votre premier produit.</p>
            </div>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($products as $product)
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden transition-transform hover:scale-105">
                        <img src="{{ $product->image_url ? asset('storage/' . str_replace('storage/', '', $product->image_url)) : asset('images/placeholder.png') }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <div class="flex justify-between items-center">
                                <h3 class="text-xl font-semibold text-blue-950 dark:text-white">{{ $product->name }}</h3>
                                <span class="px-2 py-1 text-xs rounded-full 
                                    {{ $product->status === 'approved' ? 'bg-green-100 text-green-800' : 
                                      ($product->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                                    {{ $product->status === 'approved' ? 'Approuvé' : 
                                      ($product->status === 'pending' ? 'En attente' : 'Suspendu') }}
                                </span>
                            </div>
                            <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">{{ Str::limit($product->description, 100) }}</p>
                            <div class="flex justify-between items-center mt-4">
                                <p class="font-bold text-green-950 dark:text-green-400">{{ number_format($product->price, 0, ',', ' ') }} FCFA</p>
                                <div class="flex space-x-2">
                                    <a href="{{ route('vendor.products.edit', $product) }}" class="text-yellow-700 hover:text-yellow-800 dark:text-yellow-500 dark:hover:text-yellow-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                        </svg>
                                    </a>
                                    <a href="{{ route('vendor.products.show', $product) }}" class="text-blue-950 hover:text-green-950 dark:text-blue-500 dark:hover:text-blue-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                            <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <div class="mt-6">
                {{ $products->links() }}
            </div>
        @endif
    </div>
    
</x-app-layout>


