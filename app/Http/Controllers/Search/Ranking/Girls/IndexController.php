<?php

namespace App\Http\Controllers\Search\Ranking\Girls;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Book;

class IndexController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | ランキングトップ
    |--------------------------------------------------------------------------
    |
    */
    public function __invoke(Request $request)
    {
        // 人気順
        $books = Book::withCount('likes')
            ->where('genre_id', 3)
            ->orderBy('likes_count', 'desc')
            ->paginate(15);

        // お気に入り数が0の作品は除く
        // $books = $likes->where('likes_count', '>', 0);

        // dd($books);
        return view('search.ranking.girls', compact('books'));
    }
}
