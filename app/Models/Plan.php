<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'price_cents',
        'billing_period',
        'is_active',
        'sort_order',
    ];

    // Accessors
    public function getPriceAttribute(): float
    {
        return $this->price_cents / 100;
    }

    public function getDescriptionAttribute($value): string
    {
        return $value ?: 'No description provided.';
    }

    public function getBillingPeriodAttribute($value): string
    {
        return ucfirst($value ?: 'monthly');
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }

    // Route binding
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
