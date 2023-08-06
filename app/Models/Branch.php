<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = ['image', 'name', 'address', 'map', 'active'];


    public function groups() : HasMany
    {
        return $this->hasMany(Group::class);
    }

    public function branch() : HasOneThrough
    {
        return $this->hasOneThrough(Dancer::class, Group::class);
    }
}
