<div class="min-h-screen bg-teal-950 dark:bg-gray-900 text-white w-64 fixed left-0 top-0 z-40 transition-all duration-300 ease-in-out" id="sidebar">
    <div class="flex items-center justify-between p-4 border-b border-green-800 dark:border-gray-700">
        Internal Server Error

        InvalidArgumentException
        View [delivery.dashboard] not found        <div class="flex items-center space-x-2">
            <img src="{{ asset('images/logo.png') }}" alt="TPMall Logo" class="h-8 w-auto" onerror="this.src='{{ asset('images/placeholder.png') }}'; this.onerror='';">
            <span class="text-xl font-bold text-white">TPMall</span>
        </div>
        <button id="closeSidebar" class="md:hidden text-white hover:text-green-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
    
    <div class="py-4">
        <div class="px-4 mb-4">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 rounded-full bg-green-700 dark:bg-gray-700 flex items-center justify-center">
                    <span class="text-lg font-bold">{{ substr(auth()->user()->name, 0, 1) }}</span>
                </div>
                <div>
                    <p class="text-sm font-medium">{{ auth()->user()->name }}</p>
                    <p class="text-xs text-green-300 dark:text-gray-400">Administrateur</p>
                </div>
            </div>
        </div>
        
        <nav class="mt-2">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-3 {{ request()->routeIs('admin.dashboard') ? 'bg-green-800 dark:bg-gray-800 text-white' : 'text-green-200 dark:text-gray-300 hover:bg-green-800 dark:hover:bg-gray-800 hover:text-white' }} transition-colors duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                Tableau de bord
            </a>
            
            <a href="{{ route('admin.users.index') }}" class="flex items-center px-4 py-3 {{ request()->routeIs('admin.users.*') ? 'bg-green-800 dark:bg-gray-800 text-white' : 'text-green-200 dark:text-gray-300 hover:bg-green-800 dark:hover:bg-gray-800 hover:text-white' }} transition-colors duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
                Utilisateurs
            </a>
            
            <a href="{{ route('admin.shops.index') }}" class="flex items-center px-4 py-3 {{ request()->routeIs('admin.shops.*') ? 'bg-green-800 dark:bg-gray-800 text-white' : 'text-green-200 dark:text-gray-300 hover:bg-green-800 dark:hover:bg-gray-800 hover:text-white' }} transition-colors duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                </svg>
                Boutiques
            </a>
            
            <a href="{{ route('admin.products.index') }}" class="flex items-center px-4 py-3 {{ request()->routeIs('admin.products.*') ? 'bg-green-800 dark:bg-gray-800 text-white' : 'text-green-200 dark:text-gray-300 hover:bg-green-800 dark:hover:bg-gray-800 hover:text-white' }} transition-colors duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                </svg>
                Produits
            </a>
            
            <a href="{{ route('admin.orders.index') }}" class="flex items-center px-4 py-3 {{ request()->routeIs('admin.orders.*') ? 'bg-green-800 dark:bg-gray-800 text-white' : 'text-green-200 dark:text-gray-300 hover:bg-green-800 dark:hover:bg-gray-800 hover:text-white' }} transition-colors duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                </svg>
                Commandes
            </a>
            
            <div class="px-4 py-2 text-xs text-green-400 dark:text-gray-500 uppercase font-semibold mt-4">
                Configuration
            </div>
            
            <a href="#" class="flex items-center px-4 py-3 text-green-200 dark:text-gray-300 hover:bg-green-800 dark:hover:bg-gray-800 hover:text-white transition-colors duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                Paramètres
            </a>
            
            <a href="#" class="flex items-center px-4 py-3 text-green-200 dark:text-gray-300 hover:bg-green-800 dark:hover:bg-gray-800 hover:text-white transition-colors duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
                Catégories
            </a>
        </nav>
    </div>
</div>

<!-- Mobile sidebar toggle -->
<div class="fixed bottom-4 right-4 md:hidden z-50">
    <button id="openSidebar" class="bg-green-600 dark:bg-gray-700 text-white p-3 rounded-full shadow-lg">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </button>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const sidebar = document.getElementById('sidebar');
        const openSidebar = document.getElementById('openSidebar');
        const closeSidebar = document.getElementById('closeSidebar');
        
        // Check if we're on mobile
        const isMobile = window.innerWidth < 768;
        
        // Initially hide sidebar on mobile
        if (isMobile) {
            sidebar.classList.add('-translate-x-full');
        }
        
        openSidebar.addEventListener('click', function() {
            sidebar.classList.remove('-translate-x-full');
        });
        
        closeSidebar.addEventListener('click', function() {
            sidebar.classList.add('-translate-x-full');
        });
    });
</script>