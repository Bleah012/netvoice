<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'name',
        'slug',
        'status',
        'category',
        'tags',
        'description',
        'image',
        'started_at',
        'completed_at',
    ];

    protected $casts = [
        'tags'        => 'array',     // auto-decode JSON into array
        'started_at'  => 'datetime',
        'completed_at'=> 'datetime',
    ];

    /**
     * Relationships
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * Helper to resolve image path or fallback
     */
    public function imageUrl(): ?string
    {
        if ($this->image) {
            return asset('storage/' . $this->image);
        }

        $fallbackPath = public_path("images/projects/{$this->slug}.jpg");
        return file_exists($fallbackPath)
            ? asset("images/projects/{$this->slug}.jpg")
            : null;
    }
}
