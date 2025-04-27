<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles et Stocks - TheProwess Mall</title>
    @vite(['resources/css/app.css'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-50">
    @include('layouts.header')

    <div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8">
        <!-- Hero Section -->
        <div class="bg-teal-950 text-white py-16 rounded-lg mb-12">
            <div class="container mx-auto text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Articles et Stocks</h1>
                <p class="text-lg text-gray-300 max-w-2xl mx-auto">Tout savoir sur nos produits et leur disponibilité</p>
            </div>
        </div>

        <!-- Main Content -->
        <div class="container mx-auto max-w-6xl">
            <!-- Stock Status -->
            <div class="grid md:grid-cols-3 gap-8 mb-12">
                <div class="bg-white p-8 rounded-lg shadow-lg text-center">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-check text-green-600 text-2xl"></i>
                    </div>
                    <h2 class="text-xl font-bold text-teal-950 mb-4">En Stock</h2>
                    <p class="text-gray-600">Articles disponibles pour livraison immédiate</p>
                </div>

                <div class="bg-white p-8 rounded-lg shadow-lg text-center">
                    <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-clock text-yellow-600 text-2xl"></i>
                    </div>
                    <h2 class="text-xl font-bold text-teal-950 mb-4">Stock Limité</h2>
                    <p class="text-gray-600">Dernières pièces disponibles</p>
                </div>

                <div class="bg-white p-8 rounded-lg shadow-lg text-center">
                    <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-times text-red-600 text-2xl"></i>
                    </div>
                    <h2 class="text-xl font-bold text-teal-950 mb-4">Rupture de Stock</h2>
                    <p class="text-gray-600">Temporairement indisponible</p>
                </div>
            </div>

            <!-- Stock Management -->
            <div class="bg-white p-8 rounded-lg shadow-lg mb-12">
                <h2 class="text-2xl font-bold text-teal-950 mb-6">Gestion des Stocks</h2>
                <div class="grid md:grid-cols-2 gap-8">
                    <div>
                        <h3 class="font-semibold text-teal-950 mb-4">Notre Système</h3>
                        <ul class="space-y-3">
                            <li class="flex items-start">
                                <i class="fas fa-sync text-yellow-600 mt-1 mr-3"></i>
                                <span class="text-gray-600">Mise à jour en temps réel</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-warehouse text-yellow-600 mt-1 mr-3"></i>
                                <span class="text-gray-600">Gestion multi-entrepôts</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-bell text-yellow-600 mt-1 mr-3"></i>
                                <span class="text-gray-600">Alertes de stock bas</span>
                            </li>
                        </ul>
                    </div>
                    <div class="bg-gray-50 p-6 rounded-lg">
                        <h3 class="font-semibold text-teal-950 mb-4">Avantages</h3>
                        <ul class="space-y-3">
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                                <span class="text-gray-600">Disponibilité garantie</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                                <span class="text-gray-600">Livraison rapide</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                                <span class="text-gray-600">Qualité assurée</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Product Categories -->
            <div class="bg-white p-8 rounded-lg shadow-lg mb-12">
                <h2 class="text-2xl font-bold text-teal-950 mb-6">Catégories de Produits</h2>
                <div class="grid md:grid-cols-4 gap-4">
                    <div class="p-4 border rounded-lg text-center">
                        <i class="fas fa-tshirt text-yellow-600 text-2xl mb-2"></i>
                        <h3 class="font-semibold text-teal-950">Mode</h3>
                    </div>
                    <div class="p-4 border rounded-lg text-center">
                        <i class="fas fa-mobile-alt text-yellow-600 text-2xl mb-2"></i>
                        <h3 class="font-semibold text-teal-950">Électronique</h3>
                    </div>
                    <div class="p-4 border rounded-lg text-center">
                        <i class="fas fa-couch text-yellow-600 text-2xl mb-2"></i>
                        <h3 class="font-semibold text-teal-950">Maison</h3>
                    </div>
                    <div class="p-4 border rounded-lg text-center">
                        <i class="fas fa-futbol text-yellow-600 text-2xl mb-2"></i>
                        <h3 class="font-semibold text-teal-950">Sport</h3>
                    </div>
                </div>
            </div>

            <!-- Stock Alerts -->
            <div class="bg-white p-8 rounded-lg shadow-lg mb-12">
                <h2 class="text-2xl font-bold text-teal-950 mb-6">Alertes Stock</h2>
                <div class="space-y-4">
                    <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                        <div class="flex items-center">
                            <i class="fas fa-bell text-yellow-600 mr-3"></i>
                            <span class="text-gray-600">Recevez des notifications quand un article est de nouveau disponible</span>
                        </div>
                        <button class="bg-teal-950 text-white px-4 py-2 rounded-lg hover:bg-teal-900">
                            Activer les alertes
                        </button>
                    </div>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="bg-white p-8 rounded-lg shadow-lg mb-12">
                <h2 class="text-2xl font-bold text-teal-950 mb-6">Questions Fréquentes</h2>
                <div class="space-y-4">
                    <div class="border-b pb-4">
                        <h3 class="font-semibold text-teal-950 mb-2">Comment savoir si un article est disponible ?</h3>
                        <p class="text-gray-600">Le statut de stock est affiché en temps réel sur la page de chaque produit.</p>
                    </div>
                    <div class="border-b pb-4">
                        <h3 class="font-semibold text-teal-950 mb-2">Que faire si un article est en rupture ?</h3>
                        <p class="text-gray-600">Activez les alertes pour être notifié dès qu'il est de nouveau disponible.</p>
                    </div>
                    <div class="border-b pb-4">
                        <h3 class="font-semibold text-teal-950 mb-2">Les stocks sont-ils garantis ?</h3>
                        <p class="text-gray-600">Oui, notre système de gestion des stocks est mis à jour en temps réel.</p>
                    </div>
                </div>
            </div>

            <!-- Contact Section -->
            <div class="bg-teal-950 text-white p-8 rounded-lg text-center">
                <h2 class="text-2xl font-bold mb-4">Une question sur nos articles ?</h2>
                <p class="mb-6">Notre équipe est là pour vous aider</p>
                <div class="flex justify-center space-x-4">
                    <a href="{{ route('contact') }}" class="bg-yellow-600 text-white px-8 py-3 rounded-full hover:bg-yellow-700 transition duration-300">
                        Contactez-nous
                    </a>
                    <a href="{{ route('help-center') }}" class="border-2 border-white text-white px-8 py-3 rounded-full hover:bg-white hover:text-teal-950 transition duration-300">
                        Centre d'aide
                    </a>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footer')
</body>
</html>