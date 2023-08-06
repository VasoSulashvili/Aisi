<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Dancer extends Model
{
    use HasFactory;

    protected $fillable = ['group_id', 'image', 'name', 'surname', 'biography', 'birth_date', 'active'];


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
}
