@extends('layouts.vendor')

@section('content')
<div class="container mx-auto p-4">
    <h2 class="text-2xl text-green-950 font-bold mb-4">Mes Produits</h2>

    <div class="mb-4 bg-green-600">
        <a href="{{ route('vendor.products.create') }}" class="bg-green-600 text-white px-4 py-2 rounded">Ajouter un Produit</a>
    </div>

    @if($products->isEmpty())
        <p class="text-sm text-gray-500">Aucun produit trouvé.</p>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($products as $product)
                <div class="border p-4 rounded">
                    <img src="{{ asset('storage/' . $product->image_url) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover rounded mb-4">
                    <h3 class="text-xl font-semibold">{{ $product->name }}</h3>
                    <p class="text-sm text-gray-600">{{ Str::limit($product->description, 100) }}</p>
                    <p class="font-bold mt-2">{{ $product->price }} €</p>
                    <a href="#" class="text-green-600 hover:text-green-800">Voir plus</a>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
