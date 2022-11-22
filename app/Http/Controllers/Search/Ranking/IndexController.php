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
        $query = Book::query();

        $sort = $request->input('sort');
        $feature = $request->input('feature');

        if ($sort != null) {
            if ($sort === '閲覧回数') {
                $query->where('views', '>', 0)->orderBy('views', 'desc')->get();
            }
            if ($sort === 'お気に入り数') {
                $query->withCount('likes')->having('likes_count', '>', 0)->orderBy('likes_count', 'desc')->get();
            }
        } else {
            $sort = 'お気に入り数';
            $query->withCount('likes')->having('likes_count', '>', 0)->orderBy('likes_count', 'desc')->get();
        }

        if ($feature != null) {
            if ($feature === '完結作品のみ') {
                $query->where('is_complete', 1)->latest();
            }
        }

        $books = $query->paginate(15);
        return view('search.ranking.index', [
            'books' => $books,
            'genre_id' => 0,
            'sort' => $sort,
            'feature' => $feature
        ]);
    }
}
