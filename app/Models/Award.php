<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Award extends Model
{
    use HasFactory;

    protected $fillable = [
        'image', 
        'title', 
        'description', 
        'event_id',
        'active'
    ];


    /**
     * Relationships
     * 
     */
    public function event() : BelongsTo
    {
        return $this->belongsTo(Event::class);
    }

    public function dancers() : BelongsToMany
    {
        return $this->belongsToMany(Dancer::class);
    }
}
