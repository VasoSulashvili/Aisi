<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Dancer extends Model
{
    use HasFactory;

    protected $fillable = ['group_id', 'image', 'name', 'surname', 'biography', 'birth_date', 'active'];


    public function group() : BelongsTo
    {
        return $this->belongsTo(Group::class);
    }
}
