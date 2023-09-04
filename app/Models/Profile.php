<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'image', 'name', 'surname', 'biography'];

    /**
     * Relationships
     * 
     */
    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    /**
     * Accessors
     */

    protected function fullName(): Attribute
    {
        return Attribute::make(
            get: fn () => ucfirst($this->name) . ' ' . ucfirst($this->surname),
        );
    }
}
