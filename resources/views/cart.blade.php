@extends('layouts.app')

@section('title', 'Panier')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Panier d'achat</h1>
    
    <div id="cart-container">
        <!-- Cart content will be rendered by JavaScript -->
        <div class="text-center py-8">
            <i class="fas fa-spinner fa-spin text-5xl text-gray-300 mb-4"></i>
            <p class="text-xl text-gray-500">Chargement de votre panier...</p>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    @vite('resources/js/cart.js')
@endpush