<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'contact_email',
        'contact_phone',
        'notes',
    ];

    /**
     * Relationships
     */
    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function media()
    {
        return $this->morphMany(Media::class, 'model');
    }

    /**
     * Accessors
     */
    public function getNotesAttribute($value): string
    {
        return $value ?: 'No notes available.';
    }

    public function getContactEmailAttribute($value): string
    {
        return $value ?: 'Not provided';
    }

    public function getContactPhoneAttribute($value): string
    {
        return $value ?: 'Not provided';
    }

    /**
     * Scopes
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('name');
    }

    public function scopeWithProjects($query)
    {
        return $query->with('projects');
    }

    /**
     * Route binding by slug
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
