<?php

namespace App\Http\Controllers\Search\TodaysNew\Adult;

use App\Http\Controllers\Controller;
use App\Models\Book;

class IndexController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | 今日の新作　：　オトナ
    |--------------------------------------------------------------------------
    |
    */
    public function __invoke()
    {
        $pickup = ['is_new' => true, 'genre_id' => 5];
        $books = Book::where($pickup)->orderBy('created_at')->paginate(15);
        return view('search.todays_new.adult', ['books' => $books]);
    }
}
