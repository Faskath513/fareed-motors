<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     * Adjust based on your database fields.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'notes',
    ];

    /**
     * Relationship: A customer can have many sales.
     */
    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    /**
     * Optional: Format the customer's name when accessed.
     */
    public function getFormattedNameAttribute()
    {
        return ucfirst($this->name);
    }

    /**
     * Optional: Add a full display name accessor (e.g., name + phone).
     */
    public function getDisplayNameAttribute()
    {
        return "{$this->name} ({$this->phone})";
    }
}