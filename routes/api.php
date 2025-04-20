<?php

use App\Http\Controllers\API\AuthController;
use Illuminate\Support\Facades\Route;

// Routes publiques
Route::post('/login', [AuthController::class, 'login']);

// Routes protégées
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class, 'user']);
    
    // Routes pour admin
    Route::middleware('ability:admin')->prefix('admin')->group(function () {
        Route::post('/validate-shop', [ShopController::class, 'validateShop']);
        // Autres routes admin...
    });
    
    // Routes pour vendeurs
    Route::middleware('ability:vendor')->prefix('vendor')->group(function () {
        Route::post('/shops', [ShopController::class, 'store']);
        // Autres routes vendeur...
    });
    
    // Autres groupes de routes...
});