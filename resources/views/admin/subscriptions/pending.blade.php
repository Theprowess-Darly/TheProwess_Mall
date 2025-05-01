<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-green-950 dark:text-green-300 leading-tight">
            {{ __('Abonnements en attente') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-green-100 dark:bg-gray-800">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-700 overflow-hidden shadow-md rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-semibold text-green-950 dark:text-green-300">Abonnements en attente d'approbation</h3>
                    </div>

                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    @if ($pendingSubscriptions->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="min-w-full bg-white dark:bg-gray-800">
                                <thead class="bg-green-950 dark:bg-green-800 text-white">
                                    <tr>
                                        <th class="py-3 px-4 text-left">ID</th>
                                        <th class="py-3 px-4 text-left">Marchand</th>
                                        <th class="py-3 px-4 text-left">Boutique</th>
                                        <th class="py-3 px-4 text-left">Plan</th>
                                        <th class="py-3 px-4 text-left">Montant</th>
                                        <th class="py-3 px-4 text-left">Méthode de paiement</th>
                                        <th class="py-3 px-4 text-left">Date de création</th>
                                        <th class="py-3 px-4 text-left">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                    @foreach ($pendingSubscriptions as $subscription)
                                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                            <td class="py-3 px-4">{{ $subscription->id }}</td>
                                            <td class="py-3 px-4">{{ $subscription->user->name }}</td>
                                            <td class="py-3 px-4">{{ $subscription->shop->name }}</td>
                                            <td class="py-3 px-4">{{ $subscription->plan->name }}</td>
                                            <td class="py-3 px-4">${{ number_format($subscription->amount, 2) }}</td>
                                            <td class="py-3 px-4">{{ $subscription->payment_method }}</td>
                                            <td class="py-3 px-4">{{ $subscription->created_at->format('d/m/Y H:i') }}</td>
                                            <td class="py-3 px-4">
                                                <a href="{{ route('admin.subscriptions.show', $subscription->id) }}" class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300 bg-blue-100 hover:bg-blue-200 dark:bg-blue-900 dark:hover:bg-blue-800 px-3 py-1 rounded-md text-sm">Voir</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                        <div class="mt-4">
                            {{ $pendingSubscriptions->links() }}
                        </div>
                    @else
                        <div class="alert alert-info">
                            Il n'y a pas d'abonnements en attente d'approbation.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
