<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>À propos des Livraisons - TheProwess Mall</title>
    @vite(['resources/css/app.css'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-50">
    @include('layouts.header')

    <div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8">
        <!-- Hero Section -->
        <div class="bg-teal-950 text-white py-16 rounded-lg mb-12">
            <div class="container mx-auto text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">À propos des Livraisons</h1>
                <p class="text-lg text-gray-300 max-w-2xl mx-auto">Tout ce que vous devez savoir sur nos services de livraison</p>
            </div>
        </div>

        <!-- Main Content -->
        <div class="container mx-auto max-w-6xl">
            <!-- Delivery Process -->
            <div class="bg-white p-8 rounded-lg shadow-lg mb-12">
                <h2 class="text-2xl font-bold text-teal-950 mb-8">Notre Processus de Livraison</h2>
                <div class="grid md:grid-cols-4 gap-8">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-box text-yellow-600 text-2xl"></i>
                        </div>
                        <h3 class="font-semibold text-teal-950 mb-2">Préparation</h3>
                        <p class="text-gray-600">Emballage soigné de votre commande</p>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-warehouse text-yellow-600 text-2xl"></i>
                        </div>
                        <h3 class="font-semibold text-teal-950 mb-2">Expédition</h3>
                        <p class="text-gray-600">Départ de notre entrepôt</p>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-truck text-yellow-600 text-2xl"></i>
                        </div>
                        <h3 class="font-semibold text-teal-950 mb-2">En Route</h3>
                        <p class="text-gray-600">Livraison en cours</p>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-home text-yellow-600 text-2xl"></i>
                        </div>
                        <h3 class="font-semibold text-teal-950 mb-2">Livraison</h3>
                        <p class="text-gray-600">Réception de votre colis</p>
                    </div>
                </div>
            </div>

            <!-- Delivery Options -->
            <div class="grid md:grid-cols-2 gap-8 mb-12">
                <div class="bg-white p-8 rounded-lg shadow-lg">
                    <h2 class="text-2xl font-bold text-teal-950 mb-6">Options de Livraison</h2>
                    <div class="space-y-4">
                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-yellow-100 rounded-full flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-bolt text-yellow-600"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-teal-950 mb-2">Livraison Express</h3>
                                <p class="text-gray-600">Livraison le jour même à Bafoussam</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-yellow-100 rounded-full flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-calendar text-yellow-600"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-teal-950 mb-2">Livraison Standard</h3>
                                <p class="text-gray-600">2-5 jours ouvrables selon la zone</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-8 rounded-lg shadow-lg">
                    <h2 class="text-2xl font-bold text-teal-950 mb-6">Suivi de Commande</h2>
                    <div class="space-y-4">
                        <p class="text-gray-600 mb-4">Suivez votre colis en temps réel grâce à notre système de tracking</p>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h3 class="font-semibold text-teal-950 mb-2">Comment suivre votre colis ?</h3>
                            <ol class="list-decimal list-inside space-y-2 text-gray-600">
                                <li>Connectez-vous à votre compte</li>
                                <li>Accédez à "Mes commandes"</li>
                                <li>Cliquez sur "Suivre ma commande"</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Delivery Zones -->
            <div class="bg-white p-8 rounded-lg shadow-lg mb-12">
                <h2 class="text-2xl font-bold text-teal-950 mb-6">Zones de Livraison</h2>
                <div class="grid md:grid-cols-3 gap-8">
                    <div class="text-center p-6 border rounded-lg">
                        <h3 class="font-semibold text-teal-950 mb-2">Zone 1: Bafoussam</h3>
                        <p class="text-gray-600">Livraison le jour même</p>
                        <p class="text-sm text-yellow-600 mt-2">À partir de 1000 FCFA</p>
                    </div>
                    <div class="text-center p-6 border rounded-lg">
                        <h3 class="font-semibold text-teal-950 mb-2">Zone 2: Région Ouest</h3>
                        <p class="text-gray-600">2-3 jours ouvrables</p>
                        <p class="text-sm text-yellow-600 mt-2">À partir de 2000 FCFA</p>
                    </div>
                    <div class="text-center p-6 border rounded-lg">
                        <h3 class="font-semibold text-teal-950 mb-2">Zone 3: National</h3>
                        <p class="text-gray-600">3-5 jours ouvrables</p>
                        <p class="text-sm text-yellow-600 mt-2">À partir de 3000 FCFA</p>
                    </div>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="bg-white p-8 rounded-lg shadow-lg mb-12">
                <h2 class="text-2xl font-bold text-teal-950 mb-6">Questions Fréquentes</h2>
                <div class="space-y-4">
                    <div class="border-b pb-4">
                        <h3 class="font-semibold text-teal-950 mb-2">Que faire si je ne suis pas là pour réceptionner mon colis ?</h3>
                        <p class="text-gray-600">Notre livreur vous contactera pour reprogrammer la livraison.</p>
                    </div>
                    <div class="border-b pb-4">
                        <h3 class="font-semibold text-teal-950 mb-2">Comment modifier mon adresse de livraison ?</h3>
                        <p class="text-gray-600">Contactez notre service client avant l'expédition de votre commande.</p>
                    </div>
                    <div class="border-b pb-4">
                        <h3 class="font-semibold text-teal-950 mb-2">La livraison est-elle gratuite ?</h3>
                        <p class="text-gray-600">La livraison est gratuite pour toute commande supérieure à 50,000 FCFA.</p>
                    </div>
                </div>
            </div>

            <!-- Contact Section -->
            <div class="bg-teal-950 text-white p-8 rounded-lg text-center">
                <h2 class="text-2xl font-bold mb-4">Besoin d'aide ?</h2>
                <p class="mb-6">Notre équipe est là pour répondre à vos questions sur la livraison</p>
                <div class="flex justify-center space-x-4">
                    <a href="{{ route('contact') }}" class="bg-yellow-600 text-white px-8 py-3 rounded-full hover:bg-yellow-700 transition duration-300">
                        Contactez-nous
                    </a>
                    <a href="{{ route('delivery-fees') }}" class="border-2 border-white text-white px-8 py-3 rounded-full hover:bg-white hover:text-teal-950 transition duration-300">
                        Voir les tarifs
                    </a>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footer')
</body>
</html>