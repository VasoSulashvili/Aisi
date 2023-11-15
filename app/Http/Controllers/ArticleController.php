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

class ArticleController extends Controller
{
    public function index() : Collection|ArticleCollection
    {
        return new ArticleCollection(Article::active()->with('author')->get());
    }

    public function recent() : Collection|ArticleCollection
    {
        return new ArticleCollection(
            Article::active()
                ->orderBy('created_at', 'DESC')
                ->take(5)
                ->with('author')
                ->get()
        );
    }

    public function show(int $article) : ArticleResource|Album|null
    {
        return new ArticleResource(Album::active()->with('event')->where('id', '=', $article)->first());
    }
}
