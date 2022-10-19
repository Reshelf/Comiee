<?php

namespace App\Http\Controllers\Search\TodaysNew;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Book;

class SearchController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | 今日の新作　：　ソート
    |--------------------------------------------------------------------------
    |
    */
    public function __invoke(Book $book, Request $request)
    {
        // 検索結果を１度に返すクエリを宣言
        $query = Book::query();


        //$request->input()で検索時に入力した項目を取得
        $sort_basis = $request->input('sort_basis');
        $sort_hidden = $request->input('sort_hidden');


        // ソートの基準
        if ($sort_basis != null) {
            if ($sort_basis === 'お気に入り数') {
                $query->withCount('likes')->orderBy('likes_count', 'desc')->get();
            } elseif ($sort_basis === '閲覧回数') {
                $query->orderBy('views', 'desc')->get();
            }
        }


        // 非表示作品のカラム取得
        if ($sort_hidden != null) {
            if ($sort_hidden === '非表示作品は除く') {
            }
        }


        //1ページにつき100件ずつ表示
        $books = $query->paginate(100);
        return view('search.todays_new.index', [
            'books' => $books,
        ]);
    }
}
