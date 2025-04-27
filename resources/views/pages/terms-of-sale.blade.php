<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conditions Générales de Vente - TheProwess Mall</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-gray-50">
    @include('layouts.header')

    <div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8">
        <!-- Hero Section -->
        <div class="bg-teal-950 text-white py-12 rounded-lg mb-12 transform transition-all duration-500 hover:scale-[1.02]">
            <div class="container mx-auto text-center">
                <h1 class="text-4xl font-bold mb-4">Conditions Générales de Vente</h1>
                <p class="text-lg text-gray-300">Dernière mise à jour : {{ date('d/m/Y') }}</p>
            </div>
        </div>

        <!-- Main Content -->
        <div class="container mx-auto max-w-4xl">
            <div class="bg-white rounded-lg shadow-xl p-8 space-y-8">
                <!-- Introduction -->
                <div class="border-l-4 border-yellow-600 pl-4 animate-fade-in">
                    <h2 class="text-2xl font-semibold text-teal-950 mb-4">Préambule</h2>
                    <p class="text-gray-600">Les présentes conditions générales de vente s'appliquent à toutes les transactions effectuées sur la plateforme TheProwess Mall.</p>
                </div>

                <!-- Articles Grid -->
                <div class="grid gap-8">
                    <!-- Article 1 -->
                    <div class="bg-gray-50 p-6 rounded-lg transform transition-all duration-300 hover:shadow-lg">
                        <div class="flex items-center mb-4">
                            <span class="text-yellow-600 text-2xl font-bold mr-4">01</span>
                            <h3 class="text-xl font-semibold text-teal-950">Objet et Champ d'Application</h3>
                        </div>
                        <p class="text-gray-600">Les présentes conditions régissent les ventes de produits et services entre TheProwess Mall et ses clients.</p>
                    </div>

                    <!-- Article 2 -->
                    <div class="bg-gray-50 p-6 rounded-lg transform transition-all duration-300 hover:shadow-lg">
                        <div class="flex items-center mb-4">
                            <span class="text-yellow-600 text-2xl font-bold mr-4">02</span>
                            <h3 class="text-xl font-semibold text-teal-950">Prix et Paiement</h3>
                        </div>
                        <ul class="text-gray-600 space-y-2">
                            <li>• Les prix sont indiqués en FCFA TTC</li>
                            <li>• Paiement sécurisé via nos partenaires</li>
                            <li>• Confirmation immédiate de la transaction</li>
                        </ul>
                    </div>

                    <!-- Article 3 -->
                    <div class="bg-gray-50 p-6 rounded-lg transform transition-all duration-300 hover:shadow-lg">
                        <div class="flex items-center mb-4">
                            <span class="text-yellow-600 text-2xl font-bold mr-4">03</span>
                            <h3 class="text-xl font-semibold text-teal-950">Livraison</h3>
                        </div>
                        <div class="text-gray-600">
                            <p class="mb-2">Délais de livraison estimés selon la zone :</p>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <span class="font-medium">Zone urbaine :</span>
                                    <p>24-48 heures</p>
                                </div>
                                <div>
                                    <span class="font-medium">Zone rurale :</span>
                                    <p>3-5 jours ouvrés</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Important Notes -->
                <div class="bg-yellow-50 p-6 rounded-lg border-l-4 border-yellow-600">
                    <h3 class="text-xl font-semibold text-teal-950 mb-4">Points Importants</h3>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <h4 class="font-medium mb-2">Responsabilité</h4>
                            <p class="text-gray-600">TheProwess Mall ne peut être tenu responsable des dommages indirects.</p>
                        </div>
                        <div>
                            <h4 class="font-medium mb-2">Litiges</h4>
                            <p class="text-gray-600">En cas de litige, une solution amiable sera privilégiée.</p>
                        </div>
                    </div>
                </div>

                <!-- Contact Section -->
                <div class="bg-gray-50 p-6 rounded-lg mt-8 transform transition-all duration-300 hover:shadow-xl">
                    <h3 class="text-xl font-semibold text-teal-950 mb-4">Des Questions ?</h3>
                    <p class="text-gray-600 mb-4">Notre équipe juridique est à votre disposition pour tout éclaircissement.</p>
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('contact') }}" class="bg-teal-950 text-white px-6 py-2 rounded-full hover:bg-teal-900 transition duration-300">
                            Nous Contacter
                        </a>
                        <a href="{{ route('help-center') }}" class="text-yellow-600 hover:text-yellow-700 transition duration-300">
                            FAQ →
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