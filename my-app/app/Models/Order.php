<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    protected $fillable = [
        'customer_id',
        'product_id',
        'quantity',
        'total_price',
        'status',
        'customer_type',
        'delivery_status',
        'total'
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'product_ordereds', 'order_id', 'product_id')
            ->withPivot('ordered_quantity');
    }
}
