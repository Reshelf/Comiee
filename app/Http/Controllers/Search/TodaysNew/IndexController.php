<?php

namespace App\Http\Controllers\Search\TodaysNew;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class IndexController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | 今日の新作　：　トップ
    |--------------------------------------------------------------------------
    |
    */
    public function __invoke(Request $request)
    {
        // 検索結果を１度に返すクエリを宣言
        $pickup = ['is_new' => true, 'is_hidden' => false];
        $query = Book::where($pickup);

        //$request->input()で検索時に入力した項目を取得
        $sort = $request->input('sort');

        // ソートの基準
        if ($sort != null) {
            if ($sort === '閲覧回数') {
                $query->orderBy('views', 'desc')->get();
            }
            if ($sort === 'お気に入り数') {
                $query->withCount('likes')->orderBy('likes_count', 'desc')->get();
            }
        } else {
            $sort = 'お気に入り数';
            $query->withCount('likes')->orderBy('likes_count', 'desc')->get();
        }

        $books = $query->paginate(50);
        return view('search.todays_new.index', [
            'books' => $books,
            'sort' => $sort,
            'genre_id' => 0
        ]);
    }
}
