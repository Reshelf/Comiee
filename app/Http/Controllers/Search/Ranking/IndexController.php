<?php

namespace App\Http\Controllers\Search\Ranking;

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
            ->orderBy('likes_count', 'desc')
            ->paginate(15);

        // お気に入り数が0の作品は除く
        // $books = $likes->where('likes_count', '>', 0);

        // dd($books);
        return view('search.ranking.index', [
            'books' => $books,
            'genre_id' => 0
        ]);
    }
}
