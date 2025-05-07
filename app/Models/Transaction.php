<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'order_id',
        'reference',
        'status',
        'amount',
        'currency',
        'provider',
    ];
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
