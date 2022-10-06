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
        $all = Book::all()->sortByDesc('created_at')->load(['user']);

        return response()->json($all);
    }
}
