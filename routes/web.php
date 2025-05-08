<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ShopController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Vendor\VendorProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PaymentCallbackController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SingleProductController;
use App\Http\Controllers\StoreController;

Route::get('/', function () {
    return view('home');
})->name('home');

// Apply the redirect.role middleware to the dashboard route
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'redirect.role'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Routes 
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // User management routes
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    
    // Shop management routes
    Route::get('/shops', [ShopController::class, 'index'])->name('shops.index');
    Route::get('/shops/pending', [ShopController::class, 'pending'])->name('shops.pending');
    Route::get('/shops/{shop}', [ShopController::class, 'show'])->name('shops.show');
    Route::post('/shops/{shop}/approve', [ShopController::class, 'approve'])->name('shops.approve');
    Route::post('/shops/{shop}/reject', [ShopController::class, 'reject'])->name('shops.reject');
    Route::post('/shops/{shop}/suspend', [ShopController::class, 'suspend'])->name('shops.suspend');
    Route::post('/shops/{shop}/reactivate', [ShopController::class, 'reactivate'])->name('shops.reactivate');
    
    // Product management routes
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
    Route::patch('/products/{product}/activate', [ProductController::class, 'activate'])->name('products.activate');
    Route::patch('/products/{product}/deactivate', [ProductController::class, 'deactivate'])->name('products.deactivate');
    
    // Order management routes
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
    Route::patch('/orders/{order}/status', [OrderController::class, 'updateStatus'])->name('orders.update-status');
    Route::post('/orders', [App\Http\Controllers\Admin\OrderController::class, 'store'])->name('orders.store');

        
    // Subscription management
    Route::get('/subscriptions/pending', [App\Http\Controllers\Admin\SubscriptionController::class, 'pending'])->name('subscriptions.pending');
    Route::get('/subscriptions/{id}', [App\Http\Controllers\Admin\SubscriptionController::class, 'show'])->name('subscriptions.show');
    

    Route::post('/admin/subscriptions/{subscription}/approve', [App\Http\Controllers\Admin\SubscriptionController::class, 'approve'])->name('admin.subscriptions.approve');
    Route::post('/subscriptions/{id}/reject', [App\Http\Controllers\Admin\SubscriptionController::class, 'reject'])->name('subscriptions.reject');
    Route::get('/subscriptions', [App\Http\Controllers\Admin\SubscriptionController::class, 'all'])->name('subscriptions.all');
    Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:Admin'])->group(function () {    
        Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class);

    });
    // category management
    Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class);
    Route::put('/admin/categories/{category}', [App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('admin.categories.update');
    Route::delete('/admin/categories/{category}', [App\Http\Controllers\Admin\CategoryController::class, 'destroy'])->name('admin.categories.destroy');
    
    // Subscription management
    Route::get('/subscriptions/pending', [App\Http\Controllers\Admin\SubscriptionController::class, 'pending'])->name('subscriptions.pending');
    Route::get('/subscriptions/{id}', [App\Http\Controllers\Admin\SubscriptionController::class, 'show'])->name('subscriptions.show');
    Route::post('/subscriptions/{id}/approve', [App\Http\Controllers\Admin\SubscriptionController::class, 'approve'])->name('subscriptions.approve');
    Route::post('/subscriptions/{id}/reject', [App\Http\Controllers\Admin\SubscriptionController::class, 'reject'])->name('subscriptions.reject');
    Route::get('/subscriptions', [App\Http\Controllers\Admin\SubscriptionController::class, 'all'])->name('subscriptions.all');
    Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class);  
    Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class);
    Route::put('/admin/categories/{category}', [App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('admin.categories.update');
    Route::delete('/admin/categories/{category}', [App\Http\Controllers\Admin\CategoryController::class, 'destroy'])->name('admin.categories.destroy');
    // Routes pour les produits
    Route::get('/products/{product}/approve', [App\Http\Controllers\Admin\ProductController::class, 'approve'])->name('products.approve');
    Route::post('/products/{product}/suspend', [App\Http\Controllers\Admin\ProductController::class, 'suspend'])->name('products.suspend');
    Route::patch('/products/{product}/activate', [App\Http\Controllers\Admin\ProductController::class, 'activate'])->name('products.activate');
    
    



});

// Vendor Routes
// Dans le groupe de routes vendor existant
Route::middleware(['auth', 'role:Marchand'])->prefix('vendor')->name('vendor.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Vendor\DashboardController::class, 'index'])->name('dashboard');
    
    // Profile routes
    Route::get('/profile', [App\Http\Controllers\Vendor\ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [App\Http\Controllers\Vendor\ProfileController::class, 'update'])->name('profile.update');
    
    // Shop routes
    Route::get('/shop/create', [App\Http\Controllers\Vendor\ShopController::class, 'create'])->name('shop.create');
    Route::post('/shop', [App\Http\Controllers\Vendor\ShopController::class, 'store'])->name('shop.store');
    Route::get('/shop/edit', [App\Http\Controllers\Vendor\ShopController::class, 'edit'])->name('shop.edit');
    Route::put('/shop/{shop}', [App\Http\Controllers\Vendor\ShopController::class, 'update'])->name('shop.update');
    
    // Subscription routes
    Route::get('/subscription/plans', [App\Http\Controllers\Vendor\SubscriptionController::class, 'plans'])->name('subscription.plans');
    Route::post('/subscription/subscribe', [App\Http\Controllers\Vendor\SubscriptionController::class, 'subscribe'])->name('subscription.subscribe');
    Route::get('/subscription/{id}/payment', [App\Http\Controllers\Vendor\SubscriptionController::class, 'payment'])->name('subscription.payment');
    Route::post('/subscription/{id}/payment', [App\Http\Controllers\Vendor\SubscriptionController::class, 'processPayment'])->name('subscription.process-payment');
    Route::get('/subscription/history', [App\Http\Controllers\Vendor\SubscriptionController::class, 'history'])->name('subscription.history');
    // Product routes
    Route::get('/products', [App\Http\Controllers\Vendor\VendorProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [App\Http\Controllers\Vendor\VendorProductController::class, 'create'])->name('products.create');
    Route::post('/products', [VendorProductController::class, 'store'])->name('products.store');  // This is the store route
    Route::get('/products/{product}/edit', [App\Http\Controllers\Vendor\VendorProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [App\Http\Controllers\Vendor\VendorProductController::class, 'update'])->name('products.update');
    Route::get('/products/{product}', [App\Http\Controllers\Vendor\VendorProductController::class, 'show'])->name('products.show');
    Route::delete('/vendor/products/{product}', [App\Http\Controllers\Vendor\VendorProductController::class, 'destroy'])->name('vendor.products.destroy');
    Route::get('/vendor/shop/{id}', [App\Http\Controllers\Vendor\ShopController::class, 'show'])->name('vendor.shop.show');
    Route::put('/shop/update', [App\Http\Controllers\Vendor\ShopController::class, 'update'])->name('shop.update');
    Route::get('vendor/shop/edit', [App\Http\Controllers\Vendor\ShopController::class, 'edit'])->name('vendor.shop.edit');


    // Routes pour les commandes
    Route::get('/orders', [App\Http\Controllers\Vendor\OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [App\Http\Controllers\Vendor\OrderController::class, 'show'])->name('orders.show');
});



 






// Notification routes (for all authenticated users)
// Route::middleware(['auth'])->group(function () {
//     Route::get('/notifications', [App\Http\Controllers\NotificationController::class, 'index'])->name('notifications.index');
//     Route::get('/notifications/{id}', [App\Http\Controllers\NotificationController::class, 'show'])->name('notifications.show');
//     Route::post('/notifications/mark-all-read', [App\Http\Controllers\NotificationController::class, 'markAllAsRead'])->name('notifications.mark-all-read');
//     Route::delete('/notifications/{id}', [App\Http\Controllers\NotificationController::class, 'destroy'])->name('notifications.destroy');
// });

// Delivery routes
Route::middleware(['auth', 'role:livreur'])->prefix('delivery')->name('delivery.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Delivery\DashboardController::class, 'index'])->name('dashboard');
});

//Client dashboard routes
Route::middleware(['auth', 'role:client'])->prefix('client')->name('client.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Client\DashboardController::class, 'index'])->name('dashboard');

});

require __DIR__.'/auth.php';

// Vendor registration routes
Route::get('/register/vendor', [App\Http\Controllers\Auth\VendorRegisterController::class, 'showRegistrationForm'])->name('vendor.register');
Route::post('/register/vendor', [App\Http\Controllers\Auth\VendorRegisterController::class, 'register']);



//Visitor pages routes

Route::get('/privacy-policy', function () {return view('pages.privacy-policy');})->name('privacy-policy');

Route::get('/return-policy', function () {return view('pages.return-policy');})->name('return-policy');

Route::get('/terms-of-sale', function () {return view('pages.terms-of-sale');})->name('terms-of-sale');

Route::get('/careers', function () {return view('pages.careers');})->name('careers');

Route::get('/become-seller', function () {return view('pages.become-seller');})->name('become-seller');

Route::get('/about', function () {return view('pages.about');})->name('about');

Route::get('/showrooms', function () {return view('pages.showrooms');})->name('showrooms');

Route::get('/how-to-shop', function () {return view('pages.how-to-shop');})->name('how-to-shop');

Route::get('/contact', function () {return view('pages.contact');})->name('contact');

Route::get('/delivery-fees', function () {return view('pages.delivery-fees');})->name('delivery-fees');

Route::get('/help-center', function () {return view('pages.help-center');})->name('help-center');

Route::get('/about-deliveries', function () {return view('pages.about-deliveries');})->name('about-deliveries');

Route::get('/about-fees', function () {return view('pages.about-fees');})->name('about-fees');

Route::get('/about-orders', function () {return view('pages.about-orders');})->name('about-orders');

Route::get('/about-payments', function () {return view('pages.about-payments');})->name('about-payments');

Route::get('/about-stock', function () {return view('pages.about-stock');})->name('about-stock');


// Seller Registration Routes
Route::post('/seller/register', [App\Http\Controllers\SellerController::class, 'register'])->name('seller.register');
Route::post('/seller/documents', [App\Http\Controllers\SellerController::class, 'uploadDocuments'])->name('seller.documents');


// Home and Public Pages
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', function() {return redirect('/');});


// Cart Routes
// Routes accessible only to logged-in users
Route::middleware('auth')->group(function () {
    // Cart Page (Optional)
    Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart.index');

    // AJAX Cart Actions
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update'); // Or PUT/PATCH if preferred
    Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove'); // Or DELETE if preferred
    Route::get('/cart/count', [CartController::class, 'count'])->name('cart.count'); // Endpoint just for the count
   
    Route::post('/cart/add/{productId}', [App\Http\Controllers\CartController::class, 'addToCart']);
    Route::post('/cart/update/{productId}', [App\Http\Controllers\CartController::class, 'updateQuantity']);
    Route::delete('/cart/remove/{productId}', [App\Http\Controllers\CartController::class, 'removeItem']);
    Route::post('/cart/clear', [App\Http\Controllers\CartController::class, 'clearCart']);
    Route::get('/cart/count', [App\Http\Controllers\CartController::class, 'count'])->name('cart.count');

});

// Checkout Page (Optional)
Route::get('/checkout', function () {return view('checkout');})->middleware('auth')->name('checkout');
Route::get('/checkout', [App\Http\Controllers\CheckoutController::class, 'index'])->name('checkout');
Route::post('/client/payment', PaymentController::class)->name('payment.process');

Route::get('/notchpay-callback', PaymentCallbackController::class)->name('notchpay-callback');

// Order Routes
Route::post('/orders', [OrderController::class, 'store'])->middleware('auth')->name('orders.store');

// Client Order Routes
Route::middleware(['auth', 'role:client'])->group(function () {
    Route::get('/client/orders', [App\Http\Controllers\Client\OrderController::class, 'index'])->name('client.orders');
    Route::get('/client/orders/{order}', [App\Http\Controllers\Client\OrderController::class, 'show'])->name('client.orders.show');

   
    // Client Wishlist Routes

    Route::get('/client/wishlist', [App\Http\Controllers\Client\WishlistController::class, 'index'])->name('client.wishlist');
    Route::post('/client/wishlist', [App\Http\Controllers\Client\WishlistController::class, 'store'])->name('client.wishlist.store');
    Route::delete('/client/wishlist/{product}', [App\Http\Controllers\Client\WishlistController::class, 'destroy'])->name('client.wishlist.destroy');


    // Client Review Routes

    Route::get('/client/reviews', [App\Http\Controllers\Client\ReviewController::class, 'index'])->name('client.reviews');
    Route::get('/client/reviews/create/{product}', [App\Http\Controllers\Client\ReviewController::class, 'create'])->name('client.reviews.create');
    Route::post('/client/reviews', [App\Http\Controllers\Client\ReviewController::class, 'store'])->name('client.reviews.store');
    Route::delete('/client/reviews/{review}', [App\Http\Controllers\Client\ReviewController::class, 'destroy'])->name('client.reviews.destroy');
});

Route::get('/products', StoreController::class)->name('products.store');

Route::get('/single-product', SingleProductController::class)->name('product.show');
 

// route for vendor shop
Route::get('/vendor/shop/{shop}', [App\Http\Controllers\Vendor\ShopController::class, 'show'])->name('vendor.shop.show');
