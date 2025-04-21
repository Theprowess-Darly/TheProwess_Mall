<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-green-950 dark:text-green-300 leading-tight">
                {{ __('Détails de l\'utilisateur') }}
            </h2>
            <a href="{{ route('admin.users.index') }}" class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 transition-colors duration-200">
                Retour aux utilisateurs
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-green-100 dark:bg-gray-800">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-700 overflow-hidden shadow-md rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- User Avatar -->
                        <div class="md:col-span-1">
                            <div class="bg-gray-100 dark:bg-gray-800 rounded-lg p-6 flex flex-col items-center">
                                <div class="w-32 h-32 rounded-full overflow-hidden bg-gray-300 dark:bg-gray-600 mb-4">
                                    @if($user->profile_photo_path)
                                        <img src="{{ asset('storage/' . $user->profile_photo_path) }}" alt="{{ $user->name }}" class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200 text-4xl font-bold">
                                            {{ strtoupper(substr($user->name, 0, 1)) }}
                                        </div>
                                    @endif
                                </div>
                                <h3 class="text-xl font-semibold text-green-950 dark:text-green-300 mb-1">{{ $user->name }}</h3>
                                <p class="text-gray-600 dark:text-gray-400 mb-4">{{ $user->email }}</p>
                                
                                <div class="w-full mt-2">
                                    @if($user->role == 'admin')
                                        <div class="bg-purple-100 dark:bg-purple-900 text-purple-800 dark:text-purple-200 text-center py-2 px-4 rounded-full mb-2">
                                            Administrateur
                                        </div>
                                    @elseif($user->role == 'Marchand')
                                        <div class="bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 text-center py-2 px-4 rounded-full mb-2">
                                            Vendeur
                                        </div>
                                    @elseif($user->role == 'livreur')
                                        <div class="bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200 text-center py-2 px-4 rounded-full mb-2">
                                            Livreur
                                        </div>
                                    @else
                                        <div class="bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-200 text-center py-2 px-4 rounded-full mb-2">
                                            Client
                                        </div>
                                    @endif
                                </div>
                                
                                <div class="flex space-x-2 mt-4 w-full">
                                    <a href="{{ route('admin.users.edit', $user->id) }}" class="flex-1 px-4 py-2 bg-yellow-600 text-white text-center rounded-md hover:bg-yellow-700 transition-colors duration-200">
                                        Modifier
                                    </a>
                                    @if(auth()->id() !== $user->id)
                                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="flex-1">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="w-full px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 transition-colors duration-200" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur?')">
                                                Supprimer
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        <!-- User Details -->
                        <div class="md:col-span-2">
                            <div class="bg-white dark:bg-gray-700 rounded-lg">
                                <div class="border-b border-gray-200 dark:border-gray-600 pb-4 mb-4">
                                    <h4 class="text-lg font-semibold text-green-950 dark:text-green-300 mb-4">Informations personnelles</h4>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div>
                                            <p class="mb-2"><span class="font-medium">ID:</span> {{ $user->id }}</p>
                                            <p class="mb-2"><span class="font-medium">Nom:</span> {{ $user->name }}</p>
                                            <p class="mb-2"><span class="font-medium">Email:</span> {{ $user->email }}</p>
                                            <p class="mb-2"><span class="font-medium">Rôle:</span> 
                                                @if($user->role == 'admin')
                                                    Administrateur
                                                @elseif($user->role == 'Marchand')
                                                    Vendeur
                                                @elseif($user->role == 'livreur')
                                                    Livreur
                                                @else
                                                    Client
                                                @endif
                                            </p>
                                        </div>
                                        <div>
                                            <p class="mb-2"><span class="font-medium">Date d'inscription:</span> {{ $user->created_at->format('d/m/Y H:i') }}</p>
                                            <p class="mb-2"><span class="font-medium">Dernière mise à jour:</span> {{ $user->updated_at->format('d/m/Y H:i') }}</p>
                                            <p class="mb-2"><span class="font-medium">Email vérifié:</span> 
                                                @if($user->email_verified_at)
                                                    <span class="text-green-600 dark:text-green-400">{{ $user->email_verified_at->format('d/m/Y H:i') }}</span>
                                                @else
                                                    <span class="text-red-600 dark:text-red-400">Non vérifié</span>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                
                                @if($user->role == 'Marchand')
                                    <div class="border-b border-gray-200 dark:border-gray-600 pb-4 mb-4">
                                        <h4 class="text-lg font-semibold text-green-950 dark:text-green-300 mb-4">Boutiques</h4>
                                        @if($user->shops && $user->shops->count() > 0)
                                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                                @foreach($user->shops as $shop)
                                                    <div class="bg-gray-50 dark:bg-gray-800 p-4 rounded-lg">
                                                        <h5 class="font-medium text-green-800 dark:text-green-300 mb-2">{{ $shop->name }}</h5>
                                                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">{{ $shop->description }}</p>
                                                        <p class="text-sm"><span class="font-medium">Statut:</span> 
                                                            @if($shop->status == 'active')
                                                                <span class="text-green-600 dark:text-green-400">Actif</span>
                                                            @elseif($shop->status == 'pending')
                                                                <span class="text-yellow-600 dark:text-yellow-400">En attente</span>
                                                            @elseif($shop->status == 'suspended')
                                                                <span class="text-red-600 dark:text-red-400">Suspendu</span>
                                                            @else
                                                                <span class="text-gray-600 dark:text-gray-400">{{ $shop->status }}</span>
                                                            @endif
                                                        </p>
                                                        <a href="{{ route('admin.shops.show', $shop->id) }}" class="text-green-600 dark:text-green-400 hover:underline text-sm">Voir la boutique</a>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @else
                                            <p class="text-gray-600 dark:text-gray-400">Aucune boutique associée à cet utilisateur.</p>
                                        @endif
                                    </div>
                                @endif
                                
                                <div>
                                    <h4 class="text-lg font-semibold text-green-950 dark:text-green-300 mb-4">Activité récente</h4>
                                    <div class="bg-gray-50 dark:bg-gray-800 p-4 rounded-lg">
                                        <p class="text-gray-600 dark:text-gray-400">Les informations d'activité seront disponibles prochainement.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>