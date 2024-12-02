<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    protected $fillable = ['registered_customer_id', 'total'];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(RegisteredCustomer::class, 'registered_customer_id');
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'product_ordereds', 'order_id', 'product_id')
                    ->withPivot('ordered_quantity');
    }
}

