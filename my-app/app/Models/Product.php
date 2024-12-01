<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    protected $fillable = ['image_path','product_type','name','platform', 'price', 'stock_quantity'];

    public function productOrders(): HasMany
    {
        return $this->hasMany(ProductOrdered::class, 'product_id');
    }
}
