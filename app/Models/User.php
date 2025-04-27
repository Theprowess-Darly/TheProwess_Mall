<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // Relations
    public function wallet()
    {
        return $this->hasOne(Wallet::class);
    }

    /**
     * Get the shop associated with the user.
     */
    public function shop()
    {
        return $this->hasOne(Shop::class);
    }
    
    /**
     * Get the subscriptions for the user.
     */
    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }
    
    /**
     * Check if user has an active shop.
     */
    public function hasActiveShop()
    {
        return $this->shop && $this->shop->status === 'active';
    }
    
    /**
     * Check if user is a vendor.
     */
    public function isVendor()
    {
        return $this->role === 'Marchand';
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function wishlist()
    {
        return $this->hasOne(Wishlist::class);
    }

    public function deliveries()
    {
        return $this->hasMany(Delivery::class, 'delivery_user_id');
    }

    public function subscription()
    {
        return $this->hasOne(Subscription::class);
    }

    // Méthodes d'aide pour les rôles
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isMarchand()
    {
        return $this->role === 'Marchand';
    }

    public function isClient()
    {
        return $this->role === 'client';
    }

    public function isDeliveryPerson()
    {
        return $this->role === 'livreur';
    }
}