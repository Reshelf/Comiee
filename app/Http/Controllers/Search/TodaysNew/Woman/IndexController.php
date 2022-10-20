<?php

namespace App\Http\Controllers\Search\TodaysNew\Woman;

use App\Http\Controllers\Controller;
use App\Models\Book;

class IndexController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | 今日の新作　：　女性
    |--------------------------------------------------------------------------
    |
    */
    public function __invoke()
    {
        $pickup = ['is_new' => true, 'genre_id' => 4];
        $books = Book::where($pickup)->latest()->paginate(15);
        return view('search.todays_new.woman', ['books' => $books]);
    }
}
