<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>À propos - TheProwess Mall</title>
    @vite(['resources/css/app.css'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-50">
    @include('layouts.header')

    <div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8">
        <!-- Hero Section -->
        <div class="bg-teal-950 text-white py-16 rounded-lg mb-12 relative overflow-hidden">
            <div class="absolute inset-0 bg-black opacity-20"></div>
            <div class="container mx-auto text-center relative z-10">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Notre Histoire</h1>
                <p class="text-lg text-gray-300 max-w-2xl mx-auto">Leader du e-commerce au Cameroun, nous révolutionnons l'expérience shopping en ligne depuis 2023</p>
            </div>
        </div>

        <!-- Main Content -->
        <div class="container mx-auto max-w-7xl">
            <!-- Mission & Vision -->
            <div class="grid md:grid-cols-2 gap-12 mb-16">
                <div class="bg-white p-8 rounded-lg shadow-lg transform transition-all duration-300 hover:scale-105">
                    <div class="text-yellow-600 text-3xl mb-4">
                        <i class="fas fa-bullseye"></i>
                    </div>
                    <h2 class="text-2xl font-bold text-teal-950 mb-4">Notre Mission</h2>
                    <p class="text-gray-600">Faciliter l'accès au commerce électronique pour tous les Camerounais en offrant une plateforme sûre, innovante et accessible.</p>
                </div>

                <div class="bg-white p-8 rounded-lg shadow-lg transform transition-all duration-300 hover:scale-105">
                    <div class="text-yellow-600 text-3xl mb-4">
                        <i class="fas fa-eye"></i>
                    </div>
                    <h2 class="text-2xl font-bold text-teal-950 mb-4">Notre Vision</h2>
                    <p class="text-gray-600">Devenir la référence du e-commerce en Afrique centrale en connectant vendeurs et acheteurs dans un écosystème digital innovant.</p>
                </div>
            </div>

            <!-- Key Numbers -->
            <div class="mb-16">
                <h2 class="text-3xl font-bold text-teal-950 text-center mb-12">TPM en Chiffres</h2>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                    <div class="text-center transform transition-all duration-300 hover:scale-110">
                        <div class="text-4xl font-bold text-yellow-600 mb-2">1M+</div>
                        <div class="text-gray-600">Clients Satisfaits</div>
                    </div>
                    <div class="text-center transform transition-all duration-300 hover:scale-110">
                        <div class="text-4xl font-bold text-yellow-600 mb-2">5000+</div>
                        <div class="text-gray-600">Produits</div>
                    </div>
                    <div class="text-center transform transition-all duration-300 hover:scale-110">
                        <div class="text-4xl font-bold text-yellow-600 mb-2">500+</div>
                        <div class="text-gray-600">Vendeurs Actifs</div>
                    </div>
                    <div class="text-center transform transition-all duration-300 hover:scale-110">
                        <div class="text-4xl font-bold text-yellow-600 mb-2">10+</div>
                        <div class="text-gray-600">Villes Desservies</div>
                    </div>
                </div>
            </div>

            <!-- Values -->
            <div class="mb-16">
                <h2 class="text-3xl font-bold text-teal-950 text-center mb-12">Nos Valeurs</h2>
                <div class="grid md:grid-cols-3 gap-8">
                    <div class="bg-white p-6 rounded-lg shadow-lg transform transition-all duration-300 hover:-translate-y-2">
                        <i class="fas fa-shield-alt text-yellow-600 text-3xl mb-4"></i>
                        <h3 class="text-xl font-semibold text-teal-950 mb-3">Confiance</h3>
                        <p class="text-gray-600">La sécurité et la satisfaction de nos clients sont notre priorité absolue.</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-lg transform transition-all duration-300 hover:-translate-y-2">
                        <i class="fas fa-handshake text-yellow-600 text-3xl mb-4"></i>
                        <h3 class="text-xl font-semibold text-teal-950 mb-3">Partenariat</h3>
                        <p class="text-gray-600">Nous créons des relations durables avec nos vendeurs et partenaires.</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-lg transform transition-all duration-300 hover:-translate-y-2">
                        <i class="fas fa-lightbulb text-yellow-600 text-3xl mb-4"></i>
                        <h3 class="text-xl font-semibold text-teal-950 mb-3">Innovation</h3>
                        <p class="text-gray-600">Nous innovons constamment pour améliorer l'expérience utilisateur.</p>
                    </div>
                </div>
            </div>

            <!-- Team -->
            <div class="mb-16">
                <h2 class="text-3xl font-bold text-teal-950 text-center mb-12">Notre Équipe de Direction</h2>
                <div class="grid md:grid-cols-4 justify-center gap-8">
                    <!-- CEO and founder -->
                    <div class="text-center">
                        <div class="w-32 h-32 mx-auto rounded-full bg-gray-200 mb-4 overflow-hidden">
                            <img src="{{ asset('images/team/ceo.jpg') }}" alt="CEO" class="w-full h-full object-cover">
                        </div>
                        <h3 class="text-xl font-semibold text-teal-950">Mrs DIANGHA Darly</h3>
                        <p class="text-gray-600">CEO & Fondatrice</p>
                    </div>
                    <!-- in memory of my beloved husband forever loved -->
                    <div class="text-center">
                        <div class="w-32 h-32 mx-auto rounded-full bg-gray-200 mb-4 overflow-hidden">
                            <img src="{{ asset('images/team/memorial.jpg') }}" alt="CEO" class="w-full h-full object-cover">
                        </div>
                        <h3 class="text-xl font-semibold text-teal-950">GODCARES DIANGHA</h3>
                        <p class="text-gray-600">Dedicaces speciales</p>
                    </div>
                    <!-- CEO and founder -->
                    <div class="text-center">
                        <div class="w-32 h-32 mx-auto rounded-full bg-gray-200 mb-4 overflow-hidden">
                            <img src="{{ asset('images/team/adviser.jpg') }}" alt="CEO" class="w-full h-full object-cover">
                        </div>
                        <h3 class="text-xl font-semibold text-teal-950">Chris SAMORY</h3>
                        <p class="text-gray-600">Conseiller principal</p>
                    </div>
                    <!-- Add more team members similarly -->
                </div>
            </div>

            <!-- Call to Action -->
            <div class="bg-teal-950 text-white p-12 rounded-lg text-center">
                <h2 class="text-3xl font-bold mb-6">Rejoignez l'Aventure TPM</h2>
                <p class="text-lg mb-8">Découvrez les opportunités de carrière chez TheProwess Mall</p>
                <a href="{{ route('careers') }}" class="bg-yellow-600 text-white px-8 py-3 rounded-full hover:bg-yellow-700 transition duration-300">
                    Voir nos offres d'emploi
                </a>
            </div>
        </div>
    </div>

    @include('layouts.footer')
</body>
</html>