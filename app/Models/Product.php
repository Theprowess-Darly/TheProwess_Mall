<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'shop_id',
        'category_id',
        'image_url',
        'status'
    ];

    // Define relationship with shop
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    // Define relationship with category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Define relationship with order items
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    // Define relationship with orders through order items
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_items')
                    ->withPivot('quantity', 'price')
                    ->withTimestamps();
    }
    
    // Get the vendor through the shop
    // public function vendor()
    // {
    //     return $this->shop->user;
    // }
    
  

    // For wishlist functionality
    public function wishlistItems()
    {
        return $this->hasMany(WishlistItem::class);
    }
}
