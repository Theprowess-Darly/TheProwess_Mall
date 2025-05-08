@extends('layouts.app')

@section('title', 'Paiement')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-6">Finaliser votre commande</h1>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="md:col-span-2">
                <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                    <h2 class="text-xl font-bold mb-4">Informations de livraison</h2>
                    
                    <form id="checkout-form" method="POST" action="{{ route('payment.process') }}">
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
                        
                        <!-- Champs cachés pour le traitement du paiement -->
                        <input type="hidden" id="cart_data" name="cart_data" value="{{ json_encode(Session::get('cart', [])) }}">
                        <input type="hidden" id="total_amount" name="total_amount" value="{{ $totalPrice ?? 0 }}">
                        <input type="hidden" id="transaction_id" name="transaction_id" value="{{ 'TPM-' . time() . '-' . auth()->id() }}">
                        
                        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                            <h2 class="text-xl font-bold mb-4">Mode de paiement</h2>
                            
                            <div class="space-y-4">
                                
                                <div class="flex items-center">
                                    <input type="radio" id="payment_method_monetbil" name="payment_method" value="monetbil" class="mr-2" checked>
                                    <label for="payment_method_monetbil" class="flex items-center">
                                        <span>Notchpay</span>
                                        <span class="ml-2 text-xs text-gray-600">(Orange Money, MTN Mobile Money, Express Union Mobile, YomeeMoney, Paypal etc.)</span>
                                    </label>
                                </div>

                                <div class="flex items-center">
                                    <input type="radio" id="payment_method_cash" name="payment_method" value="cash" class="mr-2">
                                    <label for="payment_method_cash">Paiement à la livraison</label>
                                </div>
                                
                                <div id="monetbil-details" class="hidden ml-6 p-4 bg-gray-50 rounded-md">
                                    <p class="text-sm text-gray-600 mb-2">
                                        Vous serez redirigé vers la plateforme sécurisée Monetbil pour finaliser votre paiement.
                                    </p>
                                    <div class="flex flex-wrap gap-2 mt-2">
                                        <img loading="lazy" src="/images/payment/om.png" alt="Orange Money" class="h-8">
                                        <img loading="lazy" src="/images/payment/momo.png" alt="MTN Mobile Money" class="h-8">
                                        <img loading="lazy" src="/images/payment/paypal.png" alt="Moov Money" class="h-8">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <button type="submit" id="submit-order" class="w-full bg-green-600 text-white py-2 px-4 rounded hover:bg-green-700">
                            Confirmer la commande
                        </button>
                    </form>
                </div>
            </div>
            
            <!-- Cart Summary Section -->
            <div class="md:col-span-1">
                <div class="bg-white rounded-lg shadow-md p-6 sticky top-6">
                    <h2 class="text-xl font-bold mb-4">Résumé de la commande</h2>
                    <div id="checkout-summary">
                        @if(isset($cartItems) && count($cartItems) > 0)
                            <div class="space-y-4">
                                <div class="max-h-60 overflow-y-auto">
                                    @foreach($cartItems as $productId => $item)
                                    <div class="flex items-center py-2 border-b">
                                        <div class="flex-shrink-0 w-12 h-12">
                                            @if(isset($item['image']))
                                                <img src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['name'] }}" class="w-full h-full object-cover rounded">
                                            @else
                                                <div class="w-full h-full bg-gray-200 rounded flex items-center justify-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                    </svg>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="ml-4 flex-grow">
                                            <h3 class="text-sm font-medium">{{ $item['name'] }}</h3>
                                            <p class="text-xs text-gray-500">{{ $item['quantity'] }} x {{ number_format($item['price'], 0, ',', ' ') }} FCFA</p>
                                        </div>
                                        <div class="text-right">
                                            <p class="text-sm font-semibold">{{ number_format($item['price'] * $item['quantity'], 0, ',', ' ') }} FCFA</p>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                
                                <div class="border-t pt-4">
                                    <div class="flex justify-between mb-2">
                                        <span class="text-gray-600">Sous-total</span>
                                        <span>{{ number_format($totalPrice, 0, ',', ' ') }} FCFA</span>
                                    </div>
                                    <div class="flex justify-between mb-2">
                                        <span class="text-gray-600">Frais de livraison</span>
                                        <span>{{ number_format(1000, 0, ',', ' ') }} FCFA</span>
                                    </div>
                                    <div class="flex justify-between font-bold">
                                        <span>Total</span>
                                        <span>{{ number_format($totalPrice + 1000, 0, ',', ' ') }} FCFA</span>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="text-center py-4">
                                <p class="text-gray-500">Votre panier est vide</p>
                                <a href="/" class="mt-4 inline-block px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                                    Continuer vos achats
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection