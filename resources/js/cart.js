document.addEventListener('DOMContentLoaded', function() {
    // Initialize cart from localStorage or create empty cart
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    
    // Update cart count in the header
    updateCartCount();
    
    // Add event listeners to all "Add to Cart" buttons
    const addToCartButtons = document.querySelectorAll('.add-to-cart');
    addToCartButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Check if user is logged in
            const isLoggedIn = document.body.classList.contains('user-logged-in');
            
            if (!isLoggedIn) {
                // Show login prompt for visitors
                showLoginPrompt();
                return;
            }
            
            // Get product details from data attributes
            const productId = this.dataset.productId;
            const productName = this.dataset.productName;
            const productPrice = parseFloat(this.dataset.productPrice);
            const productImage = this.dataset.productImage;
            
            // Add product to cart
            addToCart(productId, productName, productPrice, productImage);
            
            // Show success message
            showNotification('Produit ajouté au panier!', 'success');
        });
    });
    
    // Function to add product to cart
    function addToCart(id, name, price, image, quantity = 1) {
        // Check if product already exists in cart
        const existingProductIndex = cart.findIndex(item => item.id === id);
        
        if (existingProductIndex > -1) {
            // Update quantity if product already exists
            cart[existingProductIndex].quantity += quantity;
        } else {
            // Add new product to cart
            cart.push({
                id: id,
                name: name,
                price: price,
                image: image,
                quantity: quantity
            });
        }
        
        // Save cart to localStorage
        saveCart();
        
        // Update cart count
        updateCartCount();
    }
    
    // Function to save cart to localStorage
    function saveCart() {
        localStorage.setItem('cart', JSON.stringify(cart));
    }
    
    // Function to update cart count in header
    function updateCartCount() {
        const cartCountElement = document.querySelector('.cart-count');
        if (cartCountElement) {
            const totalItems = cart.reduce((total, item) => total + item.quantity, 0);
            cartCountElement.textContent = totalItems;
            
            // Show/hide the count based on if there are items
            if (totalItems > 0) {
                cartCountElement.classList.remove('hidden');
            } else {
                cartCountElement.classList.add('hidden');
            }
        }
    }
    
    // Function to show login prompt for visitors
    function showLoginPrompt() {
        const modal = document.createElement('div');
        modal.className = 'fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50';
        modal.innerHTML = `
            <div class="bg-white p-6 rounded-lg shadow-lg max-w-md w-full">
                <h3 class="text-xl font-bold mb-4">Connexion requise</h3>
                <p class="mb-6">Veuillez vous connecter pour ajouter des produits à votre panier.</p>
                <div class="flex justify-end space-x-4">
                    <button class="cancel-btn px-4 py-2 border border-gray-300 rounded hover:bg-gray-100">Annuler</button>
                    <a href="/login" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Se connecter</a>
                </div>
            </div>
        `;
        
        document.body.appendChild(modal);
        
        // Add event listener to close modal
        modal.querySelector('.cancel-btn').addEventListener('click', function() {
            document.body.removeChild(modal);
        });
    }
    
    // Function to show notification
    function showNotification(message, type = 'info') {
        const notification = document.createElement('div');
        notification.className = `fixed top-4 right-4 p-4 rounded-lg shadow-lg z-50 ${type === 'success' ? 'bg-green-500' : 'bg-blue-500'} text-white`;
        notification.innerHTML = message;
        
        document.body.appendChild(notification);
        
        // Remove notification after 3 seconds
        setTimeout(() => {
            if (document.body.contains(notification)) {
                document.body.removeChild(notification);
            }
        }, 3000);
    }
    
    // Initialize cart page if we're on it
    if (window.location.pathname.includes('/cart')) {
        renderCartPage();
    }
    
    // Function to render cart page
    function renderCartPage() {
        const cartContainer = document.querySelector('#cart-container');
        if (!cartContainer) return;
        
        if (cart.length === 0) {
            cartContainer.innerHTML = `
                <div class="text-center py-8">
                    <i class="fas fa-shopping-cart text-5xl text-gray-300 mb-4"></i>
                    <p class="text-xl text-gray-500">Votre panier est vide</p>
                    <a href="/" class="mt-4 inline-block px-6 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                        Continuer vos achats
                    </a>
                </div>
            `;
            return;
        }
        
        // Calculate totals
        const subtotal = cart.reduce((total, item) => total + (item.price * item.quantity), 0);
        const shipping = subtotal > 0 ? 1000 : 0; // Example shipping cost
        const total = subtotal + shipping;
        
        // Render cart items and summary
        cartContainer.innerHTML = `
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="md:col-span-2">
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h2 class="text-xl font-bold mb-4">Votre Panier</h2>
                        <div class="cart-items">
                            ${cart.map(item => `
                                <div class="flex items-center py-4 border-b" data-product-id="${item.id}">
                                    <img src="${item.image}" alt="${item.name}" class="w-16 h-16 object-cover rounded">
                                    <div class="ml-4 flex-grow">
                                        <h3 class="font-semibold">${item.name}</h3>
                                        <p class="text-gray-600">${item.price.toLocaleString()} FCFA</p>
                                    </div>
                                    <div class="flex items-center">
                                        <button class="decrease-quantity px-2 py-1 border rounded-l">-</button>
                                        <span class="item-quantity px-4 py-1 border-t border-b">${item.quantity}</span>
                                        <button class="increase-quantity px-2 py-1 border rounded-r">+</button>
                                    </div>
                                    <div class="ml-4 text-right">
                                        <p class="font-semibold">${(item.price * item.quantity).toLocaleString()} FCFA</p>
                                        <button class="remove-item text-red-500 text-sm mt-1">Supprimer</button>
                                    </div>
                                </div>
                            `).join('')}
                        </div>
                    </div>
                </div>
                <div class="md:col-span-1">
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h2 class="text-xl font-bold mb-4">Résumé</h2>
                        <div class="space-y-2">
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
                        <button id="checkout-btn" class="w-full mt-6 bg-green-600 text-white py-2 px-4 rounded hover:bg-green-700">
                            Passer la commande
                        </button>
                    </div>
                </div>
            </div>
        `;
        
        // Add event listeners for cart interactions
        addCartPageEventListeners();
    }
    
    // Function to add event listeners to cart page elements
    function addCartPageEventListeners() {
        // Increase quantity buttons
        document.querySelectorAll('.increase-quantity').forEach(button => {
            button.addEventListener('click', function() {
                const productId = this.closest('[data-product-id]').dataset.productId;
                updateQuantity(productId, 1);
            });
        });
        
        // Decrease quantity buttons
        document.querySelectorAll('.decrease-quantity').forEach(button => {
            button.addEventListener('click', function() {
                const productId = this.closest('[data-product-id]').dataset.productId;
                updateQuantity(productId, -1);
            });
        });
        
        // Remove item buttons
        document.querySelectorAll('.remove-item').forEach(button => {
            button.addEventListener('click', function() {
                const productId = this.closest('[data-product-id]').dataset.productId;
                removeFromCart(productId);
            });
        });
        
        // Checkout button
        const checkoutBtn = document.querySelector('#checkout-btn');
        if (checkoutBtn) {
            checkoutBtn.addEventListener('click', function() {
                window.location.href = '/checkout';
            });
        }
    }
    
    // Function to update item quantity
    function updateQuantity(productId, change) {
        const index = cart.findIndex(item => item.id === productId);
        if (index === -1) return;
        
        cart[index].quantity += change;
        
        // Remove item if quantity is 0 or less
        if (cart[index].quantity <= 0) {
            removeFromCart(productId);
            return;
        }
        
        // Save cart and re-render
        saveCart();
        updateCartCount();
        if (window.location.pathname.includes('/cart')) {
            renderCartPage();
        }
    }
    
    // Function to remove item from cart
    function removeFromCart(productId) {
        cart = cart.filter(item => item.id !== productId);
        saveCart();
        updateCartCount();
        if (window.location.pathname.includes('/cart')) {
            renderCartPage();
        }
    }
});