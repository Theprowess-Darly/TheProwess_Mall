<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>TheProwess Mall - Votre marketplace de confiance</title>
        @vite(['resources/css/app.css'])
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    </head>
    <body class="bg-gray-100">
        <!-- Include Header -->
        @include('layouts.header')

        <!-- Featured Products -->
        <section class="py-12 bg-green-50">
            <div class="container mx-auto px-4">   
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

                    @forelse ($products as $product)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300 transform hover:scale-105">
                            <a href="{{ route('product.show', $product->id) }}">
                                <div class="h-48 overflow-hidden">
                                    @if ($product->image_url)
                                        <img loading="lazy" src="{{ asset('/storage/' . $product->image_url) }}" alt="{{ $product->name }}" class="w-full h-full object-cover transition-transform duration-300 hover:scale-110">
                                    @else
                                        <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                                            <i class="fas fa-image text-gray-400 text-4xl"></i>
                                        </div>
                                    @endif
                                        {{-- wishlist --}}
                                    <div class="absolute top-2 right-2">
                                        <button class="add-to-wishlist bg-white dark:bg-gray-800 rounded-full p-2 shadow hover:bg-gray-100 dark:hover:bg-gray-700 transform transition-all duration-300 hover:scale-110" data-product-id="{{ $product->id }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <div class="p-4">
                                    <div class="flex justify-between items-center">
                                        <h3 class="text-lg font-bold mb-2 text-gray-800"> {{ $product->name }} </h3>
                                        <span class="text-green-700 font-bold">{{ number_format($product->price, 0, ',', ' ') }} FCFA</span>

                                    </div>
                                    <p class="text-sm text-gray-600 mb-2 line-clamp-2">{{ $product->description }}</p>
                                    <div class="flex justify-self-end mt-4">

                                        <span class="text-xs text-gray-500"> Shop:{{ $product->shop->name }}</span>
                                    </div>
                                </div>
                            </a>

                            <div class="p-2 mt-1">
                                @auth <!-- Show button only if user is logged in -->
                                <form class="add-to-cart-form " method="POST" action="{{ route('cart.add') }}">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <div class="flex justify-between  space-x-2 items-center">
                                        <input type="number" name="quantity" value="1" min="1" class="w-10 px-1 py-1 border border-gray-300 dark:border-gray-600 rounded-md dark:bg-gray-800 dark:text-white">
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
                                <p class="mt-4"><a href="{{ route('login') }}" class="text-blue-600 dark:text-blue-400 hover:underline">Connectez-vous</a> pour ajouter des articles à votre panier.</p>
                                @endauth
                            </div>
                        </div>
                    @empty
                        <div class="col-span-4 text-center py-8">
                            <p class="text-gray-500">Aucun produit disponible pour le moment.</p>
                        </div>
                    @endforelse
                </div>
                <div>
                    {{ $products->links() }}
                </div>
            </div>
        </section>
        
    
        <!-- Include Footer -->
        @include('layouts.footer')
        
        @vite(['resources/css/app.css', 'resources/js/carousel.js'])
        <script>
            // Fonctions pour le panier et les favoris
            function addToCart(productId) {
                // Implémenter la logique d'ajout au panier via AJAX
                alert('Produit ajouté au panier !');
            }
            
            function addToWishlist(productId) {
                // Implémenter la logique d'ajout aux favoris via AJAX
                alert('Produit ajouté aux favoris !');
            }

            // Fonction pour afficher le modal de connexion
            function showLoginModal() {
                const loginModal = document.getElementById('login-modal');
                const modalContent = document.getElementById('modal-content');
                
                if (loginModal && modalContent) {
                    loginModal.classList.remove('hidden');
                    setTimeout(() => {
                        modalContent.classList.remove('scale-95', 'opacity-0');
                        modalContent.classList.add('scale-100', 'opacity-100');
                    }, 10);
                }
            }

            // Fonction pour ajouter au panier
            function addToCart(productId) {
                @auth
                fetch(`/cart/add/${productId}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Animation de succès
                        const button = event.target.closest('button');
                        const originalText = button.innerHTML;
                        button.innerHTML = '<i class="fas fa-check"></i> Ajouté';
                        button.classList.add('bg-green-500');
                        
                        setTimeout(() => {
                            button.innerHTML = originalText;
                            button.classList.remove('bg-green-500');
                        }, 2000);
                    }
                });
                @else
                showLoginModal();
                @endauth
            }

            // Fonction pour ajouter à la liste de souhaits
            function addToWishlist(productId) {
                @auth
                fetch(`/wishlist/add/${productId}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Animation de succès
                        const button = event.target.closest('button');
                        button.innerHTML = '<i class="fas fa-heart text-red-500"></i>';
                        
                        setTimeout(() => {
                            button.innerHTML = '<i class="far fa-heart"></i>';
                        }, 2000);
                    }
                });
                @else
                showLoginModal();
                @endauth
            }
            
            // Code existant pour le carousel
            document.addEventListener('DOMContentLoaded', function() {
                const track = document.querySelector('.carousel-track');
                const slides = document.querySelectorAll('.carousel-item');
                const nextButton = document.querySelector('.carousel-next');
                const prevButton = document.querySelector('.carousel-prev');
                let currentIndex = 0;

                function updateCarousel() {
                    track.style.transform = `translateX(-${currentIndex * 100}%)`;
                }

                function nextSlide() {
                    currentIndex = (currentIndex + 1) % slides.length;
                    updateCarousel();
                }

                function prevSlide() {
                    currentIndex = (currentIndex - 1 + slides.length) % slides.length;
                    updateCarousel();
                }

                // Event listeners
                nextButton.addEventListener('click', nextSlide);
                prevButton.addEventListener('click', prevSlide);

                // Auto-advance slides every 5 seconds
                setInterval(nextSlide, 5000);
            });
        </script>

        {{-- cart and wishlist --}}
        @push('scripts')
            <script>
                // Fonction pour ajouter un produit au panier
                function addToCart(productId) {
                    // Vérifier si l'utilisateur est connecté
                    @auth
                        // Envoyer une requête AJAX pour ajouter le produit au panier
                        fetch(`/cart/add/${productId}`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                // Animation de succès sur le bouton
                                const button = event.target.closest('button');
                                button.innerHTML = '<i class="fas fa-check mr-1"></i> Ajouté';
                                button.classList.remove('bg-green-900', 'hover:bg-green-700');
                                button.classList.add('bg-green-500');
                                
                                setTimeout(() => {
                                    button.innerHTML = '<i class="fas fa-cart-plus mr-1"></i> Ajouter';
                                    button.classList.remove('bg-green-500');
                                    button.classList.add('bg-green-900', 'hover:bg-green-700');
                                }, 2000);
                            }
                        });
                    @else
                        // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
                        window.location.href = '{{ route('login') }}';
                    @endauth
                }


            </script>
        @endpush

    </body>
</html>

