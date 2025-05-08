@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Notification container -->
    <div id="notification-container" class="fixed top-4 right-4 z-50 transform transition-transform duration-300 translate-x-full"></div>
    
    <h1 class="text-3xl font-bold text-green-900 dark:text-green-400 mb-6">Votre Panier</h1>

    <div id="cart-items-container" class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6">
        @if($cartItems && count($cartItems) > 0)
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-100 dark:bg-gray-700">
                        <tr>
                            <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700 dark:text-gray-200">Produit</th>
                            <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700 dark:text-gray-200">Prix</th>
                            <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700 dark:text-gray-200">Quantité</th>
                            <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700 dark:text-gray-200">Total</th>
                            <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700 dark:text-gray-200">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-600">
                        @foreach($cartItems as $productId => $item)
                            <tr class="cart-item-row hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                                <td class="px-4 py-4">
                                    <div class="flex items-center">
                                        @if(isset($item['image']))
                                            <img loading="lazy" src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['name'] }}" class="w-16 h-16 object-cover rounded-md mr-3">
                                        @else
                                            <div class="w-16 h-16 bg-gray-200 dark:bg-gray-700 rounded-md mr-3 flex items-center justify-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                            </div>
                                        @endif
                                        <div>
                                            <h3 class="font-medium text-gray-800 dark:text-gray-200">{{ $item['name'] }}</h3>
                                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                                Vendeur: {{ $item['shop_id'] ?? 'N/A' }}
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-4 text-gray-800 dark:text-gray-200">
                                    {{ number_format($item['price'], 0, ',', ' ') }} FCFA
                                </td>
                                <td class="px-4 py-4">
                                    <div class="flex items-center">
                                        <button class="quantity-btn decrease-btn bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-200 w-8 h-8 rounded-l-md flex items-center justify-center hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors" data-product-id="{{ $productId }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                                            </svg>
                                        </button>
                                        <input type="number"
                                            class="quantity w-14 h-8 text-center border-y border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white focus:outline-none focus:ring-1 focus:ring-green-500"
                                            value="{{ $item['quantity'] }}"
                                            min="1"
                                            data-product-id="{{ $productId }}"
                                            readonly
                                        >
                                        <button class="quantity-btn increase-btn bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-200 w-8 h-8 rounded-r-md flex items-center justify-center hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors" data-product-id="{{ $productId }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                                <td class="px-4 py-4 text-gray-800 dark:text-gray-200 font-medium item-total">
                                    {{ number_format($item['price'] * $item['quantity'], 0, ',', ' ') }} FCFA
                                </td>
                                <td class="px-4 py-4">
                                    <button class="remove-item-btn text-red-500 hover:text-red-700 dark:hover:text-red-400 transition-colors focus:outline-none" data-product-id="{{ $productId }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                            <td colspan="3" class="px-4 py-4 text-right font-semibold text-gray-700 dark:text-gray-200">Total:</td>
                            <td id="cart-total-price" class="px-4 py-4 font-bold text-green-700 dark:text-green-400">
                                {{ number_format($totalPrice, 0, ',', ' ') }} FCFA
                            </td>
                            <td></td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <div class="mt-8 flex justify-between items-center">
                <a href="{{ url('/') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 hover:bg-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-800 dark:text-gray-200 rounded-md transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Continuer vos achats
                </a>
                <a href="{{ route('checkout') }}" class="inline-flex items-center px-6 py-3 bg-green-600 hover:bg-green-700 text-white rounded-md transition-colors">
                    Passer à la caisse
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </a>
            </div>
        @else
            <div class="text-center py-12">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                <h3 class="text-xl font-medium text-gray-900 dark:text-gray-100 mb-2">Votre panier est vide</h3>
                <p class="text-gray-500 dark:text-gray-400 mb-8">Découvrez nos produits et ajoutez-les à votre panier</p>
                <a href="{{ url('/') }}" class="inline-flex items-center px-6 py-3 bg-green-600 hover:bg-green-700 text-white rounded-md transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                    Commencer vos achats
                </a>
            </div>
        @endif
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // --- CSRF Token Setup ---
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // --- Fonction pour afficher les notifications ---
        function showNotification(message, type = 'success') {
            // Créer l'élément de notification
            const notification = document.createElement('div');
            notification.className = `notification transform transition-all duration-300 ease-out flex items-center p-4 mb-4 rounded-lg shadow-lg ${type === 'success' ? 'bg-green-50 text-green-800 border-l-4 border-green-500' : 'bg-red-50 text-red-800 border-l-4 border-red-500'}`;
            
            // Icône en fonction du type
            let icon = '';
            if (type === 'success') {
                icon = '<svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>';
            } else {
                icon = '<svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path></svg>';
            }
            
            // Contenu de la notification
            notification.innerHTML = 
                <div class="flex items-center">
                    ${icon}
                    <p>${message}</p>
                </div>
                <button class="ml-auto text-gray-500 hover:text-gray-900 focus:outline-none">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
            ;
            
            // Ajouter au conteneur de notifications
            const container = document.getElementById('notification-container');
            container.appendChild(notification);
            
            // Animation d'entrée
            setTimeout(() => {
                container.classList.remove('translate-x-full');
                notification.classList.remove('translate-x-full');
            }, 10);
            
            // Bouton de fermeture
            const closeButton = notification.querySelector('button');
            closeButton.addEventListener('click', () => {
                notification.classList.add('opacity-0');
                setTimeout(() => {
                    notification.remove();
                    if (container.children.length === 0) {
                        container.classList.add('translate-x-full');
                    }
                }, 300);
            });
            
            // Auto-fermeture après 5 secondes
            setTimeout(() => {
                if (notification.parentNode) {
                    notification.classList.add('opacity-0');
                    setTimeout(() => {
                        notification.remove();
                        if (container.children.length === 0) {
                            container.classList.add('translate-x-full');
                        }
                    }, 300);
                }
            }, 5000);
        }

        // --- Fonction pour formater les prix ---
        function formatPrice(price) {
            return new Intl.NumberFormat('fr-FR').format(price) + ' FCFA';
        }

        // --- Fonction pour mettre à jour le total du panier ---
        function updateCartTotal() {
            let total = 0;
            document.querySelectorAll('.cart-item-row').forEach(row => {
                const price = parseFloat(row.querySelector('.item-total').getAttribute('data-price'));
                total += price;
            });
            document.getElementById('cart-total-price').textContent = formatPrice(total);
        }

        // --- Gestion des boutons de quantité ---
        document.querySelectorAll('.quantity-btn').forEach(button => {
            button.addEventListener('click', function() {
                const productId = this.getAttribute('data-product-id');
                const input = document.querySelector(`.item-quantity[data-product-id="${productId}"]`);
                let quantity = parseInt(input.value);
                
                if (this.classList.contains('decrease-btn') && quantity > 1) {
                    quantity--;
                } else if (this.classList.contains('increase-btn')) {
                    quantity++;
                }
                
                if (quantity !== parseInt(input.value)) {
                    input.value = quantity;
                    updateCartItem(productId, quantity);
                }
            });
        });

        // --- Fonction pour mettre à jour un élément du panier ---
        function updateCartItem(productId, quantity) {
            const row = document.querySelector(`.cart-item-row .item-quantity[data-product-id="${productId}"]`).closest('.cart-item-row');
            
            // Afficher un indicateur de chargement
            row.classList.add('opacity-50');
            
            $.ajax({
                url: '/cart/update/' + productId,
                method: 'POST',
                data: {
                    quantity: quantity
                },
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        // Mettre à jour l'affichage
                        const itemTotal = row.querySelector('.item-total');
                        itemTotal.textContent = formatPrice(response.itemTotal);
                        itemTotal.setAttribute('data-price', response.itemTotal);
                        
                        // Mettre à jour le total du panier
                        document.getElementById('cart-total-price').textContent = formatPrice(response.totalPrice);
                        
                        // Mettre à jour le compteur global du panier
                        if (document.getElementById('cart-count')) {
                            document.getElementById('cart-count').textContent = response.cartCount;
                        }
                        
                        // Afficher une notification
                        showNotification('Quantité mise à jour avec succès', 'success');
                    } else {
                        // Rétablir la quantité précédente
                        document.querySelector(`.item-quantity[data-product-id="${productId}"]`).value = response.currentQuantity || 1;
                        showNotification(response.message || 'Erreur lors de la mise à jour', 'error');
                    }
                },
                error: function(jqXHR) {
                    let errorMsg = 'Erreur lors de la mise à jour';
                    if (jqXHR.responseJSON && jqXHR.responseJSON.message) {
                        errorMsg = jqXHR.responseJSON.message;
                    }
                    showNotification(errorMsg, 'error');
                    
                    // Rétablir la quantité précédente
                    document.querySelector(`.item-quantity[data-product-id="${productId}"]`).value = document.querySelector(`.item-quantity[data-product-id="${productId}"]`).getAttribute('data-previous-quantity') || 1;
                },
                complete: function() {
                    // Supprimer l'indicateur de chargement
                    row.classList.remove('opacity-50');
                }
            });
        }

        // --- Gestion des boutons de suppression ---
        document.querySelectorAll('.remove-item-btn').forEach(button => {
            button.addEventListener('click', function() {
                const productId = this.getAttribute('data-product-id');
                const row = this.closest('.cart-item-row');
                
                if (confirm('Êtes-vous sûr de vouloir supprimer cet article ?')) {
                    // Afficher un indicateur de chargement
                    row.classList.add('opacity-50');
                    
                    $.ajax({
                        url: '/cart/remove/' + productId,
                        method: 'DELETE',
                        dataType: 'json',
                        success: function(response) {
                            if (response.success) {
                                // Animation de suppression
                                row.classList.add('transform', 'scale-95', 'opacity-0');
                                setTimeout(() => {
                                    row.remove();
                                    
                                    // Mettre à jour le total du panier
                                    document.getElementById('cart-total-price').textContent = formatPrice(response.totalPrice);
                                    
                                    // Mettre à jour le compteur global du panier
                                    if (document.getElementById('cart-count')) {
                                        document.getElementById('cart-count').textContent = response.cartCount;
                                    }
                                    
                                    // Si le panier est vide, recharger la page pour afficher le message de panier vide
                                    if (response.cartCount === 0) {
                                        location.reload();
                                    }
                                    
                                    // Afficher une notification
                                    showNotification('Article supprimé du panier', 'success');
                                }, 300);
                            } else {
                                row.classList.remove('opacity-50');
                                showNotification(response.message || 'Erreur lors de la suppression', 'error');
                            }
                        },
                        error: function(jqXHR) {
                            row.classList.remove('opacity-50');
                            let errorMsg = 'Erreur lors de la suppression';
                            if (jqXHR.responseJSON && jqXHR.responseJSON.message) {
                                errorMsg = jqXHR.responseJSON.message;
                            }
                            showNotification(errorMsg, 'error');
                        }
                    });
                }
            });
        });
    });
</script>
@endpush