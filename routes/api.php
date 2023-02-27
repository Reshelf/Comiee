<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('/search-words', 'App\Http\Controllers\Api\Search\SearchWordController');
Route::get('/search-tags', 'App\Http\Controllers\Api\Search\SearchTagsController');
Route::get('/book', 'App\Http\Controllers\Api\Search\GetBooksController');
// Route::get('/posts', 'App\Http\Controllers\Api\Timeline\TimelineController');

Route::get('/comments', 'App\Http\Controllers\Api\Books\Episode\Comment\IndexController');
Route::post('/comments', 'App\Http\Controllers\Api\Books\Episode\Comment\StoreController');
