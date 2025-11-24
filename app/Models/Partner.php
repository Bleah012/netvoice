<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Partner extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'website_url',
        'description',
        'sort_order',
    ];

    /**
     * Default ordering scope (by sort_order ascending).
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order', 'asc');
    }

    /**
     * Polymorphic relation to media (logos, images).
     */
    public function media()
    {
        return $this->morphMany(Media::class, 'model');
    }

    /**
     * Accessor: return a safe website URL with https:// prefix if missing.
     */
    public function getWebsiteUrlAttribute($value)
    {
        if ($value && !preg_match('/^https?:\/\//', $value)) {
            return 'https://' . $value;
        }
        return $value;
    }

    /**
     * Accessor: generate a fallback description if none provided.
     */
    public function getDescriptionAttribute($value)
    {
        return $value ?: 'No description available for this partner.';
    }

    /**
     * Route binding: use slug instead of ID in URLs.
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
