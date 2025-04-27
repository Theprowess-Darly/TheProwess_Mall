<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>À propos des Commandes - TheProwess Mall</title>
    @vite(['resources/css/app.css'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-50">
    @include('layouts.header')

    <div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8">
        <!-- Hero Section -->
        <div class="bg-teal-950 text-white py-16 rounded-lg mb-12">
            <div class="container mx-auto text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">À propos des Commandes</h1>
                <p class="text-lg text-gray-300 max-w-2xl mx-auto">Guide complet pour gérer vos commandes sur TPM</p>
            </div>
        </div>

        <!-- Main Content -->
        <div class="container mx-auto max-w-6xl">
            <!-- Order Process -->
            <div class="bg-white p-8 rounded-lg shadow-lg mb-12">
                <h2 class="text-2xl font-bold text-teal-950 mb-8">Processus de Commande</h2>
                <div class="grid md:grid-cols-4 gap-8">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-shopping-cart text-yellow-600 text-2xl"></i>
                        </div>
                        <h3 class="font-semibold text-teal-950 mb-2">Panier</h3>
                        <p class="text-gray-600">Ajoutez vos articles</p>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-credit-card text-yellow-600 text-2xl"></i>
                        </div>
                        <h3 class="font-semibold text-teal-950 mb-2">Paiement</h3>
                        <p class="text-gray-600">Choisissez votre mode de paiement</p>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-check-circle text-yellow-600 text-2xl"></i>
                        </div>
                        <h3 class="font-semibold text-teal-950 mb-2">Confirmation</h3>
                        <p class="text-gray-600">Validez votre commande</p>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-box text-yellow-600 text-2xl"></i>
                        </div>
                        <h3 class="font-semibold text-teal-950 mb-2">Expédition</h3>
                        <p class="text-gray-600">Suivi de votre commande</p>
                    </div>
                </div>
            </div>

            <!-- Order Management -->
            <div class="grid md:grid-cols-2 gap-8 mb-12">
                <div class="bg-white p-8 rounded-lg shadow-lg">
                    <h2 class="text-2xl font-bold text-teal-950 mb-6">Gérer vos Commandes</h2>
                    <div class="space-y-4">
                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-yellow-100 rounded-full flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-history text-yellow-600"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-teal-950 mb-2">Historique des Commandes</h3>
                                <p class="text-gray-600">Consultez toutes vos commandes passées</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-yellow-100 rounded-full flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-edit text-yellow-600"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-teal-950 mb-2">Modifier une Commande</h3>
                                <p class="text-gray-600">Possibilité de modification avant expédition</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-8 rounded-lg shadow-lg">
                    <h2 class="text-2xl font-bold text-teal-950 mb-6">Statuts de Commande</h2>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                            <span class="font-semibold text-teal-950">En attente</span>
                            <span class="bg-yellow-100 text-yellow-600 px-3 py-1 rounded-full text-sm">Paiement en cours</span>
                        </div>
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                            <span class="font-semibold text-teal-950">Confirmée</span>
                            <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-sm">Paiement validé</span>
                        </div>
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                            <span class="font-semibold text-teal-950">En préparation</span>
                            <span class="bg-blue-100 text-blue-600 px-3 py-1 rounded-full text-sm">En cours</span>
                        </div>
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                            <span class="font-semibold text-teal-950">Expédiée</span>
                            <span class="bg-purple-100 text-purple-600 px-3 py-1 rounded-full text-sm">En livraison</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Order Tracking -->
            <div class="bg-white p-8 rounded-lg shadow-lg mb-12">
                <h2 class="text-2xl font-bold text-teal-950 mb-6">Suivi de Commande</h2>
                <div class="space-y-6">
                    <p class="text-gray-600">Suivez l'état de votre commande en temps réel :</p>
                    <div class="relative">
                        <div class="absolute left-8 top-0 h-full w-1 bg-yellow-100"></div>
                        <div class="space-y-8 relative">
                            <div class="flex items-center">
                                <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center z-10">
                                    <i class="fas fa-check text-yellow-600 text-xl"></i>
                                </div>
                                <div class="ml-4">
                                    <h3 class="font-semibold text-teal-950">Commande reçue</h3>
                                    <p class="text-gray-600">Votre commande a été enregistrée</p>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center z-10">
                                    <i class="fas fa-box text-yellow-600 text-xl"></i>
                                </div>
                                <div class="ml-4">
                                    <h3 class="font-semibold text-teal-950">En préparation</h3>
                                    <p class="text-gray-600">Votre commande est en cours de préparation</p>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center z-10">
                                    <i class="fas fa-truck text-yellow-600 text-xl"></i>
                                </div>
                                <div class="ml-4">
                                    <h3 class="font-semibold text-teal-950">En livraison</h3>
                                    <p class="text-gray-600">Votre commande est en route</p>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center z-10">
                                    <i class="fas fa-home text-yellow-600 text-xl"></i>
                                </div>
                                <div class="ml-4">
                                    <h3 class="font-semibold text-teal-950">Livrée</h3>
                                    <p class="text-gray-600">Votre commande a été livrée</p>
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
                        <h3 class="font-semibold text-teal-950 mb-2">Comment annuler une commande ?</h3>
                        <p class="text-gray-600">Vous pouvez annuler votre commande dans l'heure qui suit le passage de celle-ci via votre espace client.</p>
                    </div>
                    <div class="border-b pb-4">
                        <h3 class="font-semibold text-teal-950 mb-2">Puis-je modifier mon adresse de livraison ?</h3>
                        <p class="text-gray-600">Oui, tant que votre commande n'a pas été expédiée. Contactez notre service client.</p>
                    </div>
                    <div class="border-b pb-4">
                        <h3 class="font-semibold text-teal-950 mb-2">Comment suivre ma commande ?</h3>
                        <p class="text-gray-600">Connectez-vous à votre compte et accédez à la section "Mes commandes" pour suivre votre colis.</p>
                    </div>
                </div>
            </div>

            <!-- Contact Section -->
            <div class="bg-teal-950 text-white p-8 rounded-lg text-center">
                <h2 class="text-2xl font-bold mb-4">Besoin d'aide avec votre commande ?</h2>
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