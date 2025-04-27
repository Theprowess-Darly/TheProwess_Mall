<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frais de Livraison - TheProwess Mall</title>
    @vite(['resources/css/app.css'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-50">
    @include('layouts.header')

    <div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8">
        <!-- Hero Section -->
        <div class="bg-teal-950 text-white py-16 rounded-lg mb-12">
            <div class="container mx-auto text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Frais de Livraison</h1>
                <p class="text-lg text-gray-300 max-w-2xl mx-auto">Découvrez nos tarifs de livraison par zone</p>
            </div>
        </div>

        <!-- Main Content -->
        <div class="container mx-auto max-w-6xl">
            <!-- Delivery Zones -->
            <div class="grid md:grid-cols-3 gap-8 mb-16">
                <!-- Zone 1: Bafoussam -->
                <div class="bg-white p-8 rounded-lg shadow-lg">
                    <div class="text-center mb-6">
                        <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-motorcycle text-yellow-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-teal-950">Zone 1: Bafoussam</h3>
                    </div>
                    <div class="space-y-4">
                        <div class="flex justify-between items-center border-b pb-2">
                            <span class="text-gray-600">0 - 2 kg</span>
                            <span class="font-semibold text-teal-950">1000 FCFA</span>
                        </div>
                        <div class="flex justify-between items-center border-b pb-2">
                            <span class="text-gray-600">2 - 5 kg</span>
                            <span class="font-semibold text-teal-950">1500 FCFA</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">5+ kg</span>
                            <span class="font-semibold text-teal-950">2000 FCFA</span>
                        </div>
                    </div>
                </div>

                <!-- Zone 2: Autres villes de l'Ouest -->
                <div class="bg-white p-8 rounded-lg shadow-lg">
                    <div class="text-center mb-6">
                        <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-truck text-yellow-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-teal-950">Zone 2: Région de l'Ouest</h3>
                    </div>
                    <div class="space-y-4">
                        <div class="flex justify-between items-center border-b pb-2">
                            <span class="text-gray-600">0 - 2 kg</span>
                            <span class="font-semibold text-teal-950">2000 FCFA</span>
                        </div>
                        <div class="flex justify-between items-center border-b pb-2">
                            <span class="text-gray-600">2 - 5 kg</span>
                            <span class="font-semibold text-teal-950">2500 FCFA</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">5+ kg</span>
                            <span class="font-semibold text-teal-950">3000 FCFA</span>
                        </div>
                    </div>
                </div>

                <!-- Zone 3: National -->
                <div class="bg-white p-8 rounded-lg shadow-lg">
                    <div class="text-center mb-6">
                        <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-shipping-fast text-yellow-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-teal-950">Zone 3: National</h3>
                    </div>
                    <div class="space-y-4">
                        <div class="flex justify-between items-center border-b pb-2">
                            <span class="text-gray-600">0 - 2 kg</span>
                            <span class="font-semibold text-teal-950">3000 FCFA</span>
                        </div>
                        <div class="flex justify-between items-center border-b pb-2">
                            <span class="text-gray-600">2 - 5 kg</span>
                            <span class="font-semibold text-teal-950">3500 FCFA</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">5+ kg</span>
                            <span class="font-semibold text-teal-950">4000 FCFA</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Additional Information -->
            <div class="grid md:grid-cols-2 gap-8 mb-16">
                <!-- Delivery Times -->
                <div class="bg-white p-8 rounded-lg shadow-lg">
                    <h2 class="text-2xl font-bold text-teal-950 mb-6">Délais de Livraison</h2>
                    <div class="space-y-4">
                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-yellow-100 rounded-full flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-clock text-yellow-600"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-teal-950 mb-2">Zone 1: Bafoussam</h3>
                                <p class="text-gray-600">Livraison le jour même ou J+1</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-yellow-100 rounded-full flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-clock text-yellow-600"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-teal-950 mb-2">Zone 2: Région de l'Ouest</h3>
                                <p class="text-gray-600">2-3 jours ouvrables</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-yellow-100 rounded-full flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-clock text-yellow-600"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-teal-950 mb-2">Zone 3: National</h3>
                                <p class="text-gray-600">3-5 jours ouvrables</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Important Notes -->
                <div class="bg-white p-8 rounded-lg shadow-lg">
                    <h2 class="text-2xl font-bold text-teal-950 mb-6">Informations Importantes</h2>
                    <div class="space-y-4">
                        <div class="flex items-start space-x-4">
                            <i class="fas fa-info-circle text-yellow-600 mt-1"></i>
                            <p class="text-gray-600">Les délais de livraison sont donnés à titre indicatif et peuvent varier selon les conditions.</p>
                        </div>
                        <div class="flex items-start space-x-4">
                            <i class="fas fa-info-circle text-yellow-600 mt-1"></i>
                            <p class="text-gray-600">Les frais de livraison sont calculés automatiquement lors de votre commande.</p>
                        </div>
                        <div class="flex items-start space-x-4">
                            <i class="fas fa-info-circle text-yellow-600 mt-1"></i>
                            <p class="text-gray-600">Livraison gratuite pour toute commande supérieure à 50,000 FCFA.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Section -->
            <div class="bg-teal-950 text-white p-8 rounded-lg text-center">
                <h2 class="text-2xl font-bold mb-4">Des questions ?</h2>
                <p class="mb-6">Notre équipe est là pour vous aider avec vos questions sur la livraison</p>
                <a href="{{ route('contact') }}" class="bg-yellow-600 text-white px-8 py-3 rounded-full hover:bg-yellow-700 transition duration-300">
                    Contactez-nous
                </a>
            </div>
        </div>
    </div>

    @include('layouts.footer')
</body>
</html>