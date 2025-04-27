<header class="bg-yellow-50 shadow-sm">
    <!-- Top Bar -->
    <nav class="container mx-auto px-4 py-3">
        <div class="flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <button class="md:hidden text-gray-600" onclick="toggleMobileMenu()">
                    <i class="fas fa-bars text-xl"></i>
                </button>
                <a href="{{ route('home') }}" class="ml-2">
                    <img src="{{ Vite::asset('resources/images/logos/tpmL.png') }}" alt="TPM Logo" class="h-8 inline">
                </a>
                <div class="hidden md:block relative">
                    <input type="text" placeholder="Rechercher..." class="w-48 px-4 py-2 border rounded-full focus:outline-none focus:ring-2 focus:ring-green-500">
                    <button class="absolute right-3 top-2 text-gray-500"><i class="fas fa-search"></i></button>
                </div>
            </div>
            <div class="hidden md:flex items-center space-x-6">
                <a href="#" class="text-gray-600 hover:text-green-500" title="Favoris"><i class="fas fa-heart"></i></a>
                <a href="{{ route('cart') }}" class="text-gray-600 hover:text-green-500" title="Panier"><i class="fas fa-shopping-cart"></i></a>
                <a href="#" class="text-gray-600 hover:text-green-500" title="Mon Compte"><i class="fas fa-user"></i></a>
                <a href="{{ route('login') }}" class="bg-green-900 text-white px-4 py-2 rounded-md hover:bg-green-700">Connexion</a>
                <a href="{{ route('register') }}" class="bg-green-900 text-white px-4 py-2 rounded-md hover:bg-green-700 transition duration-300">Inscription</a>
            </div>
        </div>
    </nav>

    <!-- Mobile Menu -->
    <div id="mobileMenu" class="hidden md:hidden bg-white border-t border-gray-200">
        <div class="px-4 py-2">
            <div class="relative mb-4">
                <input type="text" placeholder="Rechercher..." class="w-full px-4 py-2 border rounded-full focus:outline-none focus:ring-2 focus:ring-green-500">
                <button class="absolute right-3 top-2 text-gray-500"><i class="fas fa-search"></i></button>
            </div>
            <div class="flex justify-around mb-4">
                <a href="#" class="text-gray-600 hover:text-green-500" title="Favoris"><i class="fas fa-heart"></i></a>
                <a href="#" class="text-gray-600 hover:text-green-500" title="Panier"><i class="fas fa-shopping-cart"></i></a>
                <a href="#" class="text-gray-600 hover:text-green-500" title="Mon Compte"><i class="fas fa-user"></i></a>
            </div>
            <div class="flex flex-col space-y-2 mb-4">
                <a href="{{ route('login') }}" class="bg-green-900 text-white px-4 py-2 rounded-md hover:bg-green-700 text-center">Connexion</a>
                <a href="{{ route('register') }}" class="bg-green-900 text-white px-4 py-2 rounded-md hover:bg-green-700 text-center">Inscription</a>
            </div>
        </div>
        <ul class="border-t border-gray-200">
            <li><a href="{{ route('home') }}" class="block px-4 py-2 text-gray-700 hover:bg-green-50 hover:text-green-500">Accueil</a></li>
            <li><a href="#" class="block px-4 py-2 text-gray-700 hover:bg-green-50 hover:text-green-500">Catégories</a></li>
            <li><a href="#" class="block px-4 py-2 text-gray-700 hover:bg-green-50 hover:text-green-500">Nouveautés</a></li>
            <li><a href="#" class="block px-4 py-2 text-gray-700 hover:bg-green-50 hover:text-green-500">Promotions</a></li>
            <li><a href="#" class="block px-4 py-2 text-gray-700 hover:bg-green-50 hover:text-green-500">Meilleures Ventes</a></li>
            <li><a href="{{ route('become-seller') }}" class="block px-4 py-2 text-gray-700 hover:bg-green-50 hover:text-green-500">Devenir Vendeur</a></li>
        </ul>
    </div>

    <!-- Main Navigation -->
    <div class="border-t border-gray-200 hidden md:block">
        <nav class="container mx-auto px-4 py-2">
            <ul class="flex justify-center space-x-8">
                <li><a href="{{ route('home') }}" class="text-gray-700 hover:text-green-500 transition duration-300">Accueil</a></li>
                <li class="relative group">
                    <a href="#" class="text-gray-700 hover:text-green-500 transition duration-300">
                        Catégories <i class="fas fa-chevron-down text-xs ml-1"></i>
                    </a>
                </li>
                <li><a href="#" class="text-gray-700 hover:text-green-500 transition duration-300">Nouveautés</a></li>
                <li><a href="#" class="text-gray-700 hover:text-green-500 transition duration-300">Promotions</a></li>
                <li><a href="#" class="text-gray-700 hover:text-green-500 transition duration-300">Meilleures Ventes</a></li>
                <li><a href="{{ route('become-seller') }}" class="text-gray-700 hover:text-green-500 transition duration-300">Devenir Vendeur</a></li>
            </ul>
        </nav>
    </div>

    <script>
        function toggleMobileMenu() {
            const mobileMenu = document.getElementById('mobileMenu');
            mobileMenu.classList.toggle('hidden');
        }
    </script>
</header>