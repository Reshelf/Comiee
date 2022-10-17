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
        $all = Book::all()->load(['user'])->map(function ($book) {
            return [
                'title' => $book->title,
                'thumbnail' => $book->thumbnail,
                'name' => $book->user->name
            ];
        });

        return response()->json($all);
    }
}
