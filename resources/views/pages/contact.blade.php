<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactez-nous - TheProwess Mall</title>
    @vite(['resources/css/app.css'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-50">
    @include('layouts.header')

    <div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8">
        <!-- Hero Section -->
        <div class="bg-teal-950 text-white py-16 rounded-lg mb-12">
            <div class="container mx-auto text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Contactez-nous</h1>
                <p class="text-lg text-gray-300 max-w-2xl mx-auto">Notre équipe est là pour vous aider</p>
            </div>
        </div>

        <!-- Main Content -->
        <div class="container mx-auto max-w-7xl">
            <!-- Contact Methods Grid -->
            <div class="grid md:grid-cols-3 gap-8 mb-16">
                <!-- Phone -->
                <div class="bg-white p-8 rounded-lg shadow-lg text-center">
                    <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-phone text-yellow-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-teal-950 mb-4">Par Téléphone</h3>
                    <p class="text-gray-600 mb-4">Du lundi au samedi, 8h-18h</p>
                    <a href="tel:+237674481692" class="text-yellow-600 font-semibold">+237 674 481 692</a>
                </div>

                <!-- Email -->
                <div class="bg-white p-8 rounded-lg shadow-lg text-center">
                    <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-envelope text-yellow-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-teal-950 mb-4">Par Email</h3>
                    <p class="text-gray-600 mb-4">Réponse sous 24h</p>
                    <a href="mailto:contact@theprowessmall.com" class="text-yellow-600 font-semibold">contact@theprowessmall.com</a>
                </div>

                <!-- Social Media -->
                <div class="bg-white p-8 rounded-lg shadow-lg text-center">
                    <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-comments text-yellow-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-teal-950 mb-4">Réseaux Sociaux</h3>
                    <p class="text-gray-600 mb-4">Suivez-nous et contactez-nous</p>
                    <div class="flex justify-center space-x-4">
                        <a href="#" class="text-gray-600 hover:text-yellow-600"><i class="fab fa-facebook text-xl"></i></a>
                        <a href="#" class="text-gray-600 hover:text-yellow-600"><i class="fab fa-twitter text-xl"></i></a>
                        <a href="#" class="text-gray-600 hover:text-yellow-600"><i class="fab fa-instagram text-xl"></i></a>
                    </div>
                </div>
            </div>

            <!-- Contact Form Section -->
            <div class="grid md:grid-cols-2 gap-12 mb-16">
                <div class="bg-white p-8 rounded-lg shadow-lg">
                    <h2 class="text-2xl font-bold text-teal-950 mb-6">Envoyez-nous un message</h2>
                    <form class="space-y-6">
                        <div>
                            <label class="block text-gray-700 mb-2">Nom complet</label>
                            <input type="text" class="w-full px-4 py-2 rounded-lg border focus:outline-none focus:border-yellow-600">
                        </div>
                        <div>
                            <label class="block text-gray-700 mb-2">Email</label>
                            <input type="email" class="w-full px-4 py-2 rounded-lg border focus:outline-none focus:border-yellow-600">
                        </div>
                        <div>
                            <label class="block text-gray-700 mb-2">Sujet</label>
                            <select class="w-full px-4 py-2 rounded-lg border focus:outline-none focus:border-yellow-600">
                                <option>Question générale</option>
                                <option>Support technique</option>
                                <option>Réclamation</option>
                                <option>Partenariat</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-gray-700 mb-2">Message</label>
                            <textarea rows="4" class="w-full px-4 py-2 rounded-lg border focus:outline-none focus:border-yellow-600"></textarea>
                        </div>
                        <button type="submit" class="w-full bg-teal-950 text-white py-3 rounded-lg hover:bg-teal-900 transition duration-300">
                            Envoyer le message
                        </button>
                    </form>
                </div>

                <div>
                    <div class="bg-white p-8 rounded-lg shadow-lg mb-8">
                        <h2 class="text-2xl font-bold text-teal-950 mb-6">FAQ Rapide</h2>
                        <div class="space-y-4">
                            <div class="border-b pb-4">
                                <h3 class="font-semibold text-teal-950 mb-2">Délai de livraison ?</h3>
                                <p class="text-gray-600">2-5 jours ouvrables selon votre localisation.</p>
                            </div>
                            <div class="border-b pb-4">
                                <h3 class="font-semibold text-teal-950 mb-2">Retours possibles ?</h3>
                                <p class="text-gray-600">Oui, sous 14 jours après réception.</p>
                            </div>
                            <div class="border-b pb-4">
                                <h3 class="font-semibold text-teal-950 mb-2">Modes de paiement ?</h3>
                                <p class="text-gray-600">Mobile Money, Orange Money et paiement à la livraison.</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-8 rounded-lg shadow-lg">
                        <h2 class="text-2xl font-bold text-teal-950 mb-6">Nos Showrooms</h2>
                        <div class="space-y-4">
                            <div class="flex items-start space-x-4">
                                <i class="fas fa-map-marker-alt text-yellow-600 mt-1"></i>
                                <div>
                                    <h3 class="font-semibold text-teal-950">Bafoussam</h3>
                                    <p class="text-gray-600">Rue mondiale du Marché 'A' entrée Dubai</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footer')
</body>
</html>