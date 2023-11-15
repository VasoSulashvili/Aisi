<?php

namespace App\Http\Controllers;

use App\Http\Resources\AlbumCollection;
use App\Http\Resources\AlbumResource;
use App\Http\Resources\EventCollection;
use App\Http\Resources\EventResource;
use App\Models\Album;
use App\Models\Event;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index() : Collection|EventCollection
    {
        return new EventCollection(Event::active()->with(['album', 'type'])->get());
    }

    public function show(int $event) : EventResource|Event|null
    {
        return new EventResource(Event::active()->with(['album', 'type'])->where('id', '=', $event)->first());
    }
}
