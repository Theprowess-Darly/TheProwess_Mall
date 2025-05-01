@extends('layouts.vendor')

@section('title', 'Plans d\'abonnement')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden">
        <div class="border-b border-gray-200 dark:border-gray-700 px-6 py-4">
            <h2 class="text-xl font-bold text-green-950 dark:text-white">Choisir un plan d'abonnement</h2>
        </div>
        <div class="p-6">
            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 border-l-4 border-green-950 text-green-950 dark:bg-green-800/30 dark:text-green-100">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="mb-4 p-4 bg-red-100 border-l-4 border-red-500 text-red-700 dark:bg-red-800/30 dark:text-red-100">
                    {{ session('error') }}
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($plans as $plan)
                    <div class="bg-white dark:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded-lg shadow-sm hover:shadow-md transition-shadow duration-300 flex flex-col h-full">
                        <div class="bg-green-950 text-white p-4 text-center">
                            <h3 class="text-lg font-semibold">{{ $plan->name }}</h3>
                        </div>
                        <div class="p-6 flex-grow">
                            <div class="text-center mb-6">
                                <span class="text-3xl font-bold text-green-950 dark:text-white">{{ number_format($plan->price, 0, ',', ' ') }}</span>
                                <span class="text-gray-600 dark:text-gray-300"> FCFA</span>
                                <p class="text-gray-500 dark:text-gray-400 mt-1">Durée: {{ $plan->duration_in_days }} jours</p>
                            </div>
                            <ul class="space-y-2">
                                @foreach (explode("\n", $plan->features) as $feature)
                                    <li class="flex items-start">
                                        <svg class="h-5 w-5 text-yellow-700 mr-2 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                        </svg>
                                        <span class="text-gray-700 dark:text-gray-300">{{ $feature }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="p-4 border-t border-gray-200 dark:border-gray-600 text-center">
                            <form action="{{ route('vendor.subscription.subscribe') }}" method="POST">
                                @csrf
                                <input type="hidden" name="plan_id" value="{{ $plan->id }}">
                                <button type="submit" class="inline-flex justify-center items-center px-4 py-2 bg-yellow-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-700 transition ease-in-out duration-150 w-full">
                                    Choisir ce plan
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
