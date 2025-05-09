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

    
        <section class="py-8 bg-white md:py-16 dark:bg-gray-900 antialiased">
          @if (session('success'))
              <div class="max-w-lg mb-4 mx-auto bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                  <strong class="font-bold">Success!</strong>
                  <span class="block sm:inline">{{ session('success') }}</span>
                  <span class="absolute top-0 bottom-0 right-0 px-4 py-3"></span>
              </div>                  
          @endif
            <div class="max-w-screen-xl px-4 mx-auto 2xl:px-0">
              <div class="lg:grid lg:grid-cols-2 lg:gap-8 xl:gap-16">
                <div class="shrink-0 max-w-md overflow-hidden max-h-96 lg:max-w-lg mx-auto">            
                  <img loading="lazy" src="{{ asset('/storage/' . $product->image_url) }}" alt="{{ $product->name }}" class="w-full object-cover dark:block">
                </div>
        
                <div class="mt-6 sm:mt-8 lg:mt-0">
                  <h1
                    class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white"
                  >
                   {{ $product->name }}
                  </h1>
                  <div class="mt-4 sm:items-center sm:gap-4 sm:flex">
                    <p
                      class="text-2xl font-extrabold text-gray-900 sm:text-3xl dark:text-white"
                    >
                    {{ $product->price }}
                    </p>
        
                    <div class="flex items-center gap-2 mt-2 sm:mt-0">
                      <div class="flex items-center gap-1">
                        <svg
                          class="w-4 h-4 text-yellow-300"
                          aria-hidden="true"
                          xmlns="http://www.w3.org/2000/svg"
                          width="24"
                          height="24"
                          fill="currentColor"
                          viewBox="0 0 24 24"
                        >
                          <path
                            d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z"
                          />
                        </svg>
                        <svg
                          class="w-4 h-4 text-yellow-300"
                          aria-hidden="true"
                          xmlns="http://www.w3.org/2000/svg"
                          width="24"
                          height="24"
                          fill="currentColor"
                          viewBox="0 0 24 24"
                        >
                          <path
                            d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z"
                          />
                        </svg>
                        <svg
                          class="w-4 h-4 text-yellow-300"
                          aria-hidden="true"
                          xmlns="http://www.w3.org/2000/svg"
                          width="24"
                          height="24"
                          fill="currentColor"
                          viewBox="0 0 24 24"
                        >
                          <path
                            d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z"
                          />
                        </svg>
                        <svg
                          class="w-4 h-4 text-yellow-300"
                          aria-hidden="true"
                          xmlns="http://www.w3.org/2000/svg"
                          width="24"
                          height="24"
                          fill="currentColor"
                          viewBox="0 0 24 24"
                        >
                          <path
                            d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z"
                          />
                        </svg>
                        <svg
                          class="w-4 h-4 text-yellow-300"
                          aria-hidden="true"
                          xmlns="http://www.w3.org/2000/svg"
                          width="24"
                          height="24"
                          fill="currentColor"
                          viewBox="0 0 24 24"
                        >
                          <path
                            d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z"
                          />
                        </svg>
                      </div>
                      <p
                        class="text-sm font-medium leading-none text-gray-500 dark:text-gray-400"
                      >
                        (5.0)
                      </p>
                      <a
                        href="#"
                        class="text-sm font-medium leading-none text-gray-900 underline hover:no-underline dark:text-white"
                      >
                        345 Reviews
                      </a>
                    </div>
                  </div>
        
                  <div class="mt-6 sm:gap-4 sm:items-center sm:flex sm:mt-8">
                    <a
                      href="#"
                      title=""
                      class="flex items-center justify-center py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
                      role="button"
                    >
                      <svg
                        class="w-5 h-5 -ms-2 me-2"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        fill="none"
                        viewBox="0 0 24 24"
                      >
                        <path
                          stroke="currentColor"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M12.01 6.001C6.5 1 1 8 5.782 13.001L12.011 20l6.23-7C23 8 17.5 1 12.01 6.002Z"
                        />
                      </svg>
                      Add to favorites
                    </a>
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
        
                  <hr class="my-6 md:my-8 border-gray-200 dark:border-gray-800" />
        
                  <p class="mb-6 text-gray-500 dark:text-gray-400">
                    {{ $product->description }}
                  </p>
                </div>
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

