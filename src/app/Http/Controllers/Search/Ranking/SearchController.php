<?php

namespace App\Http\Controllers\Search\Ranking;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class SearchController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Book $book, Request $request)
    {
        // 検索結果を１度に返すクエリを宣言
        $query = Book::query();


        //$request->input()で検索時に入力した項目を取得
        $sort_basis = $request->input('sort_basis');
        $sort_time = $request->input('sort_time');
        $sort_complete = $request->input('sort_complete');
        $sort_read = $request->input('sort_read');
        $sort_hidden = $request->input('sort_hidden');


        // ソートの基準
        if ($sort_basis != null) {
            if ($sort_basis === 'お気に入り数') {
                $query->withCount('likes')->orderBy('likes_count', 'desc')->get();
            } elseif ($sort_basis === '再生回数') {
                # code...
            }
        }


        // 期間
        if ($sort_time != null) {
            if ($sort_time === 'すべての期間') {
                // $query->where('id', $sort_time)->get();
            } elseif ($sort_time === '年間') {
                
            } elseif ($sort_time === '月間') {
                
            } elseif ($sort_time === '週間') {
                
            }
        }


        // 完結作品のカラム取得
        if ($sort_complete != null) {
            if ($sort_complete === '完結作品のみ') {
                $query->where('is_complete', 1)->get();
            }
        }


        // 読了作品のカラム取得
        if ($sort_read != null) {
            if ($sort_read === '読了作品のみ') {

            }
        }


        // 非表示作品のカラム取得
        if ($sort_hidden != null) {
            if ($sort_hidden === '読了作品のみ') {

            }
        }


        //1ページにつき100件ずつ表示
        $books = $query->paginate(100);
        return view('search.ranking', [
            'books' => $books,
        ]);
    }
}
