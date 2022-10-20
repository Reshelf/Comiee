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
            // 検索結果を１度に返すクエリを宣言
            $pickup = ['is_new' => true];
            $query = Book::where($pickup)->latest();

            //$request->input()で検索時に入力した項目を取得
            $sort = $request->input('sort');

            // ソートの基準
            if ($sort != null) {
                if ($sort === '閲覧回数') {
                    $query->orderBy('views', 'desc')->get();
                }
            } else {
                $sort = 'お気に入り数';
                $query->withCount('likes')->orderBy('likes_count', 'desc')->get();
            }

            //1ページにつき100件ずつ表示
            $books = $query->paginate(15);
            return view('search.todays_new.index', [
                'books' => $books,
                'sort' => $sort,
            ]);
        }

        // ランキング 人気順
        $books = Book::withCount('likes')->orderBy('likes_count', 'desc')->paginate(15);
        // お気に入り数が0の作品は除く
        // $books = $likes->where('likes_count', '>', 0);
        return view('search.ranking.index', compact('books'));
    }
}
