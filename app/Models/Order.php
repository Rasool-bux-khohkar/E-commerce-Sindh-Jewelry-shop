<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_role_id',
        'billing_address',
        'shipping_address',
        'city',
        'state',
        'zip',
        'payment_method',
    ];
}
