<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    protected $fillable = [
        'image_path',
        'product_type',
        'name',
        'platform',
        'price',
        'stock_quantity'
    ];

    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Order::class, 'product_ordereds', 'product_id', 'order_id')
            ->withPivot('ordered_quantity');
    }
}
