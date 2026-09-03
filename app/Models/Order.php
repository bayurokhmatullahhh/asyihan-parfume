<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'phone',
        'email',
        'essence_number',
        'essence_name',
        'quantity',
        'total_price',
        'notes',
        'status',
    ];

    /**
     * The attributes that should be cast.
     */
    protected function casts(): array
    {
        return [
            'essence_number' => 'integer',
            'quantity' => 'integer',
            'total_price' => 'integer',
        ];
    }
}
