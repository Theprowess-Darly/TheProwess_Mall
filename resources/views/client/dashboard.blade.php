<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-blue-950 dark:text-blue-300 leading-tight">
            {{ __('Tableau de bord client') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-blue-50 dark:bg-gray-800">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Statistics Overview -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-8">
                <!-- Orders Card -->
                <div class="bg-white dark:bg-gray-700 overflow-hidden shadow-md border-l-4 border-blue-950 dark:border-blue-500 rounded-lg p-6 transition-all duration-300 hover:shadow-lg">
                    <div class="text-gray-900 dark:text-gray-100">
                        <div class="flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-blue-950 dark:text-blue-300">Mes Commandes</h3>
                            <div class="p-2 bg-blue-100 dark:bg-blue-900 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600 dark:text-blue-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                </svg>
                            </div>
                        </div>
                        <p class="text-3xl font-bold mt-2 text-blue-800 dark:text-white">0</p>
                        <p class="mt-2 text-sm">Commandes en cours</p>
                    </div>
                </div>

                <!-- Wishlist Card -->
                <div class="bg-white dark:bg-gray-700 overflow-hidden shadow-md border-l-4 border-blue-950 dark:border-blue-500 rounded-lg p-6 transition-all duration-300 hover:shadow-lg">
                    <div class="text-gray-900 dark:text-gray-100">
                        <div class="flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-blue-950 dark:text-blue-300">Liste de Souhaits</h3>
                            <div class="p-2 bg-blue-100 dark:bg-blue-900 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600 dark:text-blue-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                            </div>
                        </div>
                        <p class="text-3xl font-bold mt-2 text-blue-800 dark:text-white">0</p>
                        <p class="mt-2 text-sm">Produits enregistrés</p>
                    </div>
                </div>

                <!-- Reviews Card -->
                <div class="bg-white dark:bg-gray-700 overflow-hidden shadow-md border-l-4 border-blue-950 dark:border-blue-500 rounded-lg p-6 transition-all duration-300 hover:shadow-lg">
                    <div class="text-gray-900 dark:text-gray-100">
                        <div class="flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-blue-950 dark:text-blue-300">Mes Avis</h3>
                            <div class="p-2 bg-blue-100 dark:bg-blue-900 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600 dark:text-blue-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                </svg>
                            </div>
                        </div>
                        <p class="text-3xl font-bold mt-2 text-blue-800 dark:text-white">0</p>
                        <p class="mt-2 text-sm">Avis publiés</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>