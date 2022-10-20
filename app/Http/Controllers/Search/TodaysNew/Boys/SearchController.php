<?php

namespace App\Http\Controllers\Search\TodaysNew\Boys;

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
        $pickup = ['is_new' => true, 'genre_id' => 1];
        $query = Book::where($pickup)->latest();


        //$request->input()で検索時に入力した項目を取得
        $sort = $request->input('sort');

        // ソートの基準
        if ($sort != null) {
            if ($sort === 'お気に入り数') {
                $query->withCount('likes')->orderBy('likes_count', 'desc')->get();
            } elseif ($sort === '閲覧回数') {
                $query->orderBy('views', 'desc')->get();
            }
        }


        //1ページにつき100件ずつ表示
        $books = $query->paginate(15);
        return view('search.todays_new.boys', [
            'books' => $books,
            'sort' => $sort,
        ]);
    }
}
