<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between w-full items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Plans d\'abonnements') }}
            </h2>
            <a href="{{ route('vendor.subscription.history') }}" class="inline-flex items-center px-4 py-2 bg-green-950 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-950 transition ease-in-out duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Mes abonnements
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-md rounded-lg">
                <div class="p-6">
                    <h3 class="text-2xl font-bold text-green-950 dark:text-green-400 mb-6">Choisir un plan d'abonnement</h3>
                    
                    @if (session('success'))
                        <div class="mb-6 p-4 bg-green-100 border-l-4 border-green-950 text-green-950 dark:bg-green-800/30 dark:text-green-100 rounded">
                            {{ session('success') }}
                        </div>
                    @endif
    
                    @if (session('error'))
                        <div class="mb-6 p-4 bg-red-100 border-l-4 border-red-500 text-red-700 dark:bg-red-800/30 dark:text-red-100 rounded">
                            {{ session('error') }}
                        </div>
                    @endif
    
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach ($plans as $plan)
                            <div class="relative group">
                                <div class="absolute -inset-1 bg-gradient-to-r from-green-950 to-green-700 rounded-lg blur opacity-25 group-hover:opacity-100 transition duration-300 group-hover:duration-200"></div>
                                <div class="relative bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden transform transition-all duration-300 group-hover:scale-[1.02] group-hover:shadow-xl h-full flex flex-col">
                                    <div class="bg-green-950 dark:bg-green-900 text-white p-6 text-center">
                                        <h4 class="text-xl font-bold mb-2">{{ $plan->name }}</h4>
                                        <div class="text-3xl font-extrabold mb-2">{{ number_format($plan->price, 0, ',', ' ') }} <span class="text-sm font-normal">FCFA</span></div>
                                        <p class="text-green-200 dark:text-green-300">{{ $plan->duration_in_days }} jours</p>
                                    </div>
                                    <div class="p-6 flex-grow">
                                        <ul class="space-y-3">
                                            @foreach (explode("\n", $plan->features) as $feature)
                                                <li class="flex items-start">
                                                    <svg class="h-5 w-5 text-green-600 dark:text-green-400 mr-2 mt-0.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                    </svg>
                                                    <span class="text-gray-700 dark:text-gray-300">{{ $feature }}</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="p-6 bg-gray-50 dark:bg-gray-700 text-center">
                                        <form action="{{ route('vendor.subscription.subscribe') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="plan_id" value="{{ $plan->id }}">
                                            <button type="submit" class="w-full inline-flex justify-center items-center px-4 py-3 bg-green-950 border border-transparent rounded-md font-semibold text-sm text-white uppercase tracking-widest hover:bg-green-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-950 transition ease-in-out duration-150 transform hover:scale-105">
                                                Choisir ce plan
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>