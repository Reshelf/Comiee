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
        $sort_complete = $request->input('sort-complete');
        $sort_read = $request->input('sort_read');
        $sort_hidden = $request->input('sort_hidden');


        // 基準に合うカラム取得
        if ($sort_basis != null) {
            if ($sort_basis === 'likes') { // お気に入り順
                $query->withCount('likes')->orderBy('likes_count', 'desc')->take(500)->get();
            } else { // 再生回数順
                $query->where('id', $sort_basis)->get();
            }
        }


        // 期間に合うカラム取得
        // if ($sort_time != null) {
        //     $query->where('id', $sort_time)->get();
        // }


        // 完結作品のカラム取得
        if ($sort_complete != null) {
            if ($sort_complete === 'true') {
                $query->where('is_complete', 1)->get();
            }
        }


        // 読了作品のカラム取得
        // if ($sort_read != null) {
        //     $query->where('id', $sort_read)->get();
        // }


        // 非表示作品のカラム取得
        // if ($sort_hidden != null) {
        //     $query->where('id', $sort_hidden)->get();
        // }


        //1ページにつき50件ずつ表示
        $books = $query->paginate(100);
        return view('search.ranking', [
            'books' => $books,
        ]);
    }
}
