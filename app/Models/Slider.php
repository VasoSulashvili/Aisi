<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = ['image', 'title', 'description', 'url', 'active'];


    /**
     * Scopes
     */
    public function scopeActive(Builder $query): void
    {
        $query->where('active', 1);
    }


}
