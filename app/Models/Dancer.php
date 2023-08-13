<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Dancer extends Model
{
    use HasFactory;

    protected $fillable = ['group_id', 'image', 'name', 'surname', 'biography', 'birth_date', 'active'];

    protected $appends = ['full_name', 'full_name_group_name'];




    /**
     * Relationships
     * 
     */

    public function group() : BelongsTo
    {
        return $this->belongsTo(Group::class);
    }

    public function branch() : HasOneThrough
    {
        return $this->hasOneThrough(
            Branch::class, 
            Group::class, 
            'id', 
            'id', 
            'group_id', 
            'branch_id'
        );
    }

    public function gallery() : MorphToMany
    {
        return $this->morphToMany(
            Gallery::class, 
            'imageable',
            'imageables',
            'imageable_id',
            'image_id',
            'id',
            'id');
    }

    /**
     * Attributes
     * 
     */
    protected function fullName(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => $this->name . ' ' . $this->surname,
        );
    }

    protected function fullNameGroupName(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->name . ' ' . $this->surname . ' (' . $this->group->name . ')',
        );
    }
}
