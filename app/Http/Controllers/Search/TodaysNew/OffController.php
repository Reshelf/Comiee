<?php

namespace App\Http\Controllers\Search\TodaysNew;

use App\Http\Controllers\Controller;

use App\Models\Book;

class OffController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | 今日の新作をリセットする
    |--------------------------------------------------------------------------
    |
    */
    public function __invoke(Book $book)
    {
        $books = Book::where('is_new', true)->get();

        foreach ($books as $book) {
            $book->is_new = false;
            $book->save();
        };
    }
}
