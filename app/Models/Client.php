<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

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

    /**
     * Boot hooks to auto-generate slug
     */
    protected static function booted()
    {
        static::creating(function ($client) {
            if (empty($client->slug)) {
                $client->slug = Str::slug($client->name);
            }
        });

        static::updating(function ($client) {
            if (empty($client->slug)) {
                $client->slug = Str::slug($client->name);
            }
        });
    }
}
