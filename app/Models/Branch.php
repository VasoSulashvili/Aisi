<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = ['image', 'name', 'address', 'map', 'active'];


    public function groups() : HasMany
    {
        return $this->hasMany(Group::class);
    }

    public function dancers() : HasManyThrough
    {
        return $this->hasManyThrough(Dancer::class, Group::class);
    }

    /**
     * Scopes
     */
    public function scopeActive(Builder $query): void
    {
        $query->where('active', 1);
    }
}
