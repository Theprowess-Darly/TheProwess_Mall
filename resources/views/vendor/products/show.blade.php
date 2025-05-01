@extends('layouts.vendor')

@section('title', 'Détails du produit')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-white">Détails du produit</h1>
        <a href="{{ route('vendor.products.index') }}" class="bg-gray-200 hover:bg-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-200 px-4 py-2 rounded-lg transition-colors duration-200">
            <span class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Retour
            </span>
        </a>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden">
        <div class="md:flex">
            <div class="md:w-1/3 p-4">
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-auto object-cover rounded-lg">
                @else
                    <div class="w-full h-64 bg-gray-200 dark:bg-gray-700 rounded-lg flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                @endif
            </div>
            <div class="md:w-2/3 p-6">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">{{ $product->name }}</h2>
                <div class="flex items-center mb-4">
                    <span class="text-lg font-semibold text-blue-600 dark:text-blue-400">{{ number_format($product->price, 0, ',', ' ') }} XAF</span>
                    @if($product->old_price)
                        <span class="ml-2 text-sm line-through text-gray-500">{{ number_format($product->old_price, 0, ',', ' ') }} XAF</span>
                    @endif
                </div>
                
                <div class="mb-4">
                    <span class="inline-block bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200 text-sm px-3 py-1 rounded-full">
                        {{ $product->category->name }}
                    </span>
                    <span class="inline-block ml-2 bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200 text-sm px-3 py-1 rounded-full">
                        Stock: {{ $product->stock }}
                    </span>
                </div>
                
                <div class="prose dark:prose-invert max-w-none mb-6">
                    <h3 class="text-lg font-semibold mb-2 text-gray-800 dark:text-gray-200">Description</h3>
                    <p class="text-gray-700 dark:text-gray-300">{{ $product->description }}</p>
                </div>
                
                <div class="flex space-x-2">
                    <a href="{{ route('vendor.products.edit', $product) }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition-colors duration-200">
                        <span class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            Modifier
                        </span>
                    </a>
                    {{-- Commenté temporairement jusqu'à ce que la route soit définie
                    <form action="{{ route('vendor.products.destroy', $product) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg transition-colors duration-200" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit?')">
                            <span class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                                Supprimer
                            </span>
                        </button>
                    </form>
                    --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection