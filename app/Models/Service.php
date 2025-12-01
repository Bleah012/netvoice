<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;

    /**
     * Mass assignable attributes.
     */
    protected $fillable = [
        'name',
        'slug',
        'summary',
        'body',
        'hero_heading',
        'hero_subheading',
        'features',
        'process_steps',
        'partners',
        'is_active',
        'sort_order',
    ];

    /**
     * Attribute casting.
     */
    protected $casts = [
        'is_active'       => 'boolean',
        'sort_order'      => 'integer',
        'features'        => 'array',
        'process_steps'   => 'array',
        'partners'        => 'array',
    ];

    /**
     * Default ordering constant.
     */
    public const DEFAULT_ORDER = 'asc';

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
        return $query->orderBy('sort_order', self::DEFAULT_ORDER);
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

    /**
     * Accessor: fallback hero heading.
     */
    public function getHeroHeadingAttribute($value)
    {
        return $value ?: $this->name;
    }

    /**
     * Accessor: fallback hero subheading.
     */
    public function getHeroSubheadingAttribute($value)
    {
        return $value ?: 'Comprehensive ICT solutions for your enterprise.';
    }

    /**
     * Helper: check if service is active.
     */
    public function isActive(): bool
    {
        return (bool) $this->is_active;
    }

    /**
     * Helper: get primary media (first image/icon).
     */
    public function primaryMedia()
    {
        return $this->media()->first();
    }
}
