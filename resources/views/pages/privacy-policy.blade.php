<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Politique de confidentialité - TheProwess Mall</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-gray-50">
    @include('layouts.header')

    <div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8">
        <!-- Hero Section -->
        <div class="bg-teal-950 text-white py-12 rounded-lg mb-12 transform transition-all duration-500 hover:scale-[1.02]">
            <div class="container mx-auto text-center">
                <h1 class="text-4xl font-bold mb-4">Politique de Confidentialité</h1>
                <p class="text-lg text-gray-300">Votre confiance est notre priorité</p>
            </div>
        </div>

        <!-- Main Content -->
        <div class="container mx-auto max-w-4xl">
            <div class="bg-white rounded-lg shadow-xl p-8 space-y-8">
                <!-- Introduction -->
                <div class="border-l-4 border-yellow-600 pl-4 animate-fade-in">
                    <h2 class="text-2xl font-semibold text-teal-950 mb-4">Introduction</h2>
                    <p class="text-gray-600">Chez TheProwess Mall, nous accordons une importance capitale à la protection de vos données personnelles. Cette politique détaille notre engagement envers la confidentialité de vos informations.</p>
                </div>

                <!-- Sections with hover effects -->
                <div class="grid gap-8 md:grid-cols-2">
                    <div class="transform transition-all duration-300 hover:scale-105">
                        <div class="bg-gray-50 p-6 rounded-lg border-t-4 border-teal-950">
                            <h3 class="text-xl font-semibold text-teal-950 mb-3">Collecte des Données</h3>
                            <p class="text-gray-600">Nous collectons uniquement les informations nécessaires pour améliorer votre expérience d'achat et assurer la sécurité de vos transactions.</p>
                        </div>
                    </div>

                    <div class="transform transition-all duration-300 hover:scale-105">
                        <div class="bg-gray-50 p-6 rounded-lg border-t-4 border-yellow-600">
                            <h3 class="text-xl font-semibold text-teal-950 mb-3">Utilisation des Données</h3>
                            <p class="text-gray-600">Vos données sont utilisées pour personnaliser votre expérience, traiter vos commandes et améliorer nos services.</p>
                        </div>
                    </div>
                </div>

                <!-- Detailed Sections -->
                <div class="space-y-6">
                    <div class="transform transition-all duration-300 hover:shadow-lg p-6 rounded-lg">
                        <h3 class="text-xl font-semibold text-teal-950 mb-3">Protection de vos Informations</h3>
                        <ul class="list-disc list-inside text-gray-600 space-y-2">
                            <li>Encryption des données sensibles</li>
                            <li>Protocoles de sécurité avancés</li>
                            <li>Accès restreint aux informations personnelles</li>
                            <li>Mises à jour régulières de nos systèmes de sécurité</li>
                        </ul>
                    </div>

                    <div class="transform transition-all duration-300 hover:shadow-lg p-6 rounded-lg">
                        <h3 class="text-xl font-semibold text-teal-950 mb-3">Vos Droits</h3>
                        <ul class="list-disc list-inside text-gray-600 space-y-2">
                            <li>Droit d'accès à vos données personnelles</li>
                            <li>Droit de rectification de vos informations</li>
                            <li>Droit à l'effacement de vos données</li>
                            <li>Droit d'opposition au traitement</li>
                        </ul>
                    </div>
                </div>

                <!-- Contact Section -->
                <div class="bg-gray-50 p-6 rounded-lg mt-8 transform transition-all duration-300 hover:shadow-xl">
                    <h3 class="text-xl font-semibold text-teal-950 mb-4">Nous Contacter</h3>
                    <p class="text-gray-600 mb-4">Pour toute question concernant notre politique de confidentialité :</p>
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('contact') }}" class="bg-teal-950 text-white px-6 py-2 rounded-full hover:bg-teal-900 transition duration-300">
                            Contactez-nous
                        </a>
                        <a href="{{ route('contact') }}" class="text-yellow-600 hover:text-yellow-700 transition duration-300">
                            En savoir plus →
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footer')

    <style>
        @keyframes fade-in {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in {
            animation: fade-in 0.6s ease-out;
        }
    </style>
</body>
</html>