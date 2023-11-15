<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Album extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'date', 'active'];

    /**
     * Relationships
     *
     */

    public function event() : HasOne
    {
        return $this->hasOne(Event::class);
    }

    public function my() : HasOne
    {
        return $this->hasOne(Event::class, 'album_id', 'id');
    }


    /**
     * Scopes
     */
    public function scopeActive(Builder $query): void
    {
        $query->where('active', 1);
    }
}
