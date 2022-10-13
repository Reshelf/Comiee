<?php

namespace App\Http\Controllers\Search\TodaysNew;

use App\Http\Controllers\Controller;

use Carbon\Carbon;

use App\Models\Book;

class IndexController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | 今日の新作　：　トップ
    |--------------------------------------------------------------------------
    |
    */
    public function __invoke(Book $book)
    {
        // 今日の新作
        $books = Book::where('is_new', true)->orderBy('created_at')->get();
        // dd($books);
        return view('search.todays_new', ['books' => $books]);
    }
}
