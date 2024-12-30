<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'city',
        'state',
        'country',
        'postal_code',
        'customer_type'
    ];

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'customer_id');
    }
}
