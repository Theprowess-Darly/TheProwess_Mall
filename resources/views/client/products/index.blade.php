@extends('layouts.app')

@section('title', 'Tous les produits')

@section('content')
    <div class="container dark:bg-slate-600 bg-slate-400 mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-green-900 dark:text-green-400 mb-8">Tous nos produits</h1>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse ($products as $product)
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden transition-transform duration-300 hover:shadow-lg hover:scale-105">
                    <div class="relative h-48 overflow-hidden">
                        @if($product->image_url)
                            <im loading="lazy"g src="{{ asset('/storage/' . $product->image_url) }}" alt="{{ $product->name }}" class="w-full h-full object-cover transform transition-transform duration-300 hover:scale-110">
                        @else
                            <div class="w-full h-full bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                        @endif
                        
                        <div class="absolute top-2 right-2">
                            <button class="add-to-wishlist bg-white dark:bg-gray-800 rounded-full p-2 shadow hover:bg-gray-100 dark:hover:bg-gray-700 transform transition-all duration-300 hover:scale-110" data-product-id="{{ $product->id }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    
                    <div class="p-4">
                        <!--  Product Card -->
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{ $product->name }}</h3>
                            <p class="text-green-950 dark:text-green-400 font-bold mt-2">{{ number_format($product->price, 0, ',', ' ') }} FCFA</p>
                            @if($product->old_price)
                                <p class="text-sm line-through text-gray-500 mt-1">{{ number_format($product->old_price, 0, ',', ' ') }} FCFA</p>
                            @endif
                            <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">{{ Str::limit($product->description, 100) }}</p>
                            
                            @if($product->category)
                                <span class="inline-block mt-2 bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200 text-xs px-2 py-1 rounded-full">
                                    {{ $product->category->name }}
                                </span>
                            @endif

                            @auth <!-- Show button only if user is logged in -->
                                <form class="add-to-cart-form mt-4" method="POST" action="{{ route('cart.add') }}">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <div class="flex justify-between space-x-2 items-center">
                                        <input type="number" name="quantity" value="1" min="1" class="w-16 px-1 py-1 border border-gray-300 dark:border-gray-600 rounded-md dark:bg-gray-800 dark:text-white">
                                        <button type="submit" class="ml-2 bg-green-700 rounded-full hover:bg-green-950 text-white px-2 py-2 transition-colors">
                                            <span class="flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                                </svg>
                                                {{-- Ajouter au panier --}}
                                            </span>
                                        </button>
                                    </div>
                                </form>
                            @else
                                <p class="mt-4"><a href="{{ route('login') }}" class="text-blue-600 dark:text-blue-400 hover:underline">Connectez-vous</a> pour faire vos achats en toute securité.</p>
                            @endauth
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-12">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-2">Aucun produit disponible</h3>
                    <p class="text-gray-500 dark:text-gray-400">Revenez plus tard pour découvrir nos produits.</p>
                </div>
            @endforelse


        </div>
        @if (session('success'))
                <div class="bg-green-100 w-30 border  border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3"></span>
            </div>
        {{-- @else
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">{{ session('fail') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3"></span>
            </div>                                --}}
        @endif
        <div class="mt-8">
            {{ $products->links() }}
        </div>
    </div>


@endsection
    <!-- Modal de connexion requise -->
    <div id="login-modal" class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center hidden">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-xl max-w-md w-full transform transition-all duration-300 scale-95 opacity-0" id="modal-content">
            <div class="p-6">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Connexion requise</h3>
                <p class="text-gray-600 dark:text-gray-400 mb-6">Veuillez vous connecter pour ajouter des produits à votre panier.</p>
                <div class="flex justify-end space-x-4">
                    <button id="cancel-login" class="px-4 py-2 bg-gray-200 hover:bg-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-800 dark:text-gray-200 rounded-md transition-colors">
                        Annuler
                    </button>
                    <a href="{{ route('login') }}" class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-md transition-colors">
                        Se connecter
                    </a>
                </div>
            </div>
        </div>
    </div>
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Gestion des boutons d'ajout au panier et à la liste de souhaits
            const addToWishlistButtons = document.querySelectorAll('.add-to-wishlist');
            const loginModal = document.getElementById('login-modal');
            const modalContent = document.getElementById('modal-content');
            const cancelLoginBtn = document.getElementById('cancel-login');
            
            // Variable pour vérifier si l'utilisateur est authentifié
            const isAuthenticated = {{ auth()->check() ? 'true' : 'false' }};
            
            // Gestion des boutons d'ajout à la liste de souhaits
            addToWishlistButtons.forEach(button => {
                button.addEventListener('click', function() {
                    if (!isAuthenticated) {
                        // Afficher le modal pour les utilisateurs non connectés
                        loginModal.classList.remove('hidden');
                        setTimeout(() => {
                            modalContent.classList.remove('scale-95', 'opacity-0');
                            modalContent.classList.add('scale-100', 'opacity-100');
                        }, 10);
                    } else {
                        // Logique d'ajout à la liste de souhaits pour utilisateurs connectés
                        const productId = this.getAttribute('data-product-id');
                        // Implémentez votre logique d'ajout à la liste de souhaits ici
                    }
                });
            });
            
            // Fermer le modal
            if (cancelLoginBtn) {
                cancelLoginBtn.addEventListener('click', function() {
                    modalContent.classList.remove('scale-100', 'opacity-100');
                    modalContent.classList.add('scale-95', 'opacity-0');
                    
                    setTimeout(() => {
                        loginModal.classList.add('hidden');
                    }, 300);
                });
            }
            
            // Fermer le modal en cliquant à l'extérieur
            loginModal.addEventListener('click', function(e) {
                if (e.target === loginModal) {
                    modalContent.classList.remove('scale-100', 'opacity-100');
                    modalContent.classList.add('scale-95', 'opacity-0');
                    
                    setTimeout(() => {
                        loginModal.classList.add('hidden');
                    }, 300);
                }
            });
        });
    </script>
@endpush