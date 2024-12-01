<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    protected $fillable = ['registered_customer_id', 'total', 'delivery_status']; 

    public function customer(): BelongsTo
    {
        return $this->belongsTo(RegisteredCustomer::class, 'registered_customer_id');
    }

    public function productOrders(): HasMany
    {
        return $this->hasMany(ProductOrdered::class, 'order_id');
    }
}

