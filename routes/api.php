<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\ArticleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group([
//    'middleware' => ['auth:sanctum']
], function(
){
    /**
     * Albums
     */
    Route::get('albums', [AlbumController::class, 'index'])->name('albums:index');
    Route::get('albums/{album}', [AlbumController::class, 'show'])->name('albums:show');

    /**
     * Events
     */
    Route::get('events', [EventController::class, 'index'])->name('events:index');
    Route::get('events/{event}', [EventController::class, 'show'])->name('events:show');

    /**
     * Sliders
     */
    Route::get('sliders', [SliderController::class, 'index'])->name('sliders:index');
    Route::get('sliders/{slider}', [SliderController::class, 'show'])->name('sliders:show');

    /**
     * Branches
     */
    Route::get('branches', [BranchController::class, 'index'])->name('branches:index');
    Route::get('branches/{branch}', [BranchController::class, 'show'])->name('branches:show');

    /**
     * Blog
     */
    Route::get('blog/articles', [ArticleController::class, 'index'])->name('blog:articles:index');
    Route::get('blog/articles/recent', [ArticleController::class, 'recent'])->name('blog:articles:recent');
    Route::get('blog/articles/{article}', [ArticleController::class, 'show'])->name('blog:articles:show');
});
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {


});
