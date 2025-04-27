<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrières - TheProwess Mall</title>
    @vite(['resources/css/app.css'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-50">
    @include('layouts.header')

    <div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8">
        <!-- Hero Section -->
        <div class="bg-teal-950 text-white py-16 rounded-lg mb-12 transform transition-all duration-500 hover:scale-[1.02]">
            <div class="container mx-auto text-center">
                <h1 class="text-4xl font-bold mb-4">Rejoignez l'Aventure TPM</h1>
                <p class="text-lg text-gray-300 mb-8">Construisons ensemble le futur du e-commerce en Afrique</p>
                <a href="#positions" class="bg-yellow-600 text-white px-8 py-3 rounded-full hover:bg-yellow-700 transition duration-300">
                    Voir nos offres
                </a>
            </div>
        </div>

        <!-- Main Content -->
        <div class="container mx-auto max-w-6xl">
            <!-- Why Join Us -->
            <div class="grid md:grid-cols-3 gap-8 mb-16">
                <div class="bg-white p-6 rounded-lg shadow-lg transform transition-all duration-300 hover:scale-105">
                    <i class="fas fa-rocket text-yellow-600 text-3xl mb-4"></i>
                    <h3 class="text-xl font-semibold text-teal-950 mb-3">Innovation</h3>
                    <p class="text-gray-600">Participez à la révolution du e-commerce avec des technologies de pointe.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg transform transition-all duration-300 hover:scale-105">
                    <i class="fas fa-users text-yellow-600 text-3xl mb-4"></i>
                    <h3 class="text-xl font-semibold text-teal-950 mb-3">Culture Inclusive</h3>
                    <p class="text-gray-600">Rejoignez une équipe diverse et passionnée qui valorise chaque talent.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg transform transition-all duration-300 hover:scale-105">
                    <i class="fas fa-chart-line text-yellow-600 text-3xl mb-4"></i>
                    <h3 class="text-xl font-semibold text-teal-950 mb-3">Croissance</h3>
                    <p class="text-gray-600">Évoluez dans un environnement qui favorise le développement professionnel.</p>
                </div>
            </div>

            <!-- Current Positions -->
            <div id="positions" class="bg-white rounded-lg shadow-xl p-8 mb-16">
                <h2 class="text-2xl font-bold text-teal-950 mb-8">Postes Disponibles</h2>
                <div class="space-y-6">
                    <!-- Position Card -->
                    <div class="border-l-4 border-yellow-600 pl-4 py-4 transform transition-all duration-300 hover:shadow-lg">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-xl font-semibold text-teal-950">Développeur Full Stack</h3>
                                <p class="text-gray-600 mt-2">Douala, Cameroun • Full-time</p>
                                <div class="flex gap-2 mt-3">
                                    <span class="bg-yellow-100 text-yellow-800 text-xs px-2 py-1 rounded">PHP</span>
                                    <span class="bg-yellow-100 text-yellow-800 text-xs px-2 py-1 rounded">Laravel</span>
                                    <span class="bg-yellow-100 text-yellow-800 text-xs px-2 py-1 rounded">React</span>
                                </div>
                            </div>
                            <a href="#" class="bg-teal-950 text-white px-6 py-2 rounded-full hover:bg-teal-900 transition duration-300">
                                Postuler
                            </a>
                        </div>
                    </div>

                    <!-- Add more position cards here -->
                </div>
            </div>

            <!-- Benefits Section -->
            <div class="grid md:grid-cols-2 gap-8 mb-16">
                <div class="bg-gray-50 p-8 rounded-lg">
                    <h2 class="text-2xl font-bold text-teal-950 mb-6">Avantages</h2>
                    <ul class="space-y-4">
                        <li class="flex items-center">
                            <i class="fas fa-check-circle text-yellow-600 mr-3"></i>
                            <span class="text-gray-600">Assurance santé complète</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check-circle text-yellow-600 mr-3"></i>
                            <span class="text-gray-600">Horaires flexibles</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check-circle text-yellow-600 mr-3"></i>
                            <span class="text-gray-600">Formation continue</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check-circle text-yellow-600 mr-3"></i>
                            <span class="text-gray-600">Prime annuelle</span>
                        </li>
                    </ul>
                </div>
                <div class="bg-gray-50 p-8 rounded-lg">
                    <h2 class="text-2xl font-bold text-teal-950 mb-6">Notre Process</h2>
                    <ol class="space-y-4">
                        <li class="flex items-center">
                            <span class="bg-yellow-600 text-white w-6 h-6 rounded-full flex items-center justify-center mr-3">1</span>
                            <span class="text-gray-600">Candidature en ligne</span>
                        </li>
                        <li class="flex items-center">
                            <span class="bg-yellow-600 text-white w-6 h-6 rounded-full flex items-center justify-center mr-3">2</span>
                            <span class="text-gray-600">Entretien téléphonique</span>
                        </li>
                        <li class="flex items-center">
                            <span class="bg-yellow-600 text-white w-6 h-6 rounded-full flex items-center justify-center mr-3">3</span>
                            <span class="text-gray-600">Test technique</span>
                        </li>
                        <li class="flex items-center">
                            <span class="bg-yellow-600 text-white w-6 h-6 rounded-full flex items-center justify-center mr-3">4</span>
                            <span class="text-gray-600">Entretien final</span>
                        </li>
                    </ol>
                </div>
            </div>

            <!-- Contact Section -->
            <div class="bg-white p-8 rounded-lg shadow-xl text-center">
                <h2 class="text-2xl font-bold text-teal-950 mb-4">Vous ne trouvez pas le poste idéal ?</h2>
                <p class="text-gray-600 mb-6">Envoyez-nous une candidature spontanée et nous vous contacterons dès qu'un poste correspondant à votre profil sera disponible.</p>
                <a href="#" class="bg-yellow-600 text-white px-8 py-3 rounded-full hover:bg-yellow-700 transition duration-300">
                    Candidature spontanée
                </a>
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