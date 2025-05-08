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
            <div class="max-w-screen-xl px-4 mx-auto 2xl:px-0">
              <div class="lg:grid lg:grid-cols-2 lg:gap-8 xl:gap-16">
                <div class="shrink-0 max-w-md lg:max-w-lg mx-auto">
                  <img loading="lazy" class="w-full dark:hidden" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-front.svg" alt="" />
                  <img loading="lazy" class="w-full hidden dark:block" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-front-dark.svg" alt="" />
                </div>
        
                <div class="mt-6 sm:mt-8 lg:mt-0">
                  <h1
                    class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white"
                  >
                    Apple iMac 24" All-In-One Computer, Apple M1, 8GB RAM, 256GB SSD,
                    Mac OS, Pink
                  </h1>
                  <div class="mt-4 sm:items-center sm:gap-4 sm:flex">
                    <p
                      class="text-2xl font-extrabold text-gray-900 sm:text-3xl dark:text-white"
                    >
                      $1,249.99
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
        
                    <a
                      href="#"
                      title=""
                      class="text-white mt-4 sm:mt-0 bg-green-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800 flex items-center justify-center"
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
                          d="M4 4h1.5L8 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm.75-3H7.5M11 7H6.312M17 4v6m-3-3h6"
                        />
                      </svg>
        
                      Add to cart
                    </a>
                  </div>
        
                  <hr class="my-6 md:my-8 border-gray-200 dark:border-gray-800" />
        
                  <p class="mb-6 text-gray-500 dark:text-gray-400">
                    Studio quality three mic array for crystal clear calls and voice
                    recordings. Six-speaker sound system for a remarkably robust and
                    high-quality audio experience. Up to 256GB of ultrafast SSD storage.
                  </p>
        
                  <p class="text-gray-500 dark:text-gray-400">
                    Two Thunderbolt USB 4 ports and up to two USB 3 ports. Ultrafast
                    Wi-Fi 6 and Bluetooth 5.0 wireless. Color matched Magic Mouse with
                    Magic Keyboard or Magic Keyboard with Touch ID.
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

