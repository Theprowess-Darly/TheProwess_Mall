<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>À propos des Paiements - TheProwess Mall</title>
    @vite(['resources/css/app.css'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-50">
    @include('layouts.header')

    <div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8">
        <!-- Hero Section -->
        <div class="bg-teal-950 text-white py-16 rounded-lg mb-12">
            <div class="container mx-auto text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">À propos des Paiements</h1>
                <p class="text-lg text-gray-300 max-w-2xl mx-auto">Des solutions de paiement sécurisées et adaptées à vos besoins</p>
            </div>
        </div>

        <!-- Main Content -->
        <div class="container mx-auto max-w-6xl">
            <!-- Payment Methods -->
            <div class="grid md:grid-cols-3 gap-8 mb-12">
                <div class="bg-white p-8 rounded-lg shadow-lg text-center">
                    <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-mobile-alt text-yellow-600 text-2xl"></i>
                    </div>
                    <h2 class="text-xl font-bold text-teal-950 mb-4">Mobile Money</h2>
                    <ul class="space-y-2 text-gray-600">
                        <li>Orange Money</li>
                        <li>MTN Mobile Money</li>
                        <li>Frais : 1.5%</li>
                        <li>Instantané</li>
                    </ul>
                </div>

                <div class="bg-white p-8 rounded-lg shadow-lg text-center">
                    <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-credit-card text-yellow-600 text-2xl"></i>
                    </div>
                    <h2 class="text-xl font-bold text-teal-950 mb-4">Carte Bancaire</h2>
                    <ul class="space-y-2 text-gray-600">
                        <li>Visa</li>
                        <li>Mastercard</li>
                        <li>Frais : 2%</li>
                        <li>Sécurisé</li>
                    </ul>
                </div>

                <div class="bg-white p-8 rounded-lg shadow-lg text-center">
                    <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-money-bill-wave text-yellow-600 text-2xl"></i>
                    </div>
                    <h2 class="text-xl font-bold text-teal-950 mb-4">Paiement à la livraison</h2>
                    <ul class="space-y-2 text-gray-600">
                        <li>Espèces</li>
                        <li>Mobile Money</li>
                        <li>Sans frais supplémentaires</li>
                        <li>Pratique</li>
                    </ul>
                </div>
            </div>

            <!-- Security Section -->
            <div class="bg-white p-8 rounded-lg shadow-lg mb-12">
                <h2 class="text-2xl font-bold text-teal-950 mb-6">Sécurité des Paiements</h2>
                <div class="grid md:grid-cols-2 gap-8">
                    <div>
                        <h3 class="font-semibold text-teal-950 mb-4">Nos Mesures de Sécurité</h3>
                        <ul class="space-y-3">
                            <li class="flex items-start">
                                <i class="fas fa-shield-alt text-yellow-600 mt-1 mr-3"></i>
                                <span class="text-gray-600">Cryptage SSL 256-bits</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-lock text-yellow-600 mt-1 mr-3"></i>
                                <span class="text-gray-600">Authentification à deux facteurs</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-user-shield text-yellow-600 mt-1 mr-3"></i>
                                <span class="text-gray-600">Protection contre la fraude</span>
                            </li>
                        </ul>
                    </div>
                    <div class="bg-gray-50 p-6 rounded-lg">
                        <h3 class="font-semibold text-teal-950 mb-4">Certifications</h3>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="flex items-center justify-center p-4 bg-white rounded-lg">
                                <i class="fas fa-check-circle text-green-500 text-3xl"></i>
                            </div>
                            <div class="flex items-center justify-center p-4 bg-white rounded-lg">
                                <i class="fas fa-lock text-yellow-600 text-3xl"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Payment Process -->
            <div class="bg-white p-8 rounded-lg shadow-lg mb-12">
                <h2 class="text-2xl font-bold text-teal-950 mb-6">Processus de Paiement</h2>
                <div class="relative">
                    <div class="absolute left-8 top-0 h-full w-1 bg-yellow-100"></div>
                    <div class="space-y-8 relative">
                        <div class="flex items-center">
                            <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center z-10">
                                <i class="fas fa-shopping-cart text-yellow-600 text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <h3 class="font-semibold text-teal-950">Panier</h3>
                                <p class="text-gray-600">Vérifiez votre panier et procédez au paiement</p>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center z-10">
                                <i class="fas fa-credit-card text-yellow-600 text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <h3 class="font-semibold text-teal-950">Choix du paiement</h3>
                                <p class="text-gray-600">Sélectionnez votre mode de paiement préféré</p>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center z-10">
                                <i class="fas fa-shield-alt text-yellow-600 text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <h3 class="font-semibold text-teal-950">Sécurisation</h3>
                                <p class="text-gray-600">Transaction sécurisée et vérifiée</p>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center z-10">
                                <i class="fas fa-check-circle text-yellow-600 text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <h3 class="font-semibold text-teal-950">Confirmation</h3>
                                <p class="text-gray-600">Confirmation de paiement et reçu</p>
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
                        <h3 class="font-semibold text-teal-950 mb-2">Mon paiement est-il sécurisé ?</h3>
                        <p class="text-gray-600">Oui, tous nos paiements sont cryptés et sécurisés selon les normes internationales.</p>
                    </div>
                    <div class="border-b pb-4">
                        <h3 class="font-semibold text-teal-950 mb-2">Quels sont les délais de remboursement ?</h3>
                        <p class="text-gray-600">Les remboursements sont traités sous 3-5 jours ouvrables après validation.</p>
                    </div>
                    <div class="border-b pb-4">
                        <h3 class="font-semibold text-teal-950 mb-2">Puis-je payer en plusieurs fois ?</h3>
                        <p class="text-gray-600">Cette option n'est pas encore disponible mais sera bientôt mise en place.</p>
                    </div>
                </div>
            </div>

            <!-- Contact Section -->
            <div class="bg-teal-950 text-white p-8 rounded-lg text-center">
                <h2 class="text-2xl font-bold mb-4">Des questions sur les paiements ?</h2>
                <p class="mb-6">Notre équipe est là pour vous aider avec vos transactions</p>
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