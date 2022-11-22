<?php

namespace App\Http\Controllers\Api\Search;

use App\Http\Controllers\Controller;
use App\Models\Book;

class SearchWordController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | キーワード検索
    |--------------------------------------------------------------------------
    */
    public function __invoke(Book $book)
    {
        $expiresAt = Carbon::now()->endOfDay()->addSecond();
        $all = \Cache::remember("search-results", $expiresAt, function () use ($book) {
            return Book::all()->load(['user'])->map(function ($book) {
                return [
                    'id' => $book->id,
                    'title' => $book->title,
                    'thumbnail' => $book->thumbnail,
                    'name' => $book->user->name
                ];
            });
        });

        return response()->json($all);
    }
}
