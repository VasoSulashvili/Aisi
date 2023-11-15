<?php

namespace App\Http\Controllers;

use App\Http\Resources\SliderCollection;
use App\Http\Resources\SliderResource;
use App\Models\Slider;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index() : Collection|SliderCollection
    {
        return new SliderCollection(Slider::active()->get());
    }

    public function show(int $album) : SliderResource|Slider|null
    {
        return new SliderResource(Slider::active()->where('id', '=', $album)->first());
    }
}
