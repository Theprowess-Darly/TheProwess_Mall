<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-blue-950 dark:text-blue-300 leading-tight">
            {{ __('Ma Liste de Souhaits') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if($wishlist->isEmpty())
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 text-center">
                    <div class="text-gray-600 dark:text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                        <p class="text-lg">Votre liste de souhaits est vide</p>
                        <a href="{{ route('home') }}" class="mt-4 inline-block bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition-colors">
                            Découvrir des produits
                        </a>
                    </div>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($wishlist as $item)
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="relative">
                                <img src="{{ $item->product->image }}" alt="{{ $item->product->name }}" class="w-full h-48 object-cover">
                                <form action="{{ route('client.wishlist.destroy', $item->product_id) }}" method="POST" class="absolute top-2 right-2">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white p-2 rounded-full hover:bg-red-600 transition-colors">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                            <div class="p-4">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                                    {{ $item->product->name }}
                                </h3>
                                <p class="text-gray-600 dark:text-gray-400 mt-2">
                                    {{ number_format($item->product->price, 0, ',', ' ') }} FCFA
                                </p>
                                <div class="mt-4 flex justify-between items-center">
                                    <a href="{{ route('products.show', $item->product) }}" class="text-blue-600 hover:text-blue-700 dark:text-blue-400 dark:hover:text-blue-300">
                                        Voir le produit
                                    </a>
                                    <button class="add-to-cart bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition-colors"
                                            data-product-id="{{ $item->product->id }}"
                                            data-product-name="{{ $item->product->name }}"
                                            data-product-price="{{ $item->product->price }}"
                                            data-product-image="{{ $item->product->image }}">
                                        Ajouter au panier
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-6">
                    {{ $wishlist->links() }}
                </div>
            @endif
        </div>
    </div>
</x-app-layout>