<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    // Allow mass assignment for these fields
    protected $fillable = [
        'make',
        'model',
        'year',
        'vehicle_type',
        'price',
        'mileage',
        'condition',
        'status',
    ];

    // Optionally, cast year to integer and price to decimal
    protected $casts = [
        'year' => 'integer',
        'price' => 'decimal:2',
        'mileage' => 'integer',
    ];
}