<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>À propos des Frais - TheProwess Mall</title>
    @vite(['resources/css/app.css'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-50">
    @include('layouts.header')

    <div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8">
        <!-- Hero Section -->
        <div class="bg-teal-950 text-white py-16 rounded-lg mb-12">
            <div class="container mx-auto text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">À propos des Frais</h1>
                <p class="text-lg text-gray-300 max-w-2xl mx-auto">Comprendre les différents frais sur TheProwess Mall</p>
            </div>
        </div>

        <!-- Main Content -->
        <div class="container mx-auto max-w-6xl">
            <!-- Types of Fees -->
            <div class="grid md:grid-cols-3 gap-8 mb-12">
                <!-- Delivery Fees -->
                <div class="bg-white p-8 rounded-lg shadow-lg">
                    <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-truck text-yellow-600 text-2xl"></i>
                    </div>
                    <h2 class="text-xl font-bold text-teal-950 mb-4 text-center">Frais de Livraison</h2>
                    <ul class="space-y-3 text-gray-600">
                        <li class="flex items-center">
                            <i class="fas fa-check text-yellow-600 mr-2"></i>
                            <span>Basés sur la zone de livraison</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-yellow-600 mr-2"></i>
                            <span>Calculés selon le poids</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-yellow-600 mr-2"></i>
                            <span>Gratuits dès 50,000 FCFA</span>
                        </li>
                    </ul>
                </div>

                <!-- Service Fees -->
                <div class="bg-white p-8 rounded-lg shadow-lg">
                    <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-hand-holding-dollar text-yellow-600 text-2xl"></i>
                    </div>
                    <h2 class="text-xl font-bold text-teal-950 mb-4 text-center">Frais de Service</h2>
                    <ul class="space-y-3 text-gray-600">
                        <li class="flex items-center">
                            <i class="fas fa-check text-yellow-600 mr-2"></i>
                            <span>Commission sur les ventes</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-yellow-600 mr-2"></i>
                            <span>Frais de traitement</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-yellow-600 mr-2"></i>
                            <span>Services additionnels</span>
                        </li>
                    </ul>
                </div>

                <!-- Payment Fees -->
                <div class="bg-white p-8 rounded-lg shadow-lg">
                    <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-credit-card text-yellow-600 text-2xl"></i>
                    </div>
                    <h2 class="text-xl font-bold text-teal-950 mb-4 text-center">Frais de Paiement</h2>
                    <ul class="space-y-3 text-gray-600">
                        <li class="flex items-center">
                            <i class="fas fa-check text-yellow-600 mr-2"></i>
                            <span>Mobile Money (1.5%)</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-yellow-600 mr-2"></i>
                            <span>Orange Money (1.5%)</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-yellow-600 mr-2"></i>
                            <span>Carte bancaire (2%)</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Fee Calculator -->
            <div class="bg-white p-8 rounded-lg shadow-lg mb-12">
                <h2 class="text-2xl font-bold text-teal-950 mb-6">Calculateur de Frais</h2>
                <div class="grid md:grid-cols-2 gap-8">
                    <div>
                        <form class="space-y-4">
                            <div>
                                <label class="block text-gray-700 mb-2">Montant de la commande (FCFA)</label>
                                <input type="number" class="w-full px-4 py-2 rounded-lg border focus:outline-none focus:border-yellow-600">
                            </div>
                            <div>
                                <label class="block text-gray-700 mb-2">Zone de livraison</label>
                                <select class="w-full px-4 py-2 rounded-lg border focus:outline-none focus:border-yellow-600">
                                    <option>Bafoussam</option>
                                    <option>Région Ouest</option>
                                    <option>National</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-gray-700 mb-2">Poids total (kg)</label>
                                <input type="number" class="w-full px-4 py-2 rounded-lg border focus:outline-none focus:border-yellow-600">
                            </div>
                            <button type="submit" class="w-full bg-teal-950 text-white py-2 rounded-lg hover:bg-teal-900">
                                Calculer les frais
                            </button>
                        </form>
                    </div>
                    <div class="bg-gray-50 p-6 rounded-lg">
                        <h3 class="font-semibold text-teal-950 mb-4">Résumé des frais</h3>
                        <div class="space-y-2">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Frais de livraison</span>
                                <span class="font-semibold">0 FCFA</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Frais de service</span>
                                <span class="font-semibold">0 FCFA</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Frais de paiement</span>
                                <span class="font-semibold">0 FCFA</span>
                            </div>
                            <div class="border-t pt-2 mt-4">
                                <div class="flex justify-between font-bold text-teal-950">
                                    <span>Total des frais</span>
                                    <span>0 FCFA</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="bg-white p-8 rounded-lg shadow-lg mb-12">
                <h2 class="text-2xl font-bold text-teal-950 mb-6">Questions Fréquentes</h2>
                <div class="space-y-4">
                    <div class="border-b pb-4">
                        <h3 class="font-semibold text-teal-950 mb-2">Comment sont calculés les frais de livraison ?</h3>
                        <p class="text-gray-600">Les frais sont calculés en fonction de la zone de livraison et du poids total de la commande.</p>
                    </div>
                    <div class="border-b pb-4">
                        <h3 class="font-semibold text-teal-950 mb-2">Y a-t-il des frais cachés ?</h3>
                        <p class="text-gray-600">Non, tous les frais sont clairement indiqués avant la validation de votre commande.</p>
                    </div>
                    <div class="border-b pb-4">
                        <h3 class="font-semibold text-teal-950 mb-2">Comment éviter les frais de livraison ?</h3>
                        <p class="text-gray-600">La livraison est gratuite pour toute commande supérieure à 50,000 FCFA.</p>
                    </div>
                </div>
            </div>

            <!-- Contact Section -->
            <div class="bg-teal-950 text-white p-8 rounded-lg text-center">
                <h2 class="text-2xl font-bold mb-4">Des questions sur les frais ?</h2>
                <p class="mb-6">Notre équipe est là pour vous aider à comprendre tous les frais</p>
                <a href="{{ route('contact') }}" class="bg-yellow-600 text-white px-8 py-3 rounded-full hover:bg-yellow-700 transition duration-300">
                    Contactez-nous
                </a>
            </div>
        </div>
    </div>

    @include('layouts.footer')
</body>
</html>