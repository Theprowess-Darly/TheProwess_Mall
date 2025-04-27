<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comment Acheter - TheProwess Mall</title>
    @vite(['resources/css/app.css'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-50">
    @include('layouts.header')

    <div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8">
        <!-- Hero Section -->
        <div class="bg-teal-950 text-white py-16 rounded-lg mb-12">
            <div class="container mx-auto text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Comment Acheter sur TPM</h1>
                <p class="text-lg text-gray-300 max-w-2xl mx-auto">Guide simple pour faire vos achats en toute confiance</p>
            </div>
        </div>

        <!-- Main Content -->
        <div class="container mx-auto max-w-6xl">
            <!-- Steps Section -->
            <div class="space-y-12 mb-16">
                <!-- Step 1 -->
                <div class="bg-white p-8 rounded-lg shadow-lg md:flex items-center gap-8">
                    <div class="md:w-1/3 mb-6 md:mb-0">
                        <div class="bg-yellow-100 p-6 rounded-lg text-center">
                            <i class="fas fa-user-plus text-yellow-600 text-5xl mb-4"></i>
                            <h3 class="text-xl font-semibold text-teal-950">1. Créez votre compte</h3>
                        </div>
                    </div>
                    <div class="md:w-2/3">
                        <p class="text-gray-600 mb-4">Inscrivez-vous gratuitement en quelques étapes simples :</p>
                        <ul class="space-y-2 text-gray-600">
                            <li><i class="fas fa-check text-yellow-600 mr-2"></i> Cliquez sur "Inscription"</li>
                            <li><i class="fas fa-check text-yellow-600 mr-2"></i> Remplissez vos informations personnelles</li>
                            <li><i class="fas fa-check text-yellow-600 mr-2"></i> Vérifiez votre email</li>
                        </ul>
                    </div>
                </div>

                <!-- Step 2 -->
                <div class="bg-white p-8 rounded-lg shadow-lg md:flex items-center gap-8">
                    <div class="md:w-1/3 mb-6 md:mb-0">
                        <div class="bg-yellow-100 p-6 rounded-lg text-center">
                            <i class="fas fa-search text-yellow-600 text-5xl mb-4"></i>
                            <h3 class="text-xl font-semibold text-teal-950">2. Trouvez vos produits</h3>
                        </div>
                    </div>
                    <div class="md:w-2/3">
                        <p class="text-gray-600 mb-4">Plusieurs façons de trouver ce que vous cherchez :</p>
                        <ul class="space-y-2 text-gray-600">
                            <li><i class="fas fa-check text-yellow-600 mr-2"></i> Utilisez la barre de recherche</li>
                            <li><i class="fas fa-check text-yellow-600 mr-2"></i> Parcourez les catégories</li>
                            <li><i class="fas fa-check text-yellow-600 mr-2"></i> Consultez nos recommandations personnalisées</li>
                        </ul>
                    </div>
                </div>

                <!-- Step 3 -->
                <div class="bg-white p-8 rounded-lg shadow-lg md:flex items-center gap-8">
                    <div class="md:w-1/3 mb-6 md:mb-0">
                        <div class="bg-yellow-100 p-6 rounded-lg text-center">
                            <i class="fas fa-shopping-cart text-yellow-600 text-5xl mb-4"></i>
                            <h3 class="text-xl font-semibold text-teal-950">3. Ajoutez au panier</h3>
                        </div>
                    </div>
                    <div class="md:w-2/3">
                        <p class="text-gray-600 mb-4">Gérez facilement votre panier :</p>
                        <ul class="space-y-2 text-gray-600">
                            <li><i class="fas fa-check text-yellow-600 mr-2"></i> Sélectionnez la quantité désirée</li>
                            <li><i class="fas fa-check text-yellow-600 mr-2"></i> Choisissez vos options (taille, couleur, etc.)</li>
                            <li><i class="fas fa-check text-yellow-600 mr-2"></i> Vérifiez la disponibilité</li>
                        </ul>
                    </div>
                </div>

                <!-- Step 4 -->
                <div class="bg-white p-8 rounded-lg shadow-lg md:flex items-center gap-8">
                    <div class="md:w-1/3 mb-6 md:mb-0">
                        <div class="bg-yellow-100 p-6 rounded-lg text-center">
                            <i class="fas fa-credit-card text-yellow-600 text-5xl mb-4"></i>
                            <h3 class="text-xl font-semibold text-teal-950">4. Passez la commande</h3>
                        </div>
                    </div>
                    <div class="md:w-2/3">
                        <p class="text-gray-600 mb-4">Finalisez votre achat en toute sécurité :</p>
                        <ul class="space-y-2 text-gray-600">
                            <li><i class="fas fa-check text-yellow-600 mr-2"></i> Choisissez votre mode de livraison</li>
                            <li><i class="fas fa-check text-yellow-600 mr-2"></i> Sélectionnez votre moyen de paiement</li>
                            <li><i class="fas fa-check text-yellow-600 mr-2"></i> Confirmez votre commande</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Payment Methods -->
            <div class="bg-white p-8 rounded-lg shadow-lg mb-16">
                <h2 class="text-2xl font-bold text-teal-950 mb-8 text-center">Moyens de Paiement Acceptés</h2>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
                    <div class="p-4">
                        <i class="fab fa-cc-visa text-4xl text-gray-600 mb-2"></i>
                        <p>Visa</p>
                    </div>
                    <div class="p-4">
                        <i class="fas fa-money-bill-wave text-4xl text-gray-600 mb-2"></i>
                        <p>Mobile Money</p>
                    </div>
                    <div class="p-4">
                        <i class="fas fa-wallet text-4xl text-gray-600 mb-2"></i>
                        <p>Orange Money</p>
                    </div>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="bg-white p-8 rounded-lg shadow-lg mb-16">
                <h2 class="text-2xl font-bold text-teal-950 mb-8 text-center">Questions Fréquentes</h2>
                <div class="space-y-4">
                    <div class="border-b pb-4">
                        <h3 class="font-semibold text-teal-950 mb-2">Comment suivre ma commande ?</h3>
                        <p class="text-gray-600">Connectez-vous à votre compte et accédez à la section "Mes commandes" pour suivre votre colis en temps réel.</p>
                    </div>
                    <div class="border-b pb-4">
                        <h3 class="font-semibold text-teal-950 mb-2">Que faire si je ne reçois pas mon colis ?</h3>
                        <p class="text-gray-600">Contactez notre service client qui vous assistera dans les plus brefs délais.</p>
                    </div>
                    <div class="border-b pb-4">
                        <h3 class="font-semibold text-teal-950 mb-2">Puis-je modifier ma commande ?</h3>
                        <p class="text-gray-600">Vous pouvez modifier votre commande tant qu'elle n'a pas été expédiée.</p>
                    </div>
                </div>
            </div>

            <!-- Need Help Section -->
            <div class="bg-teal-950 text-white p-8 rounded-lg text-center">
                <h2 class="text-2xl font-bold mb-4">Besoin d'aide ?</h2>
                <p class="mb-6">Notre équipe est là pour vous accompagner dans vos achats</p>
                <div class="flex justify-center space-x-4">
                    <a href="{{ route('contact') }}" class="bg-yellow-600 text-white px-6 py-2 rounded-full hover:bg-yellow-700 transition duration-300">
                        <i class="fas fa-headset mr-2"></i>Contacter le support
                    </a>
                    <!-- <a href="{{ route('how-to-shop') }}" class="border-2 border-white text-white px-6 py-2 rounded-full hover:bg-white hover:text-teal-950 transition duration-300">
                        <i class="fas fa-book mr-2"></i>Consulter le guide
                    </a> -->
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footer')
</body>
</html>