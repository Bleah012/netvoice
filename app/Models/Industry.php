<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Industry extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'sort_order',
    ];

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
     * Accessor: fallback description if empty.
     */
    public function getDescriptionAttribute($value)
    {
        return $value ?: 'Details coming soon for this industry.';
    }
}
