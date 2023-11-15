<?php

namespace App\Http\Controllers;

use App\Http\Resources\AlbumCollection;
use App\Http\Resources\AlbumResource;
use App\Http\Resources\ArticleCollection;
use App\Http\Resources\ArticleResource;
use App\Models\Album;
use App\Models\Article;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function index() : Collection|ArticleCollection
    {
        return new AlbumCollection(Article::active()->with('event')->get());
    }

    public function show(int $album) : ArticleResource|Article|null
    {
        return new ArticleResource(Article::active()->with('event')->where('id', '=', $album)->first());
    }
}
