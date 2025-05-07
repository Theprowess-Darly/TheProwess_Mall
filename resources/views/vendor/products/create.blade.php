<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Nouveau Produit') }}
        </h2>
    </x-slot>

    <div class="container mx-auto px-4 py-8">
        <h2 class="text-2xl font-bold mb-6 text-blue-950 dark:text-blue-300">Ajouter un Produit</h2>
    
        <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6">
            <form action="{{ route('vendor.products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                
                <div class="mb-4">
                    <label for="category_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Catégorie</label>
                    <select name="category_id" id="category_id" class="mt-1 block w-full p-2.5 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-950 focus:border-blue-950 dark:bg-gray-700 dark:text-white" required>
                        <option value="">-- Choisir une catégorie --</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Nom du Produit</label>
                    <input type="text" id="name" name="name" class="mt-1 block w-full p-2.5 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-950 focus:border-blue-950 dark:bg-gray-700 dark:text-white" required>
                </div>
    
                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Description</label>
                    <textarea id="description" name="description" class="mt-1 block w-full p-2.5 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-950 focus:border-blue-950 dark:bg-gray-700 dark:text-white" rows="4" required></textarea>
                </div>
    
                <div class="mb-4">
                    <label for="price" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Prix (FCFA)</label>
                    <input type="number" id="price" name="price" class="mt-1 block w-full p-2.5 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-950 focus:border-blue-950 dark:bg-gray-700 dark:text-white" required>
                </div>
    
                <div class="mb-4">
                    <label for="stock" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Stock</label>
                    <input type="number" id="stock" name="stock" class="mt-1 block w-full p-2.5 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-950 focus:border-blue-950 dark:bg-gray-700 dark:text-white" required>
                </div>
    
                <div class="mb-4">
                    <label for="image" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Image du Produit</label>
                    <input type="file" id="image" name="image_url" class="mt-1 block w-full p-2.5 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-950 focus:border-blue-950 dark:bg-gray-700 dark:text-white" accept="image/*" required>
                </div>
                
                <input type="hidden" name="status" value="pending">
    
                <div class="flex justify-end">
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-yellow-700 focus:ring-offset-2 transition-colors">
                        Ajouter le produit
                    </button>
                </div>
            </form>
        </div>
    </div>   

</x-app-layout>