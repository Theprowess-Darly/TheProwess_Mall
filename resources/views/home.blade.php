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
                        <div class="hero1-background bg-teal-950 text-white py-8 md:py-16">
                            <div class="container mx-auto px-4">
                                <div class="flex flex-col md:flex-row items-center md:justify-between">
                                    <div class="w-full md:w-1/2 lg:w-2/3 mb-6 md:mb-0 order-2 md:order-1">
                                        <!-- <img loading="lazy" src="{{ asset('images/carousel/slider-1.png') }}" alt="slider 1" class="w-full"> -->
                                    </div>
                                    <div class="w-full md:w-1/2 text-center md:text-left order-1 md:order-2">
                                        <h1 class="text-2xl md:text-3xl lg:text-4xl font-bold mb-4">Bienvenue sur TheProwess Mall</h1>
                                        <p class="text-base md:text-lg mb-4 md:mb-8">Découvrez nos meilleures offres et profitez de prix imbattables</p>
                                        <p class="text-base md:text-lg mb-4 md:mb-8">Jouissez de votre arjent sur notre site</p>
                                        <a href="#" class="inline-block bg-yellow-500 text-white px-4 md:px-8 py-2 md:py-3 rounded-full hover:bg-yellow-600">Voir les offres</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Carousel Item 2 -->
                    <div class="carousel-item">
                        <div class="hero2-background bg-yellow-600 text-green-70 py-8 md:py-16">
                            <div class="container mx-auto px-4">
                                <div class="flex flex-col md:flex-row items-center md:justify-between">
                                    <div class="w-full md:w-1/2 lg:w-2/3 mb-6 md:mb-0 order-2 md:order-1">
                                        <!-- <img src="{{ asset('images/carousel/slider-2.jpg') }}" alt="Slider 2" class="w-full"> -->
                                    </div>
                                    <div class="w-full md:w-1/2 text-center md:text-left order-1 md:order-2">
                                        <h1 class="text-2xl md:text-3xl lg:text-4xl font-bold mb-4">Offres Spéciales</h1>
                                        <p class="text-base md:text-lg mb-4 md:mb-8">Jusqu'à 50% de réduction sur les articles sélectionnés</p>
                                        <a href="#" class="inline-block bg-teal-950 text-white px-4 md:px-8 py-2 md:py-3 rounded-full hover:bg-teal-900">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Carousel Item 3 -->
                    <div class="carousel-item">
                        <div class="hero3-background text-white py-8 md:py-16">
                            <div class="container mx-auto px-4">
                                <div class="flex flex-col md:flex-row items-center md:justify-between">
                                    <div class="w-full md:w-1/2 mb-6 md:mb-0 order-2 md:order-1">
                                        <!-- <img src="{{ asset('images/carousel/slider-3.png') }}" alt="Slider 3" class="w-full"> -->
                                    </div>
                                    <div class="w-full md:w-1/2 text-center md:text-left order-1 md:order-2">
                                        <h1 class="text-2xl md:text-3xl lg:text-4xl font-bold mb-4">Prix et tarifs inbattables</h1>
                                        <p class="text-base md:text-lg mb-4 md:mb-8">Economisez et faites vous de l'argent en achetant ou en vendant sur notre site</p>
                                        <a href="{{ route('products.store') }}" class="inline-block bg-white text-green-700 px-4 md:px-8 py-2 md:py-3 rounded-full hover:bg-gray-100">Explorer</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Carousel Item 4 -->
                    <div class="carousel-item">
                        <div class="hero4-background bg-green-700 text-white py-8 md:py-16">
                            <div class="container mx-auto px-4">
                                <div class="flex flex-col md:flex-row items-center md:justify-between">
                                    <div class="w-full md:w-1/2 text-center md:text-left order-1">
                                        <h1 class="text-2xl md:text-3xl lg:text-4xl font-bold mb-4">Nouveaux Arrivages</h1>
                                        <p class="text-base md:text-lg mb-4 md:mb-8">Découvrez nos dernières collections</p>
                                        <a href="{{ route('products.store') }}" class="inline-block bg-white text-green-700 px-4 md:px-8 py-2 md:py-3 rounded-full hover:bg-gray-100">Explorer</a>
                                    </div>
                                    <div class="w-full md:w-1/2 mb-6 md:mb-0 order-2">
                                        <!-- <img src="{{ asset('images/carousel/moneychart.png') }}" alt="Slider 4" class="w-full"> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Carousel Item 5 -->
                    <div class="carousel-item">
                        <div class="hero5-background bg-yellow-700 text-white py-8 md:py-16">
                            <div class="container mx-auto px-4">
                                <div class="flex flex-col md:flex-row items-center md:justify-between">
                                    <div class="w-full md:w-1/2 text-center md:text-left order-1">
                                        <h1 class="text-2xl md:text-3xl lg:text-4xl font-bold mb-4">Rapide et sur</h1>
                                        <p class="text-base md:text-lg mb-4 md:mb-8">
                                            Faites vos achats en quelques minutes
                                        </p>
                                        <a href="{{ route('products.store') }}" class="inline-block bg-white text-green-700 px-4 md:px-8 py-2 md:py-3 rounded-full hover:bg-gray-100">Explorer</a>
                                    </div>
                                    <div class="w-full md:w-1/2 mb-6 md:mb-0 order-2">
                                        <!-- <img src="{{ asset('images/carousel/slider-6.jpg') }}" alt="Slider 5" class="w-full"> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Carousel Item 6 -->
                    <div class="carousel-item">
                        <div class="hero6-background bg-yellow-700 text-teal-700 py-8 md:py-16">
                            <div class="container mx-auto px-4">
                                <div class="flex flex-col md:flex-row items-center md:justify-between">
                                    <div class="w-full md:w-1/2 text-center md:text-left order-1">
                                        <h1 class="text-2xl md:text-3xl lg:text-4xl font-bold mb-4">Livraisons a domicile</h1>
                                        <p class="text-base md:text-lg mb-4 md:mb-8">
                                            Faites vous livrer sut toute l'etendue du territoire et bientot a l'etranger
                                        </p>
                                        <a href="{{ route('products.store') }}" class="inline-block bg-white text-green-700 px-4 md:px-8 py-2 md:py-3 rounded-full hover:bg-gray-100">Explorer</a>
                                    </div>
                                    <div class="w-full md:w-1/2 mb-6 md:mb-0 order-2">
                                        <!-- <img src="{{ asset('images/carousel/slider-6.jpg') }}" alt="Slider 5" class="w-full"> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Carousel Item 7 -->
                    <div class="carousel-item">
                        <div class="hero7-background bg-yellow-700 text-white py-8 md:py-16">
                            <div class="container mx-auto px-4">
                                <div class="flex flex-col md:flex-row items-center md:justify-between">
                                    <div class="w-full md:w-1/2 text-center md:text-left order-1">
                                        <h1 class="text-2xl md:text-3xl lg:text-4xl font-bold mb-4">Toujours satisfaits</h1>
                                        <p class="text-base md:text-lg mb-4 md:mb-8">
                                            Votre satisfaction fait notre joie 
                                        </p>
                                        <a href="{{ route('products.store') }}" class="inline-block bg-white text-green-700 px-4 md:px-8 py-2 md:py-3 rounded-full hover:bg-gray-100">Explorer</a>
                                    </div>
                                    <div class="w-full md:w-1/2 mb-6 md:mb-0 order-2">
                                        <!-- <img src="{{ asset('images/carousel/slider-6.jpg') }}" alt="Slider 5" class="w-full"> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Carousel Item 8 -->
                    <div class="carousel-item">
                        <div class="hero8-background bg-yellow-700 text-teal-700 py-8 md:py-16">
                            <div class="container mx-auto px-4">
                                <div class="flex flex-col md:flex-row items-center md:justify-between">
                                    <div class="w-full md:w-1/2 text-center md:text-left order-1">
                                        <h1 class="text-2xl md:text-3xl lg:text-4xl font-bold mb-4">Gagnez de l'argent</h1>
                                        <p class="text-base md:text-lg mb-4 md:mb-8">
                                            Vendez vos atricles rapidement sur notre site
                                        </p>
                                        <a href="{{ route('become-seller') }}" class="inline-block bg-white text-green-700 px-4 md:px-8 py-2 md:py-3 rounded-full hover:bg-gray-100">Explorer</a>
                                    </div>
                                    <div class="w-full md:w-1/2 mb-6 md:mb-0 order-2">
                                        <!-- <img src="{{ asset('images/carousel/slider-6.jpg') }}" alt="Slider 5" class="w-full"> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Add more carousel items as needed -->
                </div>
                
                <!-- Navigation Buttons -->
                <button class="carousel-prev absolute left-2 md:left-4 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-50 text-white p-1 md:p-2 rounded-full hover:bg-opacity-75 transition-all duration-200 z-10">
                    <i class="fas fa-chevron-left text-sm md:text-base"></i>
                </button>
                <button class="carousel-next absolute right-2 md:right-4 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-50 text-white p-1 md:p-2 rounded-full hover:bg-opacity-75 transition-all duration-200 z-10">
                    <i class="fas fa-chevron-right text-sm md:text-base"></i>
                </button>
                
                <!-- Dots Navigation -->
                <div class="carousel-dots absolute bottom-2 md:bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-1 md:space-x-2 z-10">
                </div>
            </div>
        </section>

        {{-- Shops Section --}}
        <section class="py-12 bg-yellow-50">
            <div class="container mx-auto px-4">
                <h2 class="text-2xl font-bold mb-8">Nos Boutiques</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

                    @forelse ($shops as $shop)
                        @if($shop->status === 'approved')
                            <div class="bg-white rounded-lg shadow hover:shadow-lg transition-shadow overflow-hidden">
                                <a href="{{ route('vendor.shop.show', $shop) }}" class="block">
                                    @if($shop->logo)
                                        <img loading="lazy" src="{{ asset('storage/' . $shop->logo) }}" alt="{{ $shop->name }}" class="w-full h-40 object-cover">
                                    @else
                                        <div class="w-full h-40 bg-gray-200 flex items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                            </svg>
                                        </div>
                                    @endif
                                    <div class="p-4">
                                        <h3 class="text-lg font-semibold mb-2">{{ $shop->name }}</h3>
                                        <p class="text-gray-600 text-sm line-clamp-2">{{ $shop->description }}</p>
                                        <div class="mt-4 flex justify-between items-center">
                                            <span class="text-sm text-gray-500">{{ $shop->products->count() }} produits</span>
                                            <span class="text-green-600 font-medium text-sm">Voir la boutique</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endif
                    @empty
                        <div class="col-span-full text-center py-8">
                            <p class="text-gray-500">Aucune boutique disponible pour le moment.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>
    
        <!-- Featured Products -->
        <section class="py-12 bg-green-50">
            <div class="container mx-auto px-4">
                <h2 class="text-2xl font-bold mb-8">Produits vedettes</h2>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    
                    @forelse ($featuredProducts as $product)
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
                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                            <strong class="font-bold">Success!</strong>
                            <span class="block sm:inline">{{ session('success') }}</span>
                            <span class="absolute top-0 bottom-0 right-0 px-4 py-3"></span>
                        </div>
                               
                    @endif

                </div>
                
                <div class="text-center mt-8">
                    <a href="{{ route('products.store') }}" class="bg-green-900 text-white px-6 py-2 rounded-md hover:bg-green-700 inline-block">
                        Voir tous les produits
                    </a>
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
                        <img loading="lazy" src="{{ asset('images/logos/tpmL.png')}}" alt="Brand" class="w-full h-20 object-contain">
                    </div>
                    <!-- Brand logo2 -->
                    <div class="bg-white p-4 rounded-lg shadow hover:shadow-lg transition-shadow">
                        <img loading="lazy" src="{{ asset('images/logos/samsung.png')}}" alt="Brand" class="w-full h-20 object-contain">
                    </div>
                    <!-- Brand logo3 -->
                    <div class="bg-white p-4 rounded-lg shadow hover:shadow-lg transition-shadow">
                        <img loading="lazy" src="{{ asset('images/logos/apple.png')}}" alt="Brand" class="w-full h-20 object-contain">
                    </div>
                    <!-- Brand logo4 -->
                    <div class="bg-white p-4 rounded-lg shadow hover:shadow-lg transition-shadow">
                        <img loading="lazy" src="{{ asset('images/logos/tecno.png')}}" alt="Brand" class="w-full h-20 object-contain">
                    </div>
                    <!-- Brand logo5 -->
                    <div class="bg-white p-4 rounded-lg shadow hover:shadow-lg transition-shadow">
                        <img loading="lazy" src="{{ asset('images/logos/infinix.png') }}" alt="Brand" class="w-full h-20 object-contain">
                    </div>
                    <!-- Repeat for more brands -->
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
                        <img loading="lazy" src="{{ asset('images/offers/parfum.png') }}" alt="Offer" class="w-2/3">
                    </div>
                    <!-- offre 2 -->
                    <div class="bg-white my-2 rounded-lg p-6 flex items-center shadow-lg transform transition-all duration-300 
                            hover:scale-105 hover:shadow-xl">                  
                        <div class="flex-1">
                            <h3 class="text-xl font-bold mb-2">Vente Flash</h3>
                            <p class="mb-4">Jusqu'à 20% de réduction</p>
                            <a href="#" class="bg-yellow-700 text-white px-6 py-2 rounded hover:bg-yellow-500">Voir plus</a>
                        </div>
                        <img loading="lazy" src="{{ asset('images/categories/deco3.jpg') }}" alt="Offer" class="w-1/3">
                    </div>
                    <!-- Add more offers -->
                </div>
            </div>
        </section>



        <!-- Latest Blog Posts -->
        <section class="py-12">
            <div class="container mx-auto px-4">
                <h2 class="text-2xl font-bold mb-8">Actualités & Conseils</h2>
                <div class="grid md:grid-cols-3 gap-6">
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                        <img loading="lazy" src="{{ asset('images/bgs/lady.png')}}" alt="Blog" class="w-full h-48 object-cover">
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
                            <img loading="lazy" src="{{ asset('images/userprofile/client0.png') }}" alt="Customer" class="w-20 h-20 rounded-full border-4 border-teal-950">
                        </div>
                        <p class="mt-8 mb-4 text-gray-300">"Service excellent, livraison rapide..."</p>
                        <p class="font-semibold">- Ezekiel D.</p>
                    </div>
                    <!-- Temoignage client 2 -->
                    <div class="bg-teal-900 p-6 rounded-lg relative">
                        <div class="absolute -top-6 left-1/2 transform -translate-x-1/2">
                            <img loading="lazy" src="{{ asset('images/userprofile/Vendeur0.png') }}" alt="Customer" class="w-20 h-20 rounded-full border-4 border-teal-950">
                        </div>
                        <p class="mt-8 mb-4 text-gray-300">"Plateforme agreable, livraison rapide..."</p>
                        <p class="font-semibold">- James A.</p>
                    </div>
                    <!-- Temoignage client 3 -->
                    <div class="bg-teal-900 p-6 rounded-lg relative">
                        <div class="absolute -top-6 left-1/2 transform -translate-x-1/2">
                            <img loading="lazy" src="{{ asset('images/userprofile/Admin0.png') }}" alt="Customer" class="w-20 h-20 rounded-full border-4 border-teal-950">
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

