<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Devenir Vendeur - TheProwess Mall</title>
    @vite(['resources/css/app.css'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-50">
    @include('layouts.header')

    <div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8">
        <!-- Hero Section -->
        <div class="bg-teal-950 text-white py-16 rounded-lg mb-12">
            <div class="container mx-auto text-center">
                <h1 class="text-4xl font-bold mb-4">Devenez Vendeur sur TPM</h1>
                <p class="text-lg text-gray-300 mb-8">Développez votre business avec la première marketplace du Cameroun</p>
                <div class="flex justify-center gap-4">
                    <a href="#register" class="bg-yellow-600 text-white px-8 py-3 rounded-full hover:bg-yellow-700 transition duration-300">
                        Commencer maintenant
                    </a>
                    <a href="#benefits" class="border-2 border-white text-white px-8 py-3 rounded-full hover:bg-white hover:text-teal-950 transition duration-300">
                        En savoir plus
                    </a>
                </div>
            </div>
        </div>

        <!-- Stats Section -->
        <div class="container mx-auto mb-16">
            <div class="grid md:grid-cols-4 gap-8 text-center">
                <div class="bg-white p-6 rounded-lg shadow-lg transform hover:scale-105 transition duration-300">
                    <div class="text-3xl font-bold text-yellow-600 mb-2">2M+</div>
                    <div class="text-gray-600">Clients Actifs</div>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg transform hover:scale-105 transition duration-300">
                    <div class="text-3xl font-bold text-yellow-600 mb-2">500+</div>
                    <div class="text-gray-600">Vendeurs Satisfaits</div>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg transform hover:scale-105 transition duration-300">
                    <div class="text-3xl font-bold text-yellow-600 mb-2">24/7</div>
                    <div class="text-gray-600">Support Vendeur</div>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg transform hover:scale-105 transition duration-300">
                    <div class="text-3xl font-bold text-yellow-600 mb-2">3%</div>
                    <div class="text-gray-600">Commission Seulement</div>
                </div>
            </div>
        </div>

        <!-- Benefits Section -->
        <div id="benefits" class="container mx-auto mb-16">
            <h2 class="text-3xl font-bold text-teal-950 text-center mb-12">Pourquoi Nous Choisir ?</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-lg shadow-lg">
                    <i class="fas fa-globe text-yellow-600 text-3xl mb-4"></i>
                    <h3 class="text-xl font-semibold text-teal-950 mb-4">Visibilité Maximale</h3>
                    <p class="text-gray-600">Accédez à des millions de clients potentiels à travers le Cameroun.</p>
                </div>
                <div class="bg-white p-8 rounded-lg shadow-lg">
                    <i class="fas fa-tools text-yellow-600 text-3xl mb-4"></i>
                    <h3 class="text-xl font-semibold text-teal-950 mb-4">Outils Professionnels</h3>
                    <p class="text-gray-600">Gérez facilement vos ventes avec nos outils de gestion avancés.</p>
                </div>
                <div class="bg-white p-8 rounded-lg shadow-lg">
                    <i class="fas fa-truck text-yellow-600 text-3xl mb-4"></i>
                    <h3 class="text-xl font-semibold text-teal-950 mb-4">Logistique Intégrée</h3>
                    <p class="text-gray-600">Profitez de notre réseau de livraison fiable et efficace.</p>
                </div>
            </div>
        </div>

        <!-- How It Works -->
        <div class="container mx-auto mb-16">
            <h2 class="text-3xl font-bold text-teal-950 text-center mb-12">Comment ça marche ?</h2>
            <div class="grid md:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="w-16 h-16 bg-green-600 rounded-full flex items-center justify-center text-white text-2xl font-bold mx-auto mb-4">1</div>
                    <h3 class="text-xl font-semibold text-teal-950 mb-2">Inscription</h3>
                    <p class="text-gray-600">Créez votre compte vendeur en quelques minutes</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 bg-yellow-600 rounded-full flex items-center justify-center text-white text-2xl font-bold mx-auto mb-4">2</div>
                    <h3 class="text-xl font-semibold text-teal-950 mb-2">Validation</h3>
                    <p class="text-gray-600">Vérification rapide de vos documents</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 bg-yellow-600 rounded-full flex items-center justify-center text-white text-2xl font-bold mx-auto mb-4">3</div>
                    <h3 class="text-xl font-semibold text-teal-950 mb-2">Configuration</h3>
                    <p class="text-gray-600">Paramétrez votre boutique</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 bg-yellow-600 rounded-full flex items-center justify-center text-white text-2xl font-bold mx-auto mb-4">4</div>
                    <h3 class="text-xl font-semibold text-teal-950 mb-2">Vente</h3>
                    <p class="text-gray-600">Commencez à vendre !</p>
                </div>
            </div>
        </div>

        <!-- Registration Form -->
        <div id="register" class="container mx-auto max-w-2xl">
            <div class="bg-white rounded-lg shadow-xl p-8">
                <h2 class="text-2xl font-bold text-teal-950 mb-8 text-center">Commencez à Vendre</h2>
                <form action="{{ route('vendor.register') }}" method="POST" class="space-y-6">
                    @csrf
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-gray-700 mb-2">Nom Complet</label>
                            <input type="text" name="name" class="w-full px-4 py-2 rounded-lg border focus:outline-none focus:border-yellow-600" required>
                        </div>
                        <div>
                            <label class="block text-gray-700 mb-2">Téléphone</label>
                            <input type="text" name="phone" class="w-full px-4 py-2 rounded-lg border focus:outline-none focus:border-yellow-600" required>
                        </div>
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-2">Email Professionnel</label>
                        <input type="email" name="email" class="w-full px-4 py-2 rounded-lg border focus:outline-none focus:border-yellow-600" required>
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-2">Adresse</label>
                        <input type="text" name="address" class="w-full px-4 py-2 rounded-lg border focus:outline-none focus:border-yellow-600" required>
                    </div>
                    <div class="grid md:grid-cols-3 gap-6">
                        <div>
                            <label class="block text-gray-700 mb-2">Ville</label>
                            <input type="text" name="city" class="w-full px-4 py-2 rounded-lg border focus:outline-none focus:border-yellow-600" required>
                        </div>
                        <div>
                            <label class="block text-gray-700 mb-2">Pays</label>
                            <input type="text" name="country" class="w-full px-4 py-2 rounded-lg border focus:outline-none focus:border-yellow-600" required>
                        </div>
                        <div>
                            <label class="block text-gray-700 mb-2">Code Postal</label>
                            <input type="text" name="postal_code" class="w-full px-4 py-2 rounded-lg border focus:outline-none focus:border-yellow-600" required>
                        </div>
                    </div>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-gray-700 mb-2">Mot de passe</label>
                            <input type="password" name="password" class="w-full px-4 py-2 rounded-lg border focus:outline-none focus:border-yellow-600" required>
                        </div>
                        <div>
                            <label class="block text-gray-700 mb-2">Confirmer le mot de passe</label>
                            <input type="password" name="password_confirmation" class="w-full px-4 py-2 rounded-lg border focus:outline-none focus:border-yellow-600" required>
                        </div>
                    </div>
                    <button type="submit" class="w-full bg-teal-950 text-white py-3 rounded-lg hover:bg-teal-900 transition duration-300">
                        Devenir Vendeur
                    </button>
                </form>
            </div>
        </div>

        <!-- Document Verification Section -->
        <div id="verification" class="container mx-auto max-w-2xl mt-8 {{ !session('show_verification') ? 'hidden' : '' }}">
            <div class="bg-white rounded-lg shadow-xl p-8">
                <h2 class="text-2xl font-bold text-teal-950 mb-8 text-center">Vérification des Documents</h2>
                
                <div class="space-y-6">
                    <!-- Document Upload Form -->
                    <form action="{{ route('seller.documents') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        <div class="border rounded-lg p-4 space-y-4">
                            <div>
                                <label class="block text-gray-700 mb-2">
                                    <i class="fas fa-id-card mr-2"></i>
                                    Pièce d'identité
                                </label>
                                <input type="file" name="id_card" accept="image/*,.pdf" 
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-yellow-600">
                            </div>

                            <div>
                                <label class="block text-gray-700 mb-2">
                                    <i class="fas fa-file-invoice mr-2"></i>
                                    Registre de Commerce
                                </label>
                                <input type="file" name="business_registry" accept="image/*,.pdf" 
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-yellow-600">
                            </div>

                            <div>
                                <label class="block text-gray-700 mb-2">
                                    <i class="fas fa-receipt mr-2"></i>
                                    Justificatif d'adresse
                                </label>
                                <input type="file" name="address_proof" accept="image/*,.pdf" 
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-yellow-600">
                            </div>
                        </div>

                        <button type="submit" class="w-full bg-yellow-600 text-white py-3 rounded-lg hover:bg-yellow-700 transition duration-300">
                            <i class="fas fa-upload mr-2"></i>
                            Soumettre mes documents
                        </button>
                    </form>

                    <!-- Progress Steps -->
                    <div class="flex justify-between items-center mt-8">
                        <div class="text-center">
                            <div class="w-16 h-16 bg-green-600 rounded-full flex items-center justify-center text-white text-2xl font-bold mx-auto mb-4">
                                <i class="fas fa-check"></i>
                            </div>
                            <h3 class="text-sm font-semibold text-teal-950">Inscription</h3>
                        </div>
                        <div class="flex-1 h-1 bg-gray-200 mx-2"></div>
                        <div class="text-center">
                            <div class="w-16 h-16 bg-yellow-600 rounded-full flex items-center justify-center text-white text-2xl font-bold mx-auto mb-4">2</div>
                            <h3 class="text-sm font-semibold text-teal-950">Vérification</h3>
                        </div>
                        <div class="flex-1 h-1 bg-gray-200 mx-2"></div>
                        <div class="text-center">
                            <div class="w-16 h-16 bg-gray-300 rounded-full flex items-center justify-center text-white text-2xl font-bold mx-auto mb-4">3</div>
                            <h3 class="text-sm font-semibold text-gray-500">Configuration</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footer')
</body>
</html>