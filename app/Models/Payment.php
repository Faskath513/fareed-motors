<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'sale_id',
        'payment_date',
        'amount',
        'payment_method',
        'notes',
    ];

    /**
     * Relationship: Payment belongs to a sale.
     */
    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }

    /**
     * Optional: Access the related customer directly via sale.
     */
    public function customer()
    {
        return $this->sale->customer();
    }
}