<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Group extends Model
{
    use HasFactory;

    protected $fillable = ['branch_id', 'image', 'name', 'description', 'schedule', 'active'];

    protected $casts = [
        'schedule' => 'array'
     ];


    public function branch() : BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

    public function dancers() : HasMany
    {
        return $this->hasMany(Dancer::class);
    }

    protected function schedule(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => json_decode($value),
        );
    }
}
