<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'summary',
        'body',
        'is_active',
        'sort_order',
    ];

    /**
     * Scope: only active services.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope: order by sort_order ascending.
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order', 'asc');
    }

    /**
     * Polymorphic relation to media (images, icons).
     */
    public function media()
    {
        return $this->morphMany(Media::class, 'model');
    }

    /**
     * Route binding: use slug instead of numeric ID.
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Accessor: fallback summary if empty.
     */
    public function getSummaryAttribute($value)
    {
        return $value ?: 'No summary available for this service.';
    }

    /**
     * Accessor: fallback body if empty.
     */
    public function getBodyAttribute($value)
    {
        return $value ?: 'Details coming soon.';
    }
}
