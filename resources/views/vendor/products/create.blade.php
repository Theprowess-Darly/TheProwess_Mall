@extends('layouts.vendor')

@section('content')
<div class="container mx-auto p-4">
    <h2 class="text-2xl font-bold mb-4">Ajouter un Produit</h2>

    <form action="{{ route('vendor.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="category_id">Category</label>
        <select name="category_id" id="category_id" required>
            <option value="">-- Choose Category --</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        
        <div class="mb-4">
            <label for="name" class="block text-sm font-semibold">Nom du Produit</label>
            <input type="text" id="name" name="name" class="mt-1 block w-full p-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-semibold">Description</label>
            <textarea id="description" name="description" class="mt-1 block w-full p-2 border rounded" rows="4" required></textarea>
        </div>

        <div class="mb-4">
            <label for="price" class="block text-sm font-semibold">Prix (€)</label>
            <input type="number" id="price" name="price" class="mt-1 block w-full p-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label for="stock" class="block text-sm font-semibold">Stock</label>
            <input type="number" id="stock" name="stock" class="mt-1 block w-full p-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label for="image" class="block text-sm font-semibold">Image du Produit</label>
            <input type="file" id="image" name="image_url" class="mt-1 block w-full p-2 border rounded" accept="image/*" required>
        </div>

        <div class="mb-4">
            <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded">Ajouter le Produit</button>
        </div>
    </form>
</div>
@endsection
