<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Politique de Retour - TheProwess Mall</title>
    @vite(['resources/css/app.css'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-50">
    @include('layouts.header')

    <div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8">
        <!-- Hero Section -->
        <div class="bg-teal-950 text-white py-16 rounded-lg mb-12">
            <div class="container mx-auto text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Politique de Retour</h1>
                <p class="text-lg text-gray-300 max-w-2xl mx-auto">Une procédure simple et transparente pour votre tranquillité d'esprit</p>
            </div>
        </div>

        <!-- Main Content -->
        <div class="container mx-auto max-w-6xl">
            <!-- Quick Info Timeline -->
            <div class="relative flex flex-col items-center mb-12">
                <!-- Center Line -->
                <div class="absolute h-full w-1 bg-yellow-600 md:left-1/2 left-8"></div>

                <!-- First Point - Left -->
                <div class="relative flex w-full md:justify-end md:right-1/2 md:pr-8 pl-16 md:pl-0 mb-12">
                    <div class="absolute md:right-0 right-8 md:translate-x-1/2 -translate-x-1/2 bg-yellow-100 rounded-full p-2 z-10">
                        <i class="fas fa-clock text-yellow-600 text-xl"></i>
                    </div>
                    <div class="w-full md:w-5/12 bg-white p-4 rounded-lg shadow-md hover:scale-105 hover:bg-yellow-50 hover:border-yellow-600 hover:border transition-all duration-300">
                        <h3 class="text-lg font-semibold text-teal-950 mb-2">Délai de Retour</h3>
                        <p class="text-gray-600">7 jours ouvrés à partir de la date de livraison</p>
                    </div>
                </div>

                <!-- Second Point - Right -->
                <div class="relative flex w-full md:justify-start md:left-1/2 md:pl-8 pl-16 mb-12">
                    <div class="absolute md:left-0 left-8 md:-translate-x-1/2 -translate-x-1/2 bg-yellow-100 rounded-full p-2 z-10">
                        <i class="fas fa-sync text-yellow-600 text-xl"></i>
                    </div>
                    <div class="w-full md:w-5/12 bg-white p-4 rounded-lg shadow-md hover:scale-105 hover:bg-yellow-50 hover:border-yellow-600 hover:border transition-all duration-300">
                        <h3 class="text-lg font-semibold text-teal-950 mb-2">Remboursement Rapide</h3>
                        <p class="text-gray-600">3-5 jours ouvrés après validation</p>
                    </div>
                </div>

                <!-- Third Point - Left -->
                <div class="relative flex w-full md:justify-end md:right-1/2 md:pr-8 pl-16 md:pl-0">
                    <div class="absolute md:right-0 right-8 md:translate-x-1/2 -translate-x-1/2 bg-yellow-100 rounded-full p-2 z-10">
                        <i class="fas fa-shield-alt text-yellow-600 text-xl"></i>
                    </div>
                    <div class="w-full md:w-5/12 bg-white p-4 rounded-lg shadow-md hover:scale-105 hover:bg-yellow-50 hover:border-yellow-600 hover:border transition-all duration-300">
                        <h3 class="text-lg font-semibold text-teal-950 mb-2">Garantie Produit</h3>
                        <p class="text-gray-600">Selon les conditions spécifiques du produit</p>
                    </div>
                </div>
            </div>

            <!-- Main Sections -->
            <div class="space-y-8">
                <!-- Conditions Section -->
                <div class="bg-white rounded-lg shadow-lg p-8">
                    <h2 class="text-2xl font-bold text-teal-950 mb-6 flex items-center">
                        <i class="fas fa-clipboard-check text-yellow-600 mr-3"></i>
                        Conditions de Retour
                    </h2>
                    <div class="grid md:grid-cols-2 gap-8">
                        <div>
                            <h3 class="font-semibold text-teal-950 mb-4">Articles Éligibles</h3>
                            <ul class="space-y-3">
                                <li class="flex items-start">
                                    <i class="fas fa-check text-green-500 mt-1 mr-3"></i>
                                    <span class="text-gray-600">Produits dans leur état d'origine</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check text-green-500 mt-1 mr-3"></i>
                                    <span class="text-gray-600">Emballage intact avec accessoires</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check text-green-500 mt-1 mr-3"></i>
                                    <span class="text-gray-600">Articles défectueux ou non conformes</span>
                                </li>
                            </ul>
                        </div>
                        <div class="bg-red-50 p-6 rounded-lg">
                            <h3 class="font-semibold text-teal-950 mb-4">Articles Non Retournables</h3>
                            <ul class="space-y-3">
                                <li class="flex items-start">
                                    <i class="fas fa-times text-red-500 mt-1 mr-3"></i>
                                    <span class="text-gray-600">Produits d'hygiène personnelle</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-times text-red-500 mt-1 mr-3"></i>
                                    <span class="text-gray-600">Cosmétiques ouverts</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-times text-red-500 mt-1 mr-3"></i>
                                    <span class="text-gray-600">Accessoires électroniques utilisés</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Process Section -->
                <div class="bg-white rounded-lg shadow-lg p-8">
                    <h2 class="text-2xl font-bold text-teal-950 mb-6 flex items-center">
                        <i class="fas fa-tasks text-yellow-600 mr-3"></i>
                        Procédure de Retour
                    </h2>
                    <div class="grid md:grid-cols-3 gap-6">
                        <div class="text-center p-6 border rounded-lg hover:border-yellow-600 transition duration-300">
                            <div class="w-12 h-12 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <span class="text-yellow-600 font-bold">1</span>
                            </div>
                            <h3 class="font-semibold text-teal-950 mb-2">Initier le Retour</h3>
                            <p class="text-gray-600">Contactez notre service client via WhatsApp ou appelez-nous pour vérifier l'éligibilité de votre retour</p>
                        </div>
                        <div class="text-center p-6 border rounded-lg hover:border-yellow-600 transition duration-300">
                            <div class="w-12 h-12 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <span class="text-yellow-600 font-bold">2</span>
                            </div>
                            <h3 class="font-semibold text-teal-950 mb-2">Retourner le Produit</h3>
                            <p class="text-gray-600">Déposez l'article dans l'une de nos agences avec la facture et tous les accessoires d'origine</p>
                        </div>
                        <div class="text-center p-6 border rounded-lg hover:border-yellow-600 transition duration-300">
                            <div class="w-12 h-12 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <span class="text-yellow-600 font-bold">3</span>
                            </div>
                            <h3 class="font-semibold text-teal-950 mb-2">Traitement</h3>
                            <p class="text-gray-600">Remplacement sous 1-3 jours ou remboursement via Mobile Money sous 3-5 jours après vérification</p>
                        </div>
                    </div>
                </div>

                <!-- Contact Section -->
                <div class="bg-teal-950 text-white rounded-lg shadow-lg p-8 text-center">
                    <h2 class="text-2xl font-bold mb-4">Besoin d'assistance ?</h2>
                    <p class="mb-6">Notre équipe est disponible pour vous aider dans votre processus de retour</p>
                    <div class="flex justify-center space-x-6">
                        <a href="{{ route('contact') }}" class="bg-yellow-600 text-white px-6 py-3 rounded-full hover:bg-yellow-700 transition duration-300 flex items-center">
                            <i class="fas fa-headset mr-2"></i>
                            Service Client
                        </a>
                        <a href="https://wa.me/677968860" class="bg-green-600 text-white px-6 py-3 rounded-full hover:bg-green-700 transition duration-300 flex items-center">
                            <i class="fab fa-whatsapp mr-2"></i>
                            WhatsApp
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footer')
</body>
</html>