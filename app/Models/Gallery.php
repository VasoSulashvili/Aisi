<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = ['album_id', 'image', 'title', 'description', 'active'];

    /**
     * Relationships
     * 
     */

    public function album() : BelongsTo
    {
        return $this->belongsTo(Album::class);
    }

    public function groups(): MorphToMany
    {
        return $this->morphedByMany(
            Group::class, 
            'imageable',
            'imageables',
            'image_id',
            'imageable_id',
            'id',
            'id');
    }

    public function dancers(): MorphToMany
    {
        return $this->morphedByMany(
            Dancer::class, 
            'imageable',
            'imageables',
            'image_id',
            'imageable_id',
            'id',
            'id');
    }


    /**
     * Attributes
     * 
     */
    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => config('aisi.images.gallery.path') . '/' . $value,
            set: function (string $value) {
                $arr = explode('/', $value);
                return end($arr);
            } 
        );
    }

}
