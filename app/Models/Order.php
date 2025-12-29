<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'admin_id',
        'customer_id',
        'order_number',
        'status',
        'total_payment',
    ];
}
