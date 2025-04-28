<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-green-950 dark:text-green-300 leading-tight">
            {{ __('Créer une catégorie') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-green-100 dark:bg-gray-800">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white flex dark:bg-gray-700 overflow-hidden shadow-md rounded-lg p-6">
                @if($errors->any())
                    <div class="bg-red-600 text-white p-3 rounded mb-4">
                        @foreach($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')
                    <div>
                        <label for="name" class="block text-sm font-medium text-green-950 dark:text-green-300">
                            Nom de la catégorie
                        </label>
                        <input type="text" name="name" id="name" required
                        value="{{ old('name', $category->name) }}"
                        class="mt-1 block w-full rounded-md border-green-700 shadow-sm focus:border-green-800 focus:ring focus:ring-green-200 dark:bg-gray-800 dark:text-white dark:border-green-500" />
                    </div>

                    <div>
                        <button type="submit"
                                class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                            Mettre à jour la catégorie
                        </button>
                
                    </div>
                </form>
            </div>
        </div>
    </div>
        <!-- Modal Structure -->
    <div id="editCategoryModal" class="fixed inset-0 z-50 bg-black bg-opacity-50 hidden justify-center items-center">
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-full max-w-md relative">
            <button onclick="closeModal()" class="absolute top-2 right-2 text-gray-500 hover:text-gray-800">&times;</button>
            <form id="editCategoryForm" method="POST" class="space-y-6">
                @csrf
                @method('PUT')
                <div>
                    <label for="edit-name" class="block text-sm font-medium text-green-950 dark:text-green-300">
                        Nom de la catégorie
                    </label>
                    <input type="text" name="name" id="edit-name" required
                        class="mt-1 block w-full rounded-md border-green-700 shadow-sm focus:border-green-800 focus:ring focus:ring-green-200 dark:bg-gray-700 dark:text-white dark:border-green-500" />
                </div>

                <div>
                    <button type="submit"
                            class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        Mettre à jour
                    </button>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>
