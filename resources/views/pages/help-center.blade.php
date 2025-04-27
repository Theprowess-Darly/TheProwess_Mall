<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centre d'Aide - TheProwess Mall</title>
    @vite(['resources/css/app.css'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-50">
    @include('layouts.header')

    <div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8">
        <!-- Hero Section -->
        <div class="bg-teal-950 text-white py-16 rounded-lg mb-12">
            <div class="container mx-auto text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Centre d'Aide</h1>
                <p class="text-lg text-gray-300 max-w-2xl mx-auto">Comment pouvons-nous vous aider aujourd'hui ?</p>
                <!-- Search Bar -->
                <div class="max-w-2xl mx-auto mt-8">
                    <div class="relative">
                        <input type="text" placeholder="Rechercher une aide..." class="w-full px-6 py-3 rounded-full text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-600">
                        <button class="absolute right-4 top-3 text-gray-500">
                            <i class="fas fa-search text-xl"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="container mx-auto max-w-7xl">
            <!-- Quick Links -->
            <div class="grid md:grid-cols-4 gap-6 mb-16">
                <a href="#commandes" class="bg-white p-6 rounded-lg shadow-lg text-center hover:transform hover:scale-105 transition duration-300">
                    <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-box text-yellow-600 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-teal-950">Commandes</h3>
                </a>
                <a href="#livraison" class="bg-white p-6 rounded-lg shadow-lg text-center hover:transform hover:scale-105 transition duration-300">
                    <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-truck text-yellow-600 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-teal-950">Livraison</h3>
                </a>
                <a href="#paiement" class="bg-white p-6 rounded-lg shadow-lg text-center hover:transform hover:scale-105 transition duration-300">
                    <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-credit-card text-yellow-600 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-teal-950">Paiement</h3>
                </a>
                <a href="#retours" class="bg-white p-6 rounded-lg shadow-lg text-center hover:transform hover:scale-105 transition duration-300">
                    <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-undo text-yellow-600 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-teal-950">Retours</h3>
                </a>
            </div>

            <!-- FAQ Sections -->
            <div class="space-y-12">
                <!-- Commandes Section -->
                <section id="commandes" class="bg-white p-8 rounded-lg shadow-lg">
                    <h2 class="text-2xl font-bold text-teal-950 mb-6">Questions sur les Commandes</h2>
                    <div class="space-y-4">
                        <div class="border-b pb-4">
                            <button class="flex justify-between items-center w-full text-left">
                                <h3 class="font-semibold text-teal-950">Comment suivre ma commande ?</h3>
                                <i class="fas fa-chevron-down text-yellow-600"></i>
                            </button>
                            <div class="mt-2 text-gray-600">
                                Connectez-vous à votre compte et accédez à "Mes commandes" pour suivre vos colis en temps réel.
                            </div>
                        </div>
                        <div class="border-b pb-4">
                            <button class="flex justify-between items-center w-full text-left">
                                <h3 class="font-semibold text-teal-950">Comment modifier ma commande ?</h3>
                                <i class="fas fa-chevron-down text-yellow-600"></i>
                            </button>
                            <div class="mt-2 text-gray-600">
                                Vous pouvez modifier votre commande dans l'heure qui suit le passage de celle-ci.
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Livraison Section -->
                <section id="livraison" class="bg-white p-8 rounded-lg shadow-lg">
                    <h2 class="text-2xl font-bold text-teal-950 mb-6">Questions sur la Livraison</h2>
                    <div class="space-y-4">
                        <div class="border-b pb-4">
                            <button class="flex justify-between items-center w-full text-left">
                                <h3 class="font-semibold text-teal-950">Quels sont les délais de livraison ?</h3>
                                <i class="fas fa-chevron-down text-yellow-600"></i>
                            </button>
                            <div class="mt-2 text-gray-600">
                                Les délais varient selon votre zone : 24h pour Bafoussam, 2-3 jours pour la région Ouest, 3-5 jours pour le reste du pays.
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Paiement Section -->
                <section id="paiement" class="bg-white p-8 rounded-lg shadow-lg">
                    <h2 class="text-2xl font-bold text-teal-950 mb-6">Questions sur le Paiement</h2>
                    <div class="space-y-4">
                        <div class="border-b pb-4">
                            <button class="flex justify-between items-center w-full text-left">
                                <h3 class="font-semibold text-teal-950">Quels moyens de paiement acceptez-vous ?</h3>
                                <i class="fas fa-chevron-down text-yellow-600"></i>
                            </button>
                            <div class="mt-2 text-gray-600">
                                Nous acceptons Mobile Money, Orange Money, les cartes bancaires et le paiement à la livraison.
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Retours Section -->
                <section id="retours" class="bg-white p-8 rounded-lg shadow-lg">
                    <h2 class="text-2xl font-bold text-teal-950 mb-6">Questions sur les Retours</h2>
                    <div class="space-y-4">
                        <div class="border-b pb-4">
                            <button class="flex justify-between items-center w-full text-left">
                                <h3 class="font-semibold text-teal-950">Comment retourner un article ?</h3>
                                <i class="fas fa-chevron-down text-yellow-600"></i>
                            </button>
                            <div class="mt-2 text-gray-600">
                                Vous disposez de 14 jours pour retourner un article. Contactez notre service client pour initier le retour.
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <!-- Contact Support -->
            <div class="mt-12 bg-teal-950 text-white p-8 rounded-lg text-center">
                <h2 class="text-2xl font-bold mb-4">Vous n'avez pas trouvé votre réponse ?</h2>
                <p class="mb-6">Notre équipe de support est disponible 24/7 pour vous aider</p>
                <div class="flex justify-center space-x-4">
                    <a href="{{ route('contact') }}" class="bg-yellow-600 text-white px-6 py-3 rounded-full hover:bg-yellow-700 transition duration-300">
                        <i class="fas fa-headset mr-2"></i>Contacter le support
                    </a>
                    <a href="https://wa.me/677968860" class="border-2 border-white text-white px-6 py-3 rounded-full hover:bg-white hover:text-teal-950 transition duration-300">
                        <i class="fas fa-comments mr-2"></i>Chat en direct
                    </a>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footer')
</body>
</html>