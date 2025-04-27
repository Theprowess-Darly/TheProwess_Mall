@extends('layouts.app')

@section('title', 'Paiement')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Finaliser votre commande</h1>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="md:col-span-2">
            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                <h2 class="text-xl font-bold mb-4">Informations de livraison</h2>
                
                <form id="checkout-form" method="POST" action="{{ route('orders.store') }}">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label for="first_name" class="block text-sm font-medium text-gray-700 mb-1">Prénom</label>
                            <input type="text" id="first_name" name="first_name" value="{{ auth()->user()->name }}" class="w-full px-3 py-2 border rounded-md" required>
                        </div>
                        <div>
                            <label for="last_name" class="block text-sm font-medium text-gray-700 mb-1">Nom</label>
                            <input type="text" id="last_name" name="last_name" class="w-full px-3 py-2 border rounded-md" required>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Adresse</label>
                        <input type="text" id="address" name="address" value="{{ auth()->user()->address }}" class="w-full px-3 py-2 border rounded-md" required>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                        <div>
                            <label for="city" class="block text-sm font-medium text-gray-700 mb-1">Ville</label>
                            <input type="text" id="city" name="city" value="{{ auth()->user()->city }}" class="w-full px-3 py-2 border rounded-md" required>
                        </div>
                        <div>
                            <label for="postal_code" class="block text-sm font-medium text-gray-700 mb-1">Code postal</label>
                            <input type="text" id="postal_code" name="postal_code" value="{{ auth()->user()->postal_code }}" class="w-full px-3 py-2 border rounded-md" required>
                        </div>
                        <div>
                            <label for="country" class="block text-sm font-medium text-gray-700 mb-1">Pays</label>
                            <input type="text" id="country" name="country" value="{{ auth()->user()->country }}" class="w-full px-3 py-2 border rounded-md" required>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Téléphone</label>
                        <input type="tel" id="phone" name="phone" value="{{ auth()->user()->phone }}" class="w-full px-3 py-2 border rounded-md" required>
                    </div>
                    
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" id="email" name="email" value="{{ auth()->user()->email }}" class="w-full px-3 py-2 border rounded-md" required>
                    </div>
                    
                    <div class="mb-4">
                        <label for="notes" class="block text-sm font-medium text-gray-700 mb-1">Notes (optionnel)</label>
                        <textarea id="notes" name="notes" rows="3" class="w-full px-3 py-2 border rounded-md"></textarea>
                    </div>
                    
                    <!-- Hidden field for cart data -->
                    <input type="hidden" id="cart_data" name="cart_data">
                    
                    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                        <h2 class="text-xl font-bold mb-4">Mode de paiement</h2>
                        
                        <div class="space-y-4">
                            <div class="flex items-center">
                                <input type="radio" id="payment_method_cash" name="payment_method" value="cash" class="mr-2" checked>
                                <label for="payment_method_cash">Paiement à la livraison</label>
                            </div>
                            
                            <div class="flex items-center">
                                <input type="radio" id="payment_method_orange" name="payment_method" value="orange_money" class="mr-2">
                                <label for="payment_method_orange">Orange Money</label>
                            </div>
                            
                            <div class="flex items-center">
                                <input type="radio" id="payment_method_mtn" name="payment_method" value="mtn_momo" class="mr-2">
                                <label for="payment_method_mtn">MTN Mobile Money</label>
                            </div>
                            
                            <div class="flex items-center">
                                <input type="radio" id="payment_method_moov" name="payment_method" value="moov_money" class="mr-2">
                                <label for="payment_method_moov">Moov Money</label>
                            </div>
                        </div>
                    </div>
                    
                    <button type="submit" class="w-full bg-green-600 text-white py-2 px-4 rounded hover:bg-green-700">
                        Confirmer la commande
                    </button>
                </form>
            </div>
        </div>
        
        <div class="md:col-span-1">
            <div class="bg-white rounded-lg shadow-md p-6 sticky top-4">
                <h2 class="text-xl font-bold mb-4">Résumé de la commande</h2>
                <div id="order-summary">
                    <!-- Order summary will be rendered by JavaScript -->
                    <div class="text-center py-4">
                        <i class="fas fa-spinner fa-spin text-3xl text-gray-300 mb-2"></i>
                        <p class="text-gray-500">Chargement...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get cart from localStorage
        const cart = JSON.parse(localStorage.getItem('cart')) || [];
        
        // Render order summary
        renderOrderSummary(cart);
        
        // Set cart data in hidden field
        document.getElementById('cart_data').value = JSON.stringify(cart);
        
        // Handle form submission
        document.getElementById('checkout-form').addEventListener('submit', function(e) {
            if (cart.length === 0) {
                e.preventDefault();
                alert('Votre panier est vide. Veuillez ajouter des produits avant de passer commande.');
            }
        });
    });
    
    function renderOrderSummary(cart) {
        const summaryContainer = document.getElementById('order-summary');
        
        if (cart.length === 0) {
            summaryContainer.innerHTML = `
                <div class="text-center py-4">
                    <p class="text-gray-500">Votre panier est vide</p>
                    <a href="/" class="mt-2 inline-block text-green-600 hover:underline">
                        Continuer vos achats
                    </a>
                </div>
            `;
            return;
        }
        
        // Calculate totals
        const subtotal = cart.reduce((total, item) => total + (item.price * item.quantity), 0);
        const shipping = 1000; // Example shipping cost
        const total = subtotal + shipping;
        
        // Render summary
        summaryContainer.innerHTML = `
            <div class="space-y-4">
                <div class="max-h-60 overflow-y-auto">
                    ${cart.map(item => `
                        <div class="flex items-center py-2 border-b">
                            <div class="flex-grow">
                                <p class="font-medium">${item.name}</p>
                                <p class="text-sm text-gray-600">Qté: ${item.quantity} x ${item.price.toLocaleString()} FCFA</p>
                            </div>
                            <p class="font-semibold">${(item.price * item.quantity).toLocaleString()} FCFA</p>
                        </div>
                    `).join('')}
                </div>
                
                <div class="space-y-2 pt-2">
                    <div class="flex justify-between">
                        <span>Sous-total</span>
                        <span>${subtotal.toLocaleString()} FCFA</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Frais de livraison</span>
                        <span>${shipping.toLocaleString()} FCFA</span>
                    </div>
                    <div class="border-t pt-2 mt-2">
                        <div class="flex justify-between font-bold">
                            <span>Total</span>
                            <span>${total.toLocaleString()} FCFA</span>
                        </div>
                    </div>
                </div>
            </div>
        `;
    }
</script>
@endsection