<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = ['album_id', 'image', 'title', 'description', 'active'];


    public function album() : BelongsTo
    {
        return $this->belongsTo(Album::class);
    }


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
