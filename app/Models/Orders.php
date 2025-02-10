<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    
    protected $table = "orders";
    
    protected $fillable = [
        'user_id',
        'address',
        'region',
        'phone',
        'product_id',
        'total_price',
        'quantity'
    ];

    protected $casts = [
        'product_id' => 'array',
        'quantity' => 'array',
    ];
}
