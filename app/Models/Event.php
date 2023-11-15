<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['event_type_id', 'album_id', 'image', 'name', 'date', 'description', 'address',  'active'];

    /**
     * Relationships
     *
     */
    public function album() : BelongsTo
    {
        return $this->belongsTo(Album::class);
    }

    public function type() : BelongsTo
    {
        return $this->belongsTo(EventType::class, 'event_type_id');
    }

    /**
     * Scopes
     */
    public function scopeActive(Builder $query): void
    {
        $query->where('active', 1);
    }
}
