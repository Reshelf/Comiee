<?php

namespace App\Http\Controllers\Search;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Book;

class IndexController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | トップページ
    |--------------------------------------------------------------------------
    */
    public function __invoke(Request $request)
    {
        if (Auth::user()) {
            // 今日の新作
            // 検索結果を１度に返すクエリを宣言
            $pickup = ['is_new' => true];
            $query = Book::where($pickup);

            //$request->input()で検索時に入力した項目を取得
            $sort = $request->input('sort');

            // ソートの基準
            if ($sort != null) {
                if ($sort === '閲覧回数') {
                    $query->where('views', '>', 0)->orderBy('views', 'desc')->get();
                }
            } else {
                $sort = 'お気に入り数';
                $query->withCount('likes')->having('likes_count', '>', 0)->orderBy('likes_count', 'desc')->get();
            }

            //1ページにつき100件ずつ表示
            $books = $query->paginate(50);
            return view('search.todays_new.index', [
                'books' => $books,
                'sort' => $sort,
                'genre_id' => 0
            ]);
        }

        // ランキング 人気順
        $books = Book::withCount('likes')->having('likes_count', '>', 0)->orderBy('likes_count', 'desc')->paginate(50);
        // お気に入り数が0の作品は除く
        // $books = $likes->where('likes_count', '>', 0);
        return view('search.ranking.index', [
            'books' => $books,
            'genre_id' => 0,
            'sort' => 'お気に入り数',
            'feature' => '全ての作品'
        ]);
    }
}
