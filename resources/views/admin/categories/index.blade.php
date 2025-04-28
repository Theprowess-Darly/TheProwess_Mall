<x-app-layout>
        
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-green-950 dark:text-green-300 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>
    {{-- create a new category --}}
    <div class="bg-green-300 dark:bg-gray-700 overflow-hidden shadow-md rounded-lg p-6">
        @if($errors->any())
            <div class="bg-red-600 text-white p-3 rounded mb-4">
                @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form action="{{ route('admin.categories.store') }}" method="POST" class="space-y-6 flex space-x-4 justify-between w-full ">
            @csrf
            <div class="w-3/4">
                <label for="name" class="block text-sm font-medium text-green-950 dark:text-green-300">
                    Nom de la catégorie
                </label>
                <input type="text" name="name" id="name" required
                       class="mt-1 block w-full rounded-md border-green-700 shadow-sm focus:border-green-800 focus:ring focus:ring-green-200 dark:bg-gray-800 dark:text-white dark:border-green-500" />
            </div>

            <div class="pt-6 w-1/4">
                <button type="submit"
                        class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                    Créer la catégorie
                </button>
            </div>
        </form>
    </div>
    {{-- List all Categories --}}
    <div class="py-12 bg-green-100 dark:bg-gray-800">
        <div class="mb-6 pl-10 justify-self-end">
            <a href="{{ route('admin.categories.create') }}"
               class="inline-block bg-green-600 hover:bg-green-700 text-white font-semibold px-4 py-2 rounded shadow">
                + Créer une nouvelle catégorie
            </a>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Your categories listing goes here -->
            <div class="bg-white dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <table class="w-full table-auto text-sm text-left text-gray-700 dark:text-gray-100">
                    <thead>
                        <tr class="bg-green-200 dark:bg-green-900">
                            <th class="px-4 py-2">Nom</th>
                            <th class="px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                            <tr class="border-b dark:border-gray-600">
                                <td class="px-4 py-2">{{ $category->name }}</td>
                                <td class="px-4 py-2">
                                    <a href="#" onclick="openModal({{ $category->id }}, '{{ $category->name }}')"
                                            class="text-blue-600 dark:text-blue-400 hover:underline">
                                        Modifier
                                    </a>
                                    <a href="#" class="text-red-600 dark:text-red-400 hover:underline ml-2">Supprimer</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

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

            </div>
        </div>
    </div>
</x-app-layout>
<script>
    function openModal(id, name) {
        document.getElementById('edit-name').value = name;
        const form = document.getElementById('editCategoryForm');
        form.action = `/admin/categories/${id}`;
        document.getElementById('editCategoryModal').classList.remove('hidden');
        document.getElementById('editCategoryModal').classList.add('flex');
    }

    function closeModal() {
        document.getElementById('editCategoryModal').classList.add('hidden');
        document.getElementById('editCategoryModal').classList.remove('flex');
    }
</script>
