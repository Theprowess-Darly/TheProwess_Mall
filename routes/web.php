<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ShopController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
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
});

// Vendor Routes
Route::middleware(['auth', 'role:Marchand'])->prefix('vendor')->name('vendor.')->group(function () {
    Route::get('/dashboard', function() { return view('vendor.dashboard'); })->name('dashboard');
});

// Delivery Routes
// Add this with your other route definitions
Route::middleware(['auth', 'role:livreur'])->prefix('delivery')->name('delivery.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Delivery\DashboardController::class, 'index'])->name('dashboard');
});

require __DIR__.'/auth.php';
