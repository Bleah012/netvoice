<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

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
        'slug',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($msg) {
            if (empty($msg->slug)) {
                $msg->slug = Str::uuid();
            }
        });
    }

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

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getSubjectAttribute($value)
    {
        return $value ?: 'No subject provided';
    }

    public function getMessageAttribute($value)
    {
        return $value ?: 'No message content';
    }
}
