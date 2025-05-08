<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nos Showrooms - TheProwess Mall</title>
    @vite(['resources/css/app.css'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-50">
    @include('layouts.header')

    <div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8">
        <!-- Hero Section -->
        <div class="bg-teal-950 text-white py-16 rounded-lg mb-12">
            <div class="container mx-auto text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Nos Showrooms</h1>
                <p class="text-lg text-gray-300 max-w-2xl mx-auto">Découvrez nos espaces d'exposition à travers le Cameroun</p>
            </div>
        </div>

        <!-- Main Content -->
        <div class="container mx-auto max-w-7xl">
            <!-- Introduction -->
            <div class="text-center mb-16">
                <p class="text-gray-600 max-w-3xl mx-auto">
                    Visitez nos showrooms pour découvrir nos produits en personne. Nos conseillers sont là pour vous guider et répondre à toutes vos questions.
                </p>
            </div>

            <!-- Showroom Locations -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
                <!-- Douala Showroom -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden transform transition-all duration-300 hover:scale-105">
                    <img loading="lazy" src="{{ asset('images/showrooms/showroom1.jpg') }}" alt="Douala Showroom" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-teal-950 mb-2">Douala - Akwa</h3>
                        <div class="space-y-2 text-gray-600">
                            <p><i class="fas fa-map-marker-alt text-yellow-600 mr-2"></i> Boulevard de la Liberté</p>
                            <p><i class="fas fa-phone text-yellow-600 mr-2"></i> +237 233 123 456</p>
                            <p><i class="fas fa-clock text-yellow-600 mr-2"></i> Lun-Sam: 9h-18h</p>
                        </div>
                        <a href="#" class="inline-block mt-4 bg-teal-950 text-white px-6 py-2 rounded-full hover:bg-teal-900 transition duration-300">
                            Voir sur la carte
                        </a>
                    </div>
                </div>

                <!-- Yaoundé Showroom -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden transform transition-all duration-300 hover:scale-105">
                    <img loading="lazy" src="{{ asset('images/showrooms/showroom3.jpg') }}" alt="Yaoundé Showroom" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-teal-950 mb-2">Yaoundé - Centre</h3>
                        <div class="space-y-2 text-gray-600">
                            <p><i class="fas fa-map-marker-alt text-yellow-600 mr-2"></i> Avenue Kennedy</p>
                            <p><i class="fas fa-phone text-yellow-600 mr-2"></i> +237 233 789 012</p>
                            <p><i class="fas fa-clock text-yellow-600 mr-2"></i> Lun-Sam: 9h-18h</p>
                        </div>
                        <a href="#" class="inline-block mt-4 bg-teal-950 text-white px-6 py-2 rounded-full hover:bg-teal-900 transition duration-300">
                            Voir sur la carte
                        </a>
                    </div>
                </div>

                <!-- Bafoussam Showroom -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden transform transition-all duration-300 hover:scale-105">
                    <img loading="lazy" src="{{ asset('images/showrooms/showroom2.jpg') }}" alt="Bafoussam Showroom" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-teal-950 mb-2">Bafoussam - Centre</h3>
                        <div class="space-y-2 text-gray-600">
                            <p><i class="fas fa-map-marker-alt text-yellow-600 mr-2"></i> Rue mondiale du Marché 'A' entree Dubai</p>
                            <p><i class="fas fa-phone text-yellow-600 mr-2"></i> +237 674 481 692</p>
                            <p><i class="fas fa-clock text-yellow-600 mr-2"></i> Lun-Sam: 9h-18h</p>
                        </div>
                        <a href="#" class="inline-block mt-4 bg-teal-950 text-white px-6 py-2 rounded-full hover:bg-teal-900 transition duration-300">
                            Voir sur la carte
                        </a>
                    </div>
                </div>
            </div>

            <!-- Services Section -->
            <div class="grid md:grid-cols-3 gap-8 mb-16">
                <div class="text-center p-6">
                    <i class="fas fa-handshake text-yellow-600 text-3xl mb-4"></i>
                    <h3 class="text-xl font-semibold text-teal-950 mb-2">Conseil Personnalisé</h3>
                    <p class="text-gray-600">Nos experts sont là pour vous guider dans vos choix</p>
                </div>
                <div class="text-center p-6">
                    <i class="fas fa-box-open text-yellow-600 text-3xl mb-4"></i>
                    <h3 class="text-xl font-semibold text-teal-950 mb-2">Click & Collect</h3>
                    <p class="text-gray-600">Commandez en ligne, récupérez en showroom</p>
                </div>
                <div class="text-center p-6">
                    <i class="fas fa-sync text-yellow-600 text-3xl mb-4"></i>
                    <h3 class="text-xl font-semibold text-teal-950 mb-2">Retours Faciles</h3>
                    <p class="text-gray-600">Retournez vos achats directement en showroom</p>
                </div>
            </div>

            <!-- Contact Section -->
            <div class="bg-teal-950 text-white p-8 rounded-lg text-center">
                <h2 class="text-2xl font-bold mb-4">Besoin d'informations ?</h2>
                <p class="mb-6">Contactez-nous pour plus de détails sur nos showrooms</p>
                <a href="{{ route('contact') }}" class="bg-yellow-600 text-white px-8 py-3 rounded-full hover:bg-yellow-700 transition duration-300">
                    Nous contacter
                </a>
            </div>
        </div>
    </div>

    @include('layouts.footer')
</body>
</html>