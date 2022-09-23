<?php

namespace App\Http\Controllers\Search;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Book;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        if (Auth::user()) {
            // 今日の新作
            $books = Book::orderBy('created_at')->paginate(50);
            return view('search.todays_new', compact('books'));
        }

        // ランキング 人気順
        $books = Book::withCount('likes')->orderBy('likes_count', 'desc')->paginate(50);
        return view('search.ranking', compact('books'));
    }
}
