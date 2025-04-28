<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    /**
     * Les attributs qui sont assignables en masse.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'product_id',
        'rating',
        'comment',
        'status'
    ];

    /**
     * Les attributs qui doivent être castés.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'rating' => 'integer',
    ];

    /**
     * Obtenir l'utilisateur qui a écrit l'avis.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Obtenir le produit concerné par l'avis.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}