<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-green-950 dark:text-green-300 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    {{-- Create a new category --}}
    <div class="bg-green-300  dark:bg-gray-700 overflow-hidden shadow-md  p-6">
        @if($errors->any())
            <div class="bg-red-600 text-white p-3 rounded mb-4">
                @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form action="{{ route('admin.categories.store') }}" method="POST" class="space-y-6 flex space-x-4 justify-between w-full">
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

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <table class="w-full table-auto text-sm text-left text-gray-700 dark:text-gray-100">
                    <thead>
                        <tr class="bg-green-200 dark:bg-green-900">
                            <th class="px-4 py-2">Nom</th>
                            <th class="px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Action Buttons --}}
                        @foreach($categories as $category)
                            <tr class="border-b dark:border-gray-600">
                                <td class="px-4 py-2">{{ $category->name }}</td>
                                <td class="px-4 py-2">
                                    <a href="#" onclick="openModal({{ $category->id }}, '{{ addslashes($category->name) }}')" class="text-blue-600 dark:text-blue-400 hover:underline">
                                        Modifier
                                    </a>
                                    
                                    <a href="#" onclick="confirmDelete({{ $category->id }})" class="text-red-600 dark:text-red-400 hover:underline ml-2">
                                        Supprimer
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{-- Pagination --}}
                <div class="mt-4">
                    {{ $categories->links() }}
                </div>

                {{-- Edit Modal --}}
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

                <!-- Delete Confirmation Modal -->
                <div id="deleteCategoryModal" class="fixed inset-0 z-50 bg-black bg-opacity-50 hidden justify-center items-center">
                    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-full max-w-md relative">
                        <button onclick="closeDeleteModal()" class="absolute top-2 right-2 text-gray-500 hover:text-gray-800">&times;</button>
                        <h3 class="text-lg font-semibold text-green-950 dark:text-green-300 mb-4">Confirmer la suppression</h3>
                        <p class="text-gray-800 dark:text-gray-300 mb-6">Êtes-vous sûr de vouloir supprimer cette catégorie ?</p>
                        <div class="flex justify-end space-x-4">
                            <button onclick="closeDeleteModal()" class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500">Annuler</button>
                            <button onclick="deleteCategory()" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">Supprimer</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- CSRF Meta Tag --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Modal Scripts --}}
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

    <script>
        document.getElementById('editCategoryForm').addEventListener('submit', async function (e) {
            e.preventDefault();

            const form = e.target;
            const action = form.action;
            const formData = new FormData(form);

            try {
                const response = await fetch(action, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Accept': 'application/json'
                    },
                    body: formData
                });

                if (response.ok) {
                    closeModal();
                    location.reload();
                } else {
                    const data = await response.json();
                    alert('Erreur: ' + (data.message || 'une erreur s’est produite.'));
                }
            } catch (error) {
                console.error('Request failed', error);
                alert('Une erreur s’est produite.');
            }
        });
    </script>

    <script>
        let categoryIdToDelete = null;

        function confirmDelete(id) {
            categoryIdToDelete = id;
            document.getElementById('deleteCategoryModal').classList.remove('hidden');
            document.getElementById('deleteCategoryModal').classList.add('flex');
        }

        function closeDeleteModal() {
            categoryIdToDelete = null;
            document.getElementById('deleteCategoryModal').classList.add('hidden');
            document.getElementById('deleteCategoryModal').classList.remove('flex');
        }

        async function deleteCategory() {
            if (!categoryIdToDelete) return;

            try {
                const response = await fetch(`/admin/categories/${categoryIdToDelete}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Accept': 'application/json'
                    }
                });

                if (response.ok) {
                    closeDeleteModal();
                    location.reload(); // Reload to reflect deletion
                } else {
                    const data = await response.json();
                    alert('Erreur: ' + (data.message || 'une erreur s’est produite.'));
                }
            } catch (error) {
                console.error('Request failed', error);
                alert('Une erreur s’est produite.');
            }
        }
    </script>

</x-app-layout>
