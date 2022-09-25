<?php

namespace App\Http\Controllers\Search\Like;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | お気に入り : ソート
    |--------------------------------------------------------------------------
    |
    */
    public function __invoke(Book $book, Request $request)
    {
        // 検索結果を１度に返すクエリを宣言
        $query = Book::query();


        //$request->input()で検索時に入力した項目を取得
        $sort_basis = $request->input('sort_basis');
        $sort_complete = $request->input('sort_complete');
        $sort_unread = $request->input('sort_unread');
        $sort_add = $request->input('sort_add');
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


        // 完結作品
        if ($sort_complete != null) {
            if ($sort_complete === '完結作品のみ') {
                $query->where('is_complete', 1)->get();
            }
        }


        // 未読作品
        if ($sort_unread != null) {
            if ($sort_unread === '未読作品のみ') {
            }
        }


        // 追加順
        if ($sort_add != null) {
            if ($sort_add === '追加順') {
            }
        }


        // 読了作品
        if ($sort_read != null) {
            if ($sort_read === '読了作品のみ') {
            }
        }


        // 非表示作品
        if ($sort_hidden != null) {
            if ($sort_hidden === '非表示作品は除く') {
            }
        }


        //1ページにつき100件ずつ表示
        $books = $query->paginate(100);
        return view('search.like', [
            'books' => $books,
        ]);
    }
}
