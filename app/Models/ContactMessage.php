<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContactMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'subject',
        'message',
        'status',
        'slug', // ✅ slug/uuid for clean routing
    ];

    /**
     * Scopes
     */
    public function scopeNew($query)
    {
        return $query->where('status', 'new');
    }

    public function scopeReviewed($query)
    {
        return $query->where('status', 'reviewed');
    }

    public function scopeResponded($query)
    {
        return $query->where('status', 'responded');
    }

    public function scopeArchived($query)
    {
        return $query->where('status', 'archived');
    }

    /**
     * Route binding: use slug if available
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Accessors: safe defaults
     */
    public function getSubjectAttribute($value)
    {
        return $value ?: 'No subject provided';
    }

    public function getMessageAttribute($value)
    {
        return $value ?: 'No message content';
    }
}
