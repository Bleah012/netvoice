<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Media extends Model
{
    use HasFactory;

    protected $fillable = ['disk','path','alt_text','sort_order'];

    public function model()
    {
        return $this->morphTo();
    }
}
