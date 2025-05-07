<header class="bg-yellow-50 shadow-sm">
    <!-- Top Bar -->
    <nav class="container mx-auto px-4 py-3">
        <div class="flex justify-between items-center">
            <a href="{{ route('home') }}" class="ml-2 h-15  mr-20">
                <img src="{{ Vite::asset('resources/images/LOGO-TPMALL.png') }}" alt="TPM Logo" class="h-14 inline">
            </a>
            <div class="flex items-center mr-4 justify-end w-full space-x-2">
                <button class="md:hidden text-gray-600" onclick="toggleMobileMenu()">
                    <i class="fas fa-bars text-xl"></i>
                </button>
 
                <div class="hidden md:block relative w-1/2">
                    <input type="text" placeholder="Rechercher..." class="w-full py-1 px-4 border rounded-full focus:outline-none focus:ring-2 focus:ring-green-500">
                    <button class="absolute right-3 top-2 text-gray-500"><i class="fas fa-search"></i></button>
                </div>
            </div>
            <div class="hidden md:flex items-center space-x-6">
                <a href="{{ route('client.wishlist') }}" class="text-gray-600 hover:text-green-500" title="Favoris"><i class="fas fa-heart"></i></a>
                
                @auth
                <!-- Afficher le panier uniquement pour les utilisateurs connectés -->
                @if (auth()->user()->role === "client")
                    {{-- cart icon --}}
                    <a href="{{ route('cart.index') }}" class="md:flex items-center text-gray-600 hover:text-green-500"> <!-- Link to your cart page -->
                        <i class="fas fa-shopping-cart"></i> (<span id="cart-count">
                            @auth <!-- Only show count if logged in -->
                            {{-- Calculate initial count server-side --}}
                            @php
                                $cart = session('cart', []);
                                $initialCount = 0;
                                foreach ($cart as $item) {
                                    $initialCount += $item['quantity'] ?? 1; // Sum quantities
                                }
                                echo $initialCount;
                            @endphp
                            @else
                            0
                            @endauth
                        </span>)
                    </a>
                @endif
                
                <!-- Afficher le nom de l'utilisateur et menu déroulant -->
                <div class="relative group">
                    <button class="flex items-center text-gray-700 hover:text-green-500">
                        <span class="mr-1">{{ Auth::user()->name }}</span>
                        <i class="fas fa-chevron-down text-xs"></i>
                    </button>
                    <div class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50 hidden group-hover:block">
                        <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-green-50 hover:text-green-500">
                            Mon tableau de bord
                        </a>
                        <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-green-50 hover:text-green-500">
                            Mon Profil
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-green-50 hover:text-green-500">
                                Déconnexion
                            </button>
                        </form>
                    </div>
                </div>
                @else
                <!-- Afficher les boutons de connexion/inscription pour les utilisateurs non connectés -->
                <a href="{{ route('login') }}" class="bg-green-900 text-white px-4 py-1 rounded-md hover:bg-green-700">Connexion</a>
                <a href="{{ route('register') }}" class="bg-green-900 text-white px-4 py-1 rounded-md hover:bg-green-700 transition duration-300">Inscription</a>
                @endauth
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
                
                @auth
                <!-- Panier pour mobile (utilisateurs connectés uniquement) -->
                <a href="{{ route('cart.index') }}" class="text-gray-600 hover:text-green-500" title="Panier"><i class="fas fa-shopping-cart"></i></a>
                <a href="{{ route('profile.edit') }}" class="text-gray-600 hover:text-green-500" title="Mon Compte"><i class="fas fa-user"></i></a>
                @endauth
            </div>
            
            @auth
            <!-- Afficher le nom de l'utilisateur et le bouton de déconnexion -->
            <div class="mb-4 text-center">
                <p class="font-medium text-gray-700 mb-2">{{ Auth::user()->name }}</p>
                <form method="POST" action="{{ route('logout') }}" class="mt-2">
                    @csrf
                    <button type="submit" class="bg-green-900 text-white px-4 py-2 rounded-md hover:bg-green-700 w-full">
                        Déconnexion
                    </button>
                </form>
            </div>
            @else
            <!-- Boutons de connexion/inscription pour mobile -->
            <div class="flex flex-col space-y-2 mb-4">
                <a href="{{ route('login') }}" class="bg-green-900 text-white px-4 py-2 rounded-md hover:bg-green-700 text-center">Connexion</a>
                <a href="{{ route('register') }}" class="bg-green-900 text-white px-4 py-2 rounded-md hover:bg-green-700 text-center">Inscription</a>
            </div>
            @endauth
        </div>
        
        <!-- Menu de navigation mobile -->
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
