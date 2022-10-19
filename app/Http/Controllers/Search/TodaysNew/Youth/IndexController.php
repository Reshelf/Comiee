<?php

namespace App\Http\Controllers\Search\TodaysNew\Youth;

use App\Http\Controllers\Controller;
use App\Models\Book;

class IndexController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | 今日の新作　：　青年
    |--------------------------------------------------------------------------
    |
    */
    public function __invoke(Book $book)
    {
        $pickup = ['is_new' => true, 'genre_id' => 2];
        $books = Book::where($pickup)->orderBy('created_at')->get();
        return view('search.todays_new.youth', ['books' => $books]);
    }
}
