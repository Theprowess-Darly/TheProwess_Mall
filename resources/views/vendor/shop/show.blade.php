@extends('layouts.vendor')

@section('title', $shop->name)

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">
        <!-- Banner Section -->
        <div class="relative h-48 md:h-64 bg-green-100 dark:bg-gray-700">
            @if($shop->banner)
                <img src="{{ asset('storage/' . $shop->banner) }}" alt="{{ $shop->name }} Banner" class="w-full h-full object-cover">
            @else
                <div class="w-full h-full flex items-center justify-center bg-gradient-to-r from-green-400 to-green-600 dark:from-green-700 dark:to-green-900">
                    <h1 class="text-3xl font-bold text-white">{{ $shop->name }}</h1>
                </div>
            @endif
            
            <!-- Shop Logo -->
            <div class="absolute -bottom-12 left-8 border-4 border-white dark:border-gray-800 rounded-full shadow-lg">
                @if($shop->logo)
                    <img src="{{ asset('storage/' . $shop->logo) }}" alt="{{ $shop->name }} Logo" class="w-24 h-24 rounded-full object-cover bg-white">
                @else
                    <div class="w-24 h-24 rounded-full bg-green-600 dark:bg-green-800 flex items-center justify-center">
                        <span class="text-2xl font-bold text-white">{{ substr($shop->name, 0, 1) }}</span>
                    </div>
                @endif
            </div>
            
            <!-- Edit Button -->
            <div class="absolute top-4 right-4">
                <a href="{{ route('vendor.shop.edit', ['shop' => $shop->id]) }}" class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-200 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                    </svg>
                    Modifier
                </a>
            </div>
        </div>
        
        <!-- Shop Info -->
        <div class="p-6 pt-16">
            <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-6">
                <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100">{{ $shop->name }}</h1>
                <div class="mt-2 md:mt-0 flex items-center text-sm text-gray-600 dark:text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                    </svg>
                    <span>Boutique créée le {{ $shop->created_at->format('d/m/Y') }}</span>
                </div>
            </div>
            
            <!-- Shop Description -->
            <div class="mb-8">
                <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-2">À propos de la boutique</h2>
                <p class="text-gray-700 dark:text-gray-300">{{ $shop->description }}</p>
            </div>
            
            <!-- Shop Details -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg">
                    <h3 class="font-semibold text-gray-900 dark:text-gray-100 mb-3">Informations de contact</h3>
                    <ul class="space-y-2 text-gray-700 dark:text-gray-300">
                        <li class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-600 dark:text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            {{ $shop->email }}
                        </li>
                        <li class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-600 dark:text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            {{ $shop->phone }}
                        </li>
                    </ul>
                </div>
                
                <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg">
                    <h3 class="font-semibold text-gray-900 dark:text-gray-100 mb-3">Adresse</h3>
                    <address class="not-italic text-gray-700 dark:text-gray-300 flex items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-600 dark:text-green-400 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <div>
                            {{ $shop->address }}<br>
                            {{ $shop->postal_code }} {{ $shop->city }}<br>
                            {{ $shop->country }}
                        </div>
                    </address>
                </div>
            </div>
            
            <!-- Shop Statistics -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div class="bg-green-50 dark:bg-green-900/30 p-4 rounded-lg text-center">
                    <span class="block text-2xl font-bold text-green-600 dark:text-green-400">{{ $shop->products()->where('status', 'approved')->count() }}</span>
                    <span class="text-sm text-gray-600 dark:text-gray-400">Produits</span>
                </div>
                <div class="bg-blue-50 dark:bg-blue-900/30 p-4 rounded-lg text-center">
                    {{-- <span class="block text-2xl font-bold text-blue-600 dark:text-blue-400">{{ $shop->orders()->count() }}</span> --}}
                    <span class="text-sm text-gray-600 dark:text-gray-400">Commandes</span>
                </div>
                <div class="bg-purple-50 dark:bg-purple-900/30 p-4 rounded-lg text-center">
                    {{-- <span class="block text-2xl font-bold text-purple-600 dark:text-purple-400">{{ $shop->reviews()->count() }}</span> --}}
                    <span class="text-sm text-gray-600 dark:text-gray-400">Avis</span>
                </div>
                <div class="bg-yellow-50 dark:bg-yellow-900/30 p-4 rounded-lg text-center">
                    {{-- <span class="block text-2xl font-bold text-yellow-600 dark:text-yellow-400">{{ number_format($shop->reviews()->avg('rating') ?? 0, 1) }}</span> --}}
                    <span class="text-sm text-gray-600 dark:text-gray-400">Note moyenne</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection