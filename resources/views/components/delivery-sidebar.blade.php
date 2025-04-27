<div class="min-h-screen bg-purple-950 dark:bg-gray-900 text-white w-64 fixed left-0 top-0 z-40 transition-all duration-300 ease-in-out" id="sidebar">
    <div class="flex items-center justify-between p-4 border-b border-purple-800 dark:border-gray-700">
        <div class="flex items-center space-x-2">
            <img src="{{ asset('images/logo.png') }}" alt="TPMall Logo" class="h-8 w-auto" onerror="this.src='{{ asset('images/placeholder.png') }}'; this.onerror='';">
            <span class="text-xl font-bold text-white">TPMall</span>
        </div>
        <button id="closeSidebar" class="md:hidden text-white hover:text-purple-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
    
    <div class="py-4">
        <div class="px-4 mb-4">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 rounded-full bg-purple-700 dark:bg-gray-700 flex items-center justify-center">
                    <span class="text-lg font-bold">{{ substr(auth()->user()->name, 0, 1) }}</span>
                </div>
                <div>
                    <p class="text-sm font-medium">{{ auth()->user()->name }}</p>
                    <p class="text-xs text-purple-300 dark:text-gray-400">Livreur</p>
                </div>
            </div>
        </div>
        
        <nav class="mt-2">
            <a href="{{ route('delivery.dashboard') }}" class="flex items-center px-4 py-3 {{ request()->routeIs('delivery.dashboard') ? 'bg-purple-800 dark:bg-gray-800 text-white' : 'text-purple-200 dark:text-gray-300 hover:bg-purple-800 dark:hover:bg-gray-800 hover:text-white' }} transition-colors duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                Tableau de bord
            </a>
            
            <a href="#" class="flex items-center px-4 py-3 {{ request()->routeIs('delivery.orders.*') ? 'bg-purple-800 dark:bg-gray-800 text-white' : 'text-purple-200 dark:text-gray-300 hover:bg-purple-800 dark:hover:bg-gray-800 hover:text-white' }} transition-colors duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                </svg>
                Mes livraisons
            </a>
            
            <a href="#" class="flex items-center px-4 py-3 {{ request()->routeIs('delivery.history.*') ? 'bg-purple-800 dark:bg-gray-800 text-white' : 'text-purple-200 dark:text-gray-300 hover:bg-purple-800 dark:hover:bg-gray-800 hover:text-white' }} transition-colors duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Historique
            </a>
            
            <a href="#" class="flex items-center px-4 py-3 {{ request()->routeIs('delivery.earnings.*') ? 'bg-purple-800 dark:bg-gray-800 text-white' : 'text-purple-200 dark:text-gray-300 hover:bg-purple-800 dark:hover:bg-gray-800 hover:text-white' }} transition-colors duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Mes gains
            </a>
            
            <div class="px-4 py-2 text-xs text-purple-400 dark:text-gray-500 uppercase font-semibold mt-4">
                Compte
            </div>
            
            <a href="#" class="flex items-center px-4 py-3 text-purple-200 dark:text-gray-300 hover:bg-purple-800 dark:hover:bg-gray-800 hover:text-white transition-colors duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                Mon profil
            </a>
            
            <a href="#" class="flex items-center px-4 py-3 text-purple-200 dark:text-gray-300 hover:bg-purple-800 dark:hover:bg-gray-800 hover:text-white transition-colors duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                Paramètres
            </a>
        </nav>
    </div>
</div>

<!-- Mobile sidebar toggle -->
<div class="fixed bottom-4 right-4 md:hidden z-50">
    <button id="openSidebar" class="bg-purple-600 dark:bg-gray-700 text-white p-3 rounded-full shadow-lg">
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