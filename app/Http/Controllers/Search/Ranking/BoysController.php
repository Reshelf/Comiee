<?php

namespace App\Http\Controllers\Search\Ranking;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class BoysController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | ランキング　：　少年
    |--------------------------------------------------------------------------
    |
    */
    public function __invoke(Request $request)
    {
        // 検索結果を１度に返すクエリを宣言
        $genre_id = 1;
        $pickup = ['genre_id' => $genre_id];
        $query = Book::where($pickup);

        $sort = $request->input('sort');
        $feature = $request->input('feature');
        // $books = $likes->where('likes_count', '>', 0);

        if ($sort != null) {
            if ($sort === '閲覧回数') {
                \Cache::remember("ranking.boys.views", Carbon::now()->addHour(), function () use ($query) {
                    return $query->where('views', '>', 0)->orderBy('views', 'desc')->get();
                });
            }
            if ($sort === 'お気に入り数') {
                \Cache::remember("ranking.boys.likes", Carbon::now()->addHour(), function () use ($query) {
                    return $query->withCount('likes')->having('likes_count', '>', 0)->orderBy('likes_count', 'desc')->get();
                });
            }
        } else {
            $sort = 'お気に入り数';
            \Cache::remember("ranking.boys.likes", Carbon::now()->addHour(), function () use ($query) {
                return $query->withCount('likes')->having('likes_count', '>', 0)->orderBy('likes_count', 'desc')->get();
            });
        }

        if ($feature != null) {
            if ($feature === '完結作品のみ') {
                \Cache::remember("ranking.boys.is_complete", Carbon::now()->addHour(), function () use ($query) {
                    return $query->where('is_complete', 1)->latest();
                });
            }
        } else {
            $feature = '全ての作品';
        }

        $books = $query->paginate(15);
        return view('search.ranking.index', [
            'books' => $books,
            'sort' => $sort,
            'genre_id' => $genre_id,
            'feature' => $feature
        ]);
    }
}
