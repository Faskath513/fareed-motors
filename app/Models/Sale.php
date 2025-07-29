<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicle_id',
        'customer_id',
        'sale_date',
        'total_amount',
        'notes',
    ];

    protected $casts = [
    'sale_date' => 'date',  // casts sale_date as a Carbon instance
];

    /**
     * Relationship: Sale belongs to a customer.
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * Relationship: Sale is for a specific vehicle.
     */
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    /**
     * Relationship: A sale can have many payments.
     */
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    /**
     * Optional: Calculate balance amount from total - sum of payments.
     */
    public function getBalanceAmountAttribute()
    {
        return $this->total_amount - $this->payments->sum('amount');
    }

    /**
     * Optional: Check if the sale is fully paid.
     */
    public function getIsFullyPaidAttribute()
    {
        return $this->balance_amount <= 0;
    }
}