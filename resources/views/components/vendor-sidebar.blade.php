<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title') - Tableau de bord Marchand</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @stack('styles')
    </head>
    <body>
        
     
        
        <div class="min-h-screen bg-green-950 dark:bg-gray-900 text-white w-64 fixed left-0 top-0 z-40 transition-all duration-300 ease-in-out" id="sidebar">
            <div class="flex items-center justify-between p-4 border-b border-green-800 dark:border-gray-700">
                <div class="flex items-center space-x-2">
                    <img src="{{ asset('images/logo.png') }}" alt="TPMall Logo" class="h-8 w-auto" onerror="this.src='{{ asset('images/placeholder.png') }}'; this.onerror='';">
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
                            <p class="text-xs text-green-300 dark:text-gray-400">Marchand</p>
                        </div>
                    </div>
                </div>
                {{-- vendor dashboard --}}
                <nav class="mt-2">
                    <a href="{{ route('vendor.dashboard') }}" class="flex items-center px-4 py-3 {{ request()->routeIs('vendor.dashboard') ? 'bg-green-800 dark:bg-gray-800 text-white' : 'text-green-200 dark:text-gray-300 hover:bg-green-800 dark:hover:bg-gray-800 hover:text-white' }} transition-colors duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        Tableau de bord
                    </a>
                    {{-- vendor products --}}
                    <a href="{{ route('vendor.products.index') }}" class="flex items-center px-4 py-3 {{ request()->routeIs('vendor.products.*') ? 'bg-green-800 dark:bg-gray-800 text-white' : 'text-green-200 dark:text-gray-300 hover:bg-green-800 dark:hover:bg-gray-800 hover:text-white' }} transition-colors duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                        </svg>
                        Mes produits
                    </a>
                    {{-- Vendor orders --}}
                    <a href="{{ route('vendor.orders.index') }}" class="flex items-center px-4 py-3 {{ request()->routeIs('vendor.orders.*') ? 'bg-green-800 dark:bg-gray-800 text-white' : 'text-green-200 dark:text-gray-300 hover:bg-green-800 dark:hover:bg-gray-800 hover:text-white' }} transition-colors duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                        Commandes
                    </a>          
                    {{-- shop edit --}}
                    @isset($shop)
                        <a href="{{ route('vendor.shop.show') }}" class="flex items-center px-4 py-3 {{ request()->routeIs('vendor.shop.*') ? 'bg-green-800 dark:bg-gray-800 text-white' : 'text-green-200 dark:text-gray-300 hover:bg-green-800 dark:hover:bg-gray-800 hover:text-white' }} transition-colors duration-200">
                    @else
                        <a href="{{ route('vendor.shop.create') }}" class="flex items-center px-4 py-3 {{ request()->routeIs('vendor.shop.*') ? 'bg-green-800 dark:bg-gray-800 text-white' : 'text-green-200 dark:text-gray-300 hover:bg-green-800 dark:hover:bg-gray-800 hover:text-white' }} transition-colors duration-200">
                    @endisset
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                            </svg>
                        Modifier Ma boutique
                        </a>

                        
                    
                    <a href="#" class="flex items-center px-4 py-3 {{ request()->routeIs('vendor.reviews.*') ? 'bg-green-800 dark:bg-gray-800 text-white' : 'text-green-200 dark:text-gray-300 hover:bg-green-800 dark:hover:bg-gray-800 hover:text-white' }} transition-colors duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                        </svg>
                        Avis clients
                    </a>
                        



                    <a class="flex items-center px-4 py-3 {{ request()->routeIs('vendor.subscription.*') ? 'bg-green-800 text-white' : 'text-green-200 hover:bg-gray-700' }}" href="{{ route('vendor.subscription.history') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                        </svg>
                        Abonnements
                    </a>

                    {{-- <a class="flex items-center px-4 py-2 rounded-lg text-gray-300 hover:bg-gray-700" href="{{ route('notifications.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                        Notifications
                    </a> --}}


            
                    <!-- Mobile menu button -->
                    <div class="md:hidden fixed top-0 left-0 z-50 p-4">
                        <button id="mobile-menu-button" class="text-gray-500 hover:text-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                    </div>
            
                    <!-- Main content -->
                    <main class="flex-1 overflow-y-auto p-6">
                        <div class="flex justify-between items-center pb-4 mb-6 border-b border-gray-200 dark:border-gray-700">
                            <h1 class="text-2xl font-semibold text-gray-800 dark:text-white">@yield('title')</h1>
                            <div class="flex space-x-2">
                                @yield('actions')
                            </div>
                        </div>
            
                        @if (session('success'))
                            <div class="mb-4 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 dark:bg-green-800 dark:text-green-100">
                                {{ session('success') }}
                            </div>
                        @endif
            
                        @if (session('error'))
                            <div class="mb-4 p-4 bg-red-100 border-l-4 border-red-500 text-red-700 dark:bg-red-800 dark:text-red-100">
                                {{ session('error') }}
                            </div>
                        @endif
            
                        @if (session('info'))
                            <div class="mb-4 p-4 bg-blue-100 border-l-4 border-blue-500 text-blue-700 dark:bg-blue-800 dark:text-blue-100">
                                {{ session('info') }}
                            </div>
                        @endif
            
                        @yield('content')
                    </main>
                
            
                    <!-- Mobile menu (off-canvas) -->
                    <div id="mobile-menu" class="fixed inset-0 z-40 hidden">
                        <div class="absolute inset-0 bg-black opacity-50"></div>
                        <div class="absolute inset-y-0 left-0 max-w-xs w-full bg-gray-800 text-white p-4">
                            <div class="flex justify-between items-center mb-6">
                                <h4 class="text-xl font-semibold">TPMall</h4>
                                <button id="close-mobile-menu" class="text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                            <nav>
                                <!-- Duplicate of desktop menu items for mobile -->
                                <ul class="space-y-2">
                                    <li>
                                        <a class="flex items-center px-4 py-2 rounded-lg {{ request()->routeIs('vendor.dashboard') ? 'bg-blue-600 text-white' : 'text-gray-300 hover:bg-gray-700' }}" href="{{ route('vendor.dashboard') }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                                            </svg>
                                            Tableau de bord
                                        </a>
                                    </li>
                                    <!-- Add other menu items here -->
                                </ul>
                            </nav>
                        </div>
                    </div>
                



                    

                    
                    <div class="px-4 py-2 text-xs text-green-400 dark:text-gray-500 uppercase font-semibold mt-4">
                        Compte
                    </div>
                    
                    <a href="#" class="flex items-center px-4 py-3 text-green-200 dark:text-gray-300 hover:bg-green-800 dark:hover:bg-gray-800 hover:text-white transition-colors duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        Mon profil
                    </a>
                    
                    <a href="#" class="flex items-center px-4 py-3 text-green-200 dark:text-gray-300 hover:bg-green-800 dark:hover:bg-gray-800 hover:text-white transition-colors duration-200">
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

            // Mobile menu toggle
            document.getElementById('mobile-menu-button')?.addEventListener('click', function() {
                document.getElementById('mobile-menu').classList.remove('hidden');
            });
            
            document.getElementById('close-mobile-menu')?.addEventListener('click', function() {
                document.getElementById('mobile-menu').classList.add('hidden');
            });
        </script>
        @stack('scripts')
    </body>   
</html>