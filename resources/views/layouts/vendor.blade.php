<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Tableau de bord Marchand</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="bg-gray-100 dark:bg-gray-900">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-gray-800 dark:bg-gray-900 text-white hidden md:block">
            <div class="sticky top-0 p-4">
                <div class="text-center mb-6">
                    <h4 class="text-xl font-semibold">TPMall</h4>
                    <p class="text-gray-400">Espace Marchand</p>
                </div>
                <nav>
                    <ul class="space-y-2">
                        <li>
                            <a class="flex items-center px-4 py-2 rounded-lg {{ request()->routeIs('vendor.dashboard') ? 'bg-blue-600 text-white' : 'text-gray-300 hover:bg-gray-700' }}" href="{{ route('vendor.dashboard') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                                </svg>
                                Tableau de bord
                            </a>
                        </li>
                        <li>
                            <a class="flex items-center px-4 py-2 rounded-lg {{ request()->routeIs('vendor.shop.*') ? 'bg-blue-600 text-white' : 'text-gray-300 hover:bg-gray-700' }}" href="{{ route('vendor.shop.edit') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                </svg>
                                Modifier Ma Boutique
                            </a>
                        </li>
                        <li>
                            <a class="flex items-center px-4 py-2 rounded-lg {{ request()->routeIs('vendor.subscription.*') ? 'bg-blue-600 text-white' : 'text-gray-300 hover:bg-gray-700' }}" href="{{ route('vendor.subscription.history') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                </svg>
                                Abonnements
                            </a>
                        </li>
                        <li>
                            <a class="flex items-center px-4 py-2 rounded-lg {{ request()->routeIs('vendor.profile.*') ? 'bg-blue-600 text-white' : 'text-gray-300 hover:bg-gray-700' }}" href="{{ route('vendor.profile.edit') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                Mon Profil
                            </a>
                        </li>
                        {{-- <li>
                            <a class="flex items-center px-4 py-2 rounded-lg text-gray-300 hover:bg-gray-700" href="{{ route('notifications.index') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                </svg>
                                Notifications
                            </a>
                        </li> --}}
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full flex items-center px-4 py-2 rounded-lg text-gray-300 hover:bg-gray-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                    </svg>
                                    Déconnexion
                                </button>
                            </form>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

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
    </div>

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

    <script>
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