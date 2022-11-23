<?php

namespace App\Http\Controllers\Api\Search;

use App\Models\Book;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

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
