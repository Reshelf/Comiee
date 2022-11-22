<?php

namespace App\Http\Controllers\Search\TodaysNew;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class YouthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | 今日の新作　：　青年
    |--------------------------------------------------------------------------
    |
    */
    public function __invoke(Request $request)
    {
        // 検索結果を１度に返すクエリを宣言
        $genre_id = 2;
        $pickup = ['is_new' => true, 'genre_id' => $genre_id];
        $query = Book::where($pickup);

        //$request->input()で検索時に入力した項目を取得
        $sort = $request->input('sort');

        // ソートの基準
        if ($sort != null) {
            if ($sort === '閲覧回数') {
                \Cache::remember("todays_new.youth.views", Carbon::now()->addHour(), function () use ($query) {
                    return $query->orderBy('views', 'desc')->get();
                });
            }
            if ($sort === 'お気に入り数') {
                \Cache::remember("todays_new.youth.likes", Carbon::now()->addHour(), function () use ($query) {
                    return $query->withCount('likes')->orderBy('likes_count', 'desc')->get();
                });
            }
        } else {
            $sort = 'お気に入り数';
            \Cache::remember("todays_new.youth.likes", Carbon::now()->addHour(), function () use ($query) {
                return $query->withCount('likes')->orderBy('likes_count', 'desc')->get();
            });
        }

        $books = $query->paginate(15);
        return view('search.todays_new.index', [
            'books' => $books,
            'sort' => $sort,
            'genre_id' => (int)2
        ]);
    }
}
