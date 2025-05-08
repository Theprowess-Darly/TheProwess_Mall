<footer class="bg-teal-950 border-t-yellow-700 text-white">
    <!-- Newsletter Section -->
    <div class="bg-green-960 pt-5 p-3 md:flex items-center justify-between mx-10 space-x-6">
        <img src="{{ asset('images/logo.png') }}" class="justify-self-start h-20" alt="logo">
        <div class="md:flex justify-between space-x-4 pb-2">
            <span class="text-sm">Inscrivez vous à notre News List pour ne manquer aucune offre exclusive</span>
            <div class="flex">
                <input type="email" placeholder="Entrez votre adresse email" class="px-4 py-1 text-gray-800 rounded-l focus:outline-none">
                <button class="bg-yellow-600 text-white px-4 py-1 rounded-r hover:bg-yellow-600">Envoyer</button>
            </div>
        </div>
    </div>

    <!-- Main Footer Content -->
    <div class="container mx-auto px-4 py-8 border-t border-gray-700 pt-4">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- About Section -->
            <div>
                <h3 class="font-bold mb-4">Qui sommes nous</h3>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ route('about') }}" class="hover:text-green-500">À propos</a></li>
                    <li><a href="{{ route('terms-of-sale') }}" class="hover:text-green-500">Conditions générales de vente</a></li>
                    <li><a href="{{ route('careers') }}" class="hover:text-green-500">Carrière chez TPM</a></li>
                    <li><a href="{{ route('become-seller') }}" class="hover:text-green-500">Devenir vendeur sur TPM</a></li>
                    <li><a href="{{ route('showrooms') }}" class="hover:text-green-500">Nos showrooms</a></li>
                </ul>
            </div>

            <!-- Client Service -->
            <div>
                <h3 class="font-bold mb-4">Service Client</h3>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ route('how-to-shop') }}" class="hover:text-green-500">Comment faire des achats sur TPM</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-green-500">Contactez nous</a></li>
                    <li><a href="{{ route('about-fees') }}#delivery-fees" class="hover:text-green-500">Frais de livraison</a></li>
                    <li><a href="{{ route('help-center') }}" class="hover:text-green-500">Centre d'aide</a></li>
                    <li><a href="{{ route('return-policy') }}" class="hover:text-green-500">Politique de retour</a></li>
                </ul>
            </div>

            <!-- Help Section -->
            <div>
                <h3 class="font-bold mb-4">Besoin d'aide</h3>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ route('about-deliveries') }}" class="hover:text-green-500">À propos des livraisons</a></li>
                    <li><a href="{{ route('about-payments') }}" class="hover:text-green-500">À propos des paiements</a></li>
                    <li><a href="{{ route('about-fees') }}#general-fees" class="hover:text-green-500">À propos des frais</a></li>
                    <li><a href="{{ route('about-orders') }}" class="hover:text-green-500">À propos des commandes</a></li>
                    <li><a href="{{ route('about-stock') }}" class="hover:text-green-500">Articles et stocks</a></li>
                    <li><a href="{{ route('privacy-policy') }}" class="hover:text-green-500">Politique de confidentialité</a></li>
                </ul>
            </div>

            <!-- Services Section -->
            <div>
                <h3 class="font-bold mb-4">Nos services</h3>
                <ul class="space-y-2 text-sm">
                    <li><a href="#" class="hover:text-green-500">Offre du jour</a></li>
                    <li><a href="#" class="hover:text-green-500">Bon et cadeaux</a></li>
                    <li><a href="#" class="hover:text-green-500">Produits d'actu</a></li>
                    <li><a href="#" class="hover:text-green-500">Vente flash</a></li>
                </ul>
            </div>
        </div>

        <!-- Social Media and App Download -->
        <div class="mt-8 border-t border-gray-700 pt-8">
            <div class="md:flex justify-between items-center">
                <div class="space-x-4 my-4">
                    <span>Suivez nous aussi sur</span>
                    <a href="#" class="hover:text-green-500"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="hover:text-green-500"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="hover:text-green-500"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="hover:text-green-500"><i class="fab fa-linkedin"></i></a>
                </div>
                <div>
                    <span>Téléchargez l'app sur</span>
                    <a href="#" class="ml-2"><img src="{{ asset('images/downloadApp/app_store.png') }}" alt="App Store" class="h-8 inline"></a>
                    <a href="#" class="ml-2"><img src="{{ asset('images/downloadApp/play_store.png') }}" alt="Play Store" class="h-8 inline"></a>
                </div>
            </div>
        </div>

        <!-- Payment Methods -->
        <div class="mt-8 border-t border-gray-700 pt-4">
            <div class="md:flex justify-between items-center">
                <div class="flex items-center space-x-4" my-4>
                    <span>Nos méthodes de paiement:</span>
                    <img src="{{ asset('images/payment/momo.png') }}" alt="Mobile Money" class="h-6">
                    <img src="{{ asset('images/payment/om.png') }}" alt="Orange Money" class="h-6">
                    <img src="{{ asset('images/payment/cash0.png') }}" alt="Cash" class="h-6">
                </div>
                <div class="text-sm text-gray-400 my-4">
                    © 2025 TheProwessMall.inc all rights reserved
                </div>
            </div>
        </div>
    </div>
</footer>