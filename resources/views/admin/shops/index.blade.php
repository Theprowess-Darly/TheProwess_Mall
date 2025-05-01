<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestion des Boutiques') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between mb-6">
                        <h3 class="text-lg font-semibold">Liste des Boutiques</h3>
                        <div>
                            <a href="{{ route('admin.shops.pending') }}" class="px-4 py-2 bg-yellow-700 text-white rounded-md hover:bg-yellow-800">
                                Boutiques en attente ({{ \App\Models\Shop::where('status', 'pending')->count() }})
                            </a>
                        </div>
                    </div>

                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead class="bg-green-950 text-white">
                                <tr>
                                    <th class="py-3 px-4 text-left">ID</th>
                                    <th class="py-3 px-4 text-left">Nom</th>
                                    <th class="py-3 px-4 text-left">Vendeur</th>
                                    <th class="py-3 px-4 text-left">Statut</th>
                                    <th class="py-3 px-4 text-left">Abonnement</th>
                                    <th class="py-3 px-4 text-left">Date de création</th>
                                    <th class="py-3 px-4 text-left">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @forelse ($shops as $shop)
                                    <tr>
                                        <td class="py-3 px-4">{{ $shop->id }}</td>
                                        <td class="py-3 px-4">{{ $shop->name }}</td>
                                        <td class="py-3 px-4">{{ $shop->user->name }}</td>
                                        <td class="py-3 px-4">
                                            @if ($shop->status === 'approved')
                                                <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs">Approuvée</span>
                                            @elseif ($shop->status === 'pending')
                                                <span class="px-2 py-1 bg-yellow-100 text-yellow-800 rounded-full text-xs">En attente</span>
                                            @elseif ($shop->status === 'rejected')
                                                <span class="px-2 py-1 bg-red-100 text-red-800 rounded-full text-xs">Rejetée</span>
                                            @elseif ($shop->status === 'suspended')
                                                <span class="px-2 py-1 bg-gray-100 text-gray-800 rounded-full text-xs">Suspendue</span>
                                            @endif
                                        </td>
                                        <td class="py-3 px-4">
                                            @php
                                                $activeSubscription = $shop->subscriptions()->where('status', 'active')->first();
                                            @endphp
                                            
                                            @if ($activeSubscription)
                                                <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs">
                                                    {{ $activeSubscription->plan->name }} - Expire le {{ $activeSubscription->ends_at->format('d/m/Y') }}
                                                </span>
                                            @elseif ($shop->subscriptions()->where('status', 'pending')->first())
                                                <span class="px-2 py-1 bg-yellow-100 text-yellow-800 rounded-full text-xs">En attente d'approbation</span>
                                            @elseif ($shop->subscriptions()->where('status', 'expired')->first())
                                                <span class="px-2 py-1 bg-red-100 text-red-800 rounded-full text-xs">Expiré</span>
                                            @else
                                                <span class="px-2 py-1 bg-gray-100 text-gray-800 rounded-full text-xs">Aucun abonnement</span>
                                            @endif
                                        </td>
                                        <td class="py-3 px-4">{{ $shop->created_at->format('d/m/Y H:i') }}</td>
                                        <td class="py-3 px-4">
                                            <div class="flex space-x-2">
                                                <a href="{{ route('admin.shops.show', $shop) }}" class="px-3 py-1 bg-blue-500 text-white rounded-md hover:bg-blue-600 text-sm">
                                                    Détails
                                                </a>
                                                
                                                @if ($shop->status === 'pending')
                                                    <form action="{{ route('admin.shops.approve', $shop) }}" method="POST" class="inline">
                                                        @csrf
                                                        <button type="submit" class="px-3 py-1 bg-green-500 text-white rounded-md hover:bg-green-600 text-sm">
                                                            Approuver
                                                        </button>
                                                    </form>
                                                    
                                                    <button onclick="openRejectModal({{ $shop->id }})" class="px-3 py-1 bg-red-500 text-white rounded-md hover:bg-red-600 text-sm">
                                                        Rejeter
                                                    </button>
                                                @endif
                                                
                                                @if ($shop->status === 'approved')
                                                    <button onclick="openSuspendModal({{ $shop->id }})" class="px-3 py-1 bg-yellow-700 text-white rounded-md hover:bg-yellow-800 text-sm">
                                                        Suspendre
                                                    </button>
                                                @endif
                                                
                                                @if ($shop->status === 'suspended')
                                                    <form action="{{ route('admin.shops.reactivate', $shop) }}" method="POST" class="inline">
                                                        @csrf
                                                        <button type="submit" class="px-3 py-1 bg-green-500 text-white rounded-md hover:bg-green-600 text-sm">
                                                            Réactiver
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="py-3 px-4 text-center">Aucune boutique trouvée</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="mt-4">
                        {{ $shops->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Modal de rejet -->
    <div id="rejectModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3 text-center">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Rejeter la boutique</h3>
                <form id="rejectForm" method="POST" class="mt-2">
                    @csrf
                    <div class="mt-2 px-7 py-3">
                        <label for="rejection_reason" class="block text-left text-sm font-medium text-gray-700">Raison du rejet</label>
                        <textarea id="rejection_reason" name="rejection_reason" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"></textarea>
                    </div>
                    <div class="items-center px-4 py-3">
                        <button type="button" onclick="closeRejectModal()" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 mr-2">
                            Annuler
                        </button>
                        <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600">
                            Confirmer
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <!-- Modal de suspension -->
    <div id="suspendModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3 text-center">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Suspendre la boutique</h3>
                <form id="suspendForm" method="POST" class="mt-2">
                    @csrf
                    <div class="mt-2 px-7 py-3">
                        <label for="suspension_reason" class="block text-left text-sm font-medium text-gray-700">Raison de la suspension</label>
                        <textarea id="suspension_reason" name="suspension_reason" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"></textarea>
                    </div>
                    <div class="items-center px-4 py-3">
                        <button type="button" onclick="closeSuspendModal()" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 mr-2">
                            Annuler
                        </button>
                        <button type="submit" class="px-4 py-2 bg-yellow-700 text-white rounded-md hover:bg-yellow-800">
                            Confirmer
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <script>
        function openRejectModal(shopId) {
            document.getElementById('rejectForm').action = `/admin/shops/${shopId}/reject`;
            document.getElementById('rejectModal').classList.remove('hidden');
        }
        
        function closeRejectModal() {
            document.getElementById('rejectModal').classList.add('hidden');
        }
        
        function openSuspendModal(shopId) {
            document.getElementById('suspendForm').action = `/admin/shops/${shopId}/suspend`;
            document.getElementById('suspendModal').classList.remove('hidden');
        }
        
        function closeSuspendModal() {
            document.getElementById('suspendModal').classList.add('hidden');
        }
    </script>
</x-app-layout>
