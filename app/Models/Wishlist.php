<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;

    /**
     * Les attributs qui sont assignables en masse.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'product_id'
    ];

    /**
     * Obtenir l'utilisateur propriétaire de la liste de souhaits.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Obtenir le produit dans la liste de souhaits.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

class WishlistItem extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'wishlistItem_id',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function wishlistItem()
    {
        return $this->hasMany(wishlistItem::class);
    }
   
}
