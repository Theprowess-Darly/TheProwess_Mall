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

    <!-- Hero Section with Infinite Carousel -->
    <section class="hero-section relative overflow-hidden">
        <div class="carousel-container">
            <div class="carousel-track">
                <!-- Carousel Item 1 -->
                <div class="carousel-item">
                    <div class="hero1-background bg-teal-950 text-white py-16">
                        <div class="container mx-auto px-4">
                            <div class="flex items-center justify-between">
                                 <div class="w-2/3 ">
                                    <!-- <img src="{{ Vite::asset('resources/images/carousel/slider-1.png') }}" alt="slider 1" class="w-full"> -->
                                </div>
                                <div class="w-1/2">
                                    <h1 class="text-4xl font-bold mb-4">Bienvenue sur TheProwess Mall</h1>
                                    <p class="text-lg mb-8">Découvrez nos meilleures offres et profitez de prix imbattables</p>
                                    <p class="text-lg mb-8">Jouissez de votre arjent sur notre site</p>
                                    <a href="#" class="bg-yellow-500 text-white px-8 py-3 rounded-full hover:bg-yellow-600">Voir les offres</a>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Carousel Item 2 -->
                <div class="carousel-item">
                    <div class="hero2-background bg-yellow-600  text-green-70 py-16">
                        <div class="container mx-auto px-4">
                            <div class="flex items-center justify-between">
                                 <div class="w-2/3 ">
                                    <!-- <img src="{{ Vite::asset('resources/images/carousel/slider-2.jpg') }}" alt="Slider 2" class="w-full"> -->
                                </div>
                                <div class="w-1/2">
                                    <h1 class="text-4xl font-bold mb-4">Offres Spéciales</h1>
                                    <p class="text-lg mb-8">Jusqu'à 50% de réduction sur les articles sélectionnés</p>
                                    <a href="#" class="bg-teal-950 text-white px-8 py-3 rounded-full hover:bg-teal-900">Shop Now</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Carousel Item 3 -->
                <div class="carousel-item">
                    <div class="hero3-background  text-white py-16">
                        <div class="container mx-auto px-4">
                            <div class="flex items-center justify-between">
                                                               <div class="w-1/2 ">
                                    <!-- <img src="{{ Vite::asset('resources/images/carousel/slider-3.png') }}" alt="Slider 3" class="w-full"> -->
                                </div> 
                                <div class="w-1/2">
                                    <h1 class="text-4xl font-bold mb-4">Prix et tarifs inbattables</h1>
                                    <p class="text-lg mb-8">Economisez et faites vous de l'argent en achetant ou en vendant sur notre site</p>
                                    <a href="#" class="bg-white text-green-700 px-8 py-3 rounded-full hover:bg-gray-100">Explorer</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- Carousel Item 4 -->
                <div class="carousel-item">
                    <div class="hero4-background bg-green-700 text-white py-16">
                        <div class="container mx-auto px-4">
                            <div class="flex items-center justify-between">
                                <div class="w-1/2">
                                    <h1 class="text-4xl font-bold mb-4">Nouveaux Arrivages</h1>
                                    <p class="text-lg mb-8">Découvrez nos dernières collections</p>
                                    <a href="#" class="bg-white text-green-700 px-8 py-3 rounded-full hover:bg-gray-100">Explorer</a>
                                </div>
                                <div class="w-1/2">
                                    <!-- <img src="{{ Vite::asset('resources/images/carousel/moneychart.png') }}" alt="Slider 4" class="w-full"> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Carousel Item 5 -->
                <div class="carousel-item">
                    <div class="hero5-background bg-yellow-700 text-white py-16">
                        <div class="container mx-auto px-4">
                            <div class="flex items-center justify-between">
                                <div class="w-1/2">
                                    <h1 class="text-4xl font-bold mb-4">Rapide et sur</h1>
                                    <p class="text-lg mb-8">
                                        Faites vos achats en quelques minutes
                                    </p>
                                    <a href="#" class="bg-white text-green-700 px-8 py-3 rounded-full hover:bg-gray-100">Explorer</a>
                                </div>
                                <div class="w-1/2">
                                    <!-- <img src="{{ Vite::asset('resources/images/carousel/slider-6.jpg') }}" alt="Slider 5" class="w-full"> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Carousel Item 6 -->
                <div class="carousel-item">
                    <div class="hero6-background bg-yellow-700 text-teal-700 py-16">
                        <div class="container mx-auto px-4">
                            <div class="flex items-center justify-between">
                                <div class="w-1/2">
                                    <h1 class="text-4xl font-bold mb-4">Livraisons a domicile</h1>
                                    <p class="text-lg mb-8">
                                        Faites vous livrer sut toute l'etendue du territoire et bientot a l'etranger
                                    </p>
                                    <a href="#" class="bg-white text-green-700 px-8 py-3 rounded-full hover:bg-gray-100">Explorer</a>
                                </div>
                                <div class="w-1/2">
                                    <!-- <img src="{{ Vite::asset('resources/images/carousel/slider-6.jpg') }}" alt="Slider 5" class="w-full"> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Carousel Item 7 -->
                <div class="carousel-item">
                    <div class="hero7-background bg-yellow-700 text-white py-16">
                        <div class="container mx-auto px-4">
                            <div class="flex items-center justify-between">
                                <div class="w-1/2">
                                    <h1 class="text-4xl font-bold mb-4">Toujours satisfaits</h1>
                                    <p class="text-lg mb-8">
                                        Votre satisfaction fait notre joie 
                                    </p>
                                    <a href="#" class="bg-white text-green-700 px-8 py-3 rounded-full hover:bg-gray-100">Explorer</a>
                                </div>
                               <div class="w-1/2">
                                    <!-- <img src="{{ Vite::asset('resources/images/carousel/slider-6.jpg') }}" alt="Slider 5" class="w-full"> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Carousel Item 8 -->
                <div class="carousel-item">
                    <div class="hero8-background bg-yellow-700 text-teal-700 py-16">
                        <div class="container mx-auto px-4">
                            <div class="flex items-center justify-between">

                                <div class="w-1/2">
                                    <h1 class="text-4xl font-bold mb-4">Gagnez de l'argent</h1>
                                    <p class="text-lg mb-8">
                                        Vendez vos atricles rapidement sur notre site
                                    </p>
                                    <a href="{{ route('become-seller') }}" class="bg-white text-green-700 px-8 py-3 rounded-full hover:bg-gray-100">Explorer</a>
                                </div>
                                <div class="w-1/2">
                                    <!-- <img src="{{ Vite::asset('resources/images/carousel/slider-6.jpg') }}" alt="Slider 5" class="w-full"> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Add more carousel items as needed -->
            </div>
            
            <!-- Navigation Buttons -->
            <button class="carousel-prev absolute left-4 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-50 text-white p-2 rounded-full hover:bg-opacity-75 transition-all duration-200">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button class="carousel-next absolute right-4 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-50 text-white p-2 rounded-full hover:bg-opacity-75 transition-all duration-200">
                <i class="fas fa-chevron-right"></i>
            </button>
            
            <!-- Dots Navigation -->
            <div class="carousel-dots absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2">
            </div>
        </div>
    </section>

  
    <!-- Featured Products -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl font-bold mb-8">Produits vedettes</h2>
            <div class="md:grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                <!-- Product Card 1-->
                <!-- Update your product cards to include data attributes -->
                <div class="bg-green-50 my-2 rounded-lg p-6 shadow-lg transform transition-all duration-300 hover:scale-105 hover:shadow-3xl">
                    <img src="{{ Vite::asset('resources/images/categories/deco2.jpg') }}" alt="Product" class="w-full h-60 object-cover rounded-t-lg">
                    <div class="p-4">
                        <h3 class="font-semibold mb-2">Tableau decoratif</h3>
                        <p class="text-gray-600 text-sm mb-2">Description courte du produit</p>
                        <div class="flex justify-between items-center">
                            <span class="font-bold text-green-600">15,000 FCFA</span>
                            <button 
                                class="add-to-cart bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600"
                                data-product-id="1"
                                data-product-name="Tableau decoratif"
                                data-product-price="15000"
                                data-product-image="{{ Vite::asset('resources/images/categories/deco2.jpg') }}"
                            >
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Product Card 2 -->
                <div class="bg-green-50 my-2 rounded-lg p-6  shadow-lg transform transition-all duration-300 hover:scale-105 hover:shadow-3xl">
                    <img src="{{ Vite::asset('resources/images/categories/deco1.jpg') }}" alt="Product" class="w-full h-60 object-cover rounded-t-lg">
                    <div class="p-4">
                        <h3 class="font-semibold mb-2">Centre de table</h3>
                        <p class="text-gray-600 text-sm mb-2">Description courte du produit</p>
                        <div class="flex justify-between items-center">
                            <span class="font-bold text-green-600">13,500 FCFA</span>
                            <button href="#" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Product Card 3 -->
                <div class="bg-green-50 my-2 rounded-lg p-6  shadow-lg transform transition-all duration-300 hover:scale-105 hover:shadow-3xl">
                    <img src="{{ Vite::asset('resources/images/categories/deco3.jpg') }}" alt="Product" class="w-full h-60 object-cover rounded-t-lg">
                    <div class="p-4">
                        <h3 class="font-semibold mb-2">Deco murale</h3>
                        <p class="text-gray-600 text-sm mb-2">Description courte du produit</p>
                        <div class="flex justify-between items-center">
                            <span class="font-bold text-green-600">10,500 FCFA</span>
                            <button href="#" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Product Card 4 -->
                <div class="bg-green-50 my-2 rounded-lg p-6  shadow-lg transform transition-all duration-300 hover:scale-105 hover:shadow-3xl">
                    <img src="{{ Vite::asset('resources/images/categories/tableauDeco1.jpg') }}" alt="Product" class="w-full h-60 object-cover rounded-t-lg">
                    <div class="p-4">
                        <h3 class="font-semibold mb-2">Deco murale</h3>
                        <p class="text-gray-600 text-sm mb-2">Vitree Apple noir or</p>
                        <div class="flex justify-between items-center">
                            <span class="font-bold text-green-600">10,500 FCFA</span>
                            <button href="#" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Repeat for more products -->
            </div>
        </div>
    </section>


    <!-- Special Offers -->
    <section class="py-12">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl font-bold mb-8">Offres spéciales</h2>
            <div class="md:grid grid-cols-2 gap-8">
                <!-- offre 1 -->
                <div class="bg-yellow-50 my-2 rounded-lg p-6 flex items-center shadow-lg transform transition-all duration-300 
                         hover:scale-105 hover:shadow-xl">                  
                    <div class="flex-1">
                        <h3 class="text-xl font-bold mb-2">Offre Flash</h3>
                        <p class="mb-4">Jusqu'à 50% de réduction</p>
                        <a href="#" class="bg-yellow-700 text-white px-6 py-2 rounded hover:bg-yellow-600">Voir plus</a>
                    </div>
                    <img src="{{ vite::asset('resources/images/offers/parfum.png') }}" alt="Offer" class="w-2/3">
                </div>
                <!-- offre 2 -->
                <div class="bg-white my-2 rounded-lg p-6 flex items-center shadow-lg transform transition-all duration-300 
                         hover:scale-105 hover:shadow-xl">                  
                    <div class="flex-1">
                        <h3 class="text-xl font-bold mb-2">Vente Flash</h3>
                        <p class="mb-4">Jusqu'à 20% de réduction</p>
                        <a href="#" class="bg-yellow-700 text-white px-6 py-2 rounded hover:bg-yellow-500">Voir plus</a>
                    </div>
                    <img src="{{ vite::asset('resources/images/categories/deco3.jpg') }}" alt="Offer" class="w-1/3">
                </div>
                <!-- Add more offers -->
            </div>
        </div>
    </section>

    <!-- Popular Brands -->
    <section class="py-12 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl font-bold mb-8">Marques Populaires</h2>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
                <!-- Brand logo1 -->
                <div class="bg-white p-4 rounded-lg shadow hover:shadow-lg transition-shadow">
                    <img src="{{ vite::asset('resources/images/logos/tpmL.png')}}" alt="Brand" class="w-full h-20 object-contain">
                </div>
                <!-- Brand logo2 -->
                <div class="bg-white p-4 rounded-lg shadow hover:shadow-lg transition-shadow">
                    <img src="{{ vite::asset('resources/images/logos/samsung.png')}}" alt="Brand" class="w-full h-20 object-contain">
                </div>
                <!-- Brand logo3 -->
                <div class="bg-white p-4 rounded-lg shadow hover:shadow-lg transition-shadow">
                    <img src="{{ vite::asset('resources/images/logos/apple.png')}}" alt="Brand" class="w-full h-20 object-contain">
                </div>
                <!-- Brand logo4 -->
                <div class="bg-white p-4 rounded-lg shadow hover:shadow-lg transition-shadow">
                    <img src="{{ vite::asset('resources/images/logos/tecno.png')}}" alt="Brand" class="w-full h-20 object-contain">
                </div>
                <!-- Brand logo5 -->
                <div class="bg-white p-4 rounded-lg shadow hover:shadow-lg transition-shadow">
                    <img src="{{ vite::asset('resources/images/logos/infinix.png') }}" alt="Brand" class="w-full h-20 object-contain">
                </div>
                <!-- Repeat for more brands -->
            </div>
        </div>
    </section>

    <!-- Latest Blog Posts -->
    <section class="py-12">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl font-bold mb-8">Actualités & Conseils</h2>
            <div class="grid md:grid-cols-3 gap-6">
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <img src="{{ vite::asset('resources/images/bgs/lady.png')}}" alt="Blog" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="font-semibold mb-2">Guide d'achat</h3>
                        <p class="text-gray-600 mb-4">Comment choisir les meilleurs produits...</p>
                        <a href="#" class="text-yellow-600 hover:text-yellow-700">Lire plus →</a>
                    </div>
                </div>
                <!-- Repeat for more blog posts -->
            </div>
        </div>
    </section>

    <!-- Customer Testimonials -->
    <section class="py-12 bg-teal-950 text-white">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl font-bold mb-12 text-center">Ce que disent nos clients</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Temoignage client 1 -->
                <div class="bg-teal-900 p-6 rounded-lg relative">
                    <div class="absolute -top-6 left-1/2 transform -translate-x-1/2">
                        <img src="{{ vite::asset('resources/images/userprofile/client0.png') }}" alt="Customer" class="w-20 h-20 rounded-full border-4 border-teal-950">
                    </div>
                    <p class="mt-8 mb-4 text-gray-300">"Service excellent, livraison rapide..."</p>
                    <p class="font-semibold">- Ezekiel D.</p>
                </div>
                <!-- Temoignage client 2 -->
                <div class="bg-teal-900 p-6 rounded-lg relative">
                    <div class="absolute -top-6 left-1/2 transform -translate-x-1/2">
                        <img src="{{ vite::asset('resources/images/userprofile/Vendeur0.png') }}" alt="Customer" class="w-20 h-20 rounded-full border-4 border-teal-950">
                    </div>
                    <p class="mt-8 mb-4 text-gray-300">"Plateforme agreable, livraison rapide..."</p>
                    <p class="font-semibold">- James A.</p>
                </div>
                <!-- Temoignage client 3 -->
                <div class="bg-teal-900 p-6 rounded-lg relative">
                    <div class="absolute -top-6 left-1/2 transform -translate-x-1/2">
                        <img src="{{ vite::asset('resources/images/userprofile/Admin0.png') }}" alt="Customer" class="w-20 h-20 rounded-full border-4 border-teal-950">
                    </div>
                    <p class="mt-8 mb-4 text-gray-300">"Produits de qualite, livraison rapide..."</p>
                    <p class="font-semibold">- Marie J.</p>
                </div>
                <!-- Repeat for more testimonials -->
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="py-12">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl font-bold mb-8">Catégories populaires</h2>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
                <!-- categorie 1 -->
                <a href="#" class="bg-white p-4 rounded-lg shadow-lg transform transition-all duration-300 hover:text-white hover:bg-green-900 hover:scale-105 hover:shadow-3xl text-center">
                    <i class="fas fa-mobile-alt text-3xl hover:text-white text-green-500 mb-2 hidden sm:block"></i>
                    <p class="sm:mt-2">Téléphones</p>
                </a>
                <!-- categorie 2 -->
                <a href="#" class="bg-white p-4 rounded-lg shadow-lg transform transition-all duration-300 hover:text-white hover:bg-green-900 hover:scale-105 hover:shadow-3xl text-center">
                    <i class="fas fa-blender text-3xl hover:text-white text-green-500 mb-2 hidden sm:block"></i>
                    <p class="sm:mt-2">Electromenager</p>
                </a>
                <!-- categorie 3 -->
                <a href="#" class="bg-white p-4 rounded-lg shadow-lg transform transition-all duration-300 hover:text-white hover:bg-green-900 hover:scale-105 hover:shadow-3xl text-center">
                    <i class="fas fa-tshirt text-3xl hover:text-white text-green-500 mb-2"></i>
                    <p>Fashion</p>
                </a>
                <!-- categorie 4 -->
                <a href="#" class="bg-white p-4 rounded-lg shadow-lg transform transition-all duration-300 hover:text-white hover:bg-green-900 hover:scale-105 hover:shadow-3xl text-center">
                    <i class="fas fa-shopping-basket text-3xl hover:text-white text-green-500 mb-2"></i>
                    <p>Super marche</p>
                </a>
                <!-- categorie 5 -->
                <a href="#" class="bg-white p-4 rounded-lg shadow-lg transform transition-all duration-300 hover:text-white hover:bg-green-900 hover:scale-105 hover:shadow-3xl text-center">
                    <i class="fas fa-laptop text-3xl hover:text-white text-green-500 mb-2"></i>
                    <p>Informatique</p>
                </a>
                <!-- categorie 6 -->
                <a href="#" class="bg-white p-4 rounded-lg shadow-lg transform transition-all duration-300 hover:text-white hover:bg-green-900 hover:scale-105 hover:shadow-3xl text-center">
                    <i class="fas fa-spa text-3xl hover:text-white text-green-500 mb-2"></i>
                    <p>Beaute et Bien etre</p>
                </a>
                <!-- categorie 7 -->
                <a href="#" class="bg-white p-4 rounded-lg shadow-lg transform transition-all duration-300 hover:text-white hover:bg-green-900 hover:scale-105 hover:shadow-3xl text-center">
                    <i class="fas fa-wine-bottle text-3xl hover:text-white text-green-500 mb-2"></i>
                    <p>Cave</p>
                </a>
                <!-- categorie 8 -->
                <a href="#" class="bg-white p-4 rounded-lg shadow-lg transform transition-all duration-300 hover:text-white hover:bg-green-900 hover:scale-105 hover:shadow-3xl text-center">
                    <i class="fas fa-book text-3xl hover:text-white text-green-500 mb-2"></i>
                    <p>Librairies</p>
                </a>
                <!-- categorie 9 -->
                <a href="#" class="bg-white p-4 rounded-lg shadow-lg transform transition-all duration-300 hover:text-white hover:bg-green-900 hover:scale-105 hover:shadow-3xl text-center">
                    <i class="fas fa-baby text-3xl hover:text-white text-green-500 mb-2"></i>
                    <p>Enfants et maternite</p>
                </a>
                <!-- categorie 10 -->
                
                <a href="#" class="bg-white p-4 rounded-lg shadow-lg transform transition-all duration-300 hover:text-white hover:bg-green-900 hover:scale-105 hover:shadow-3xl text-center">
                    <i class="fas fa-spray-can text-3xl hover:text-white text-green-500 mb-2"></i>
                    <p>Parfums</p>
                </a>
                <!-- categorie 11 -->
                <a href="#" class="bg-white p-4 rounded-lg shadow-lg transform transition-all duration-300 hover:text-white hover:bg-green-900 hover:scale-105 hover:shadow-3xl text-center">
                    <i class="fas fa-tag text-3xl hover:text-white text-green-500 mb-2"></i>
                    <p>Black firday</p>
                </a>
                <!-- categorie 11 -->
                <a href="#" class="bg-white my-2 p-4 rounded-lg shadow-lg transform transition-all duration-300 hover:text-white hover:bg-green-900 hover:scale-105 hover:shadow-3xl text-center">
                    <i class="fas fa-plug text-3xl hover:text-white text-green-500 mb-2 hidden sm:block"></i>
                    <p class="sm:mt-2">Accessoires</p>
                </a>
               
                <!-- Add more categories as needed -->
            </div>
        </div>
    </section>

    <!-- Include Footer -->
    @include('layouts.footer')
    
    @vite(['resources/css/app.css', 'resources/js/carousel.js'])
    <script>
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
</body>
</html>