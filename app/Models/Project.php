<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['client_id','name','slug','status','started_at','completed_at'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function media()
    {
        return $this->morphMany(Media::class, 'model');
    }
}
