<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'admin_id',
        'name',
        'price',
        'category',
        'is_available',
        'image',
    ];
}
