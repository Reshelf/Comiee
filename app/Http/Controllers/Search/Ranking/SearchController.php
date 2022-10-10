<?php

namespace App\Http\Controllers\Search\Ranking;

use App\Http\Controllers\Controller;

use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Models\Book;

class SearchController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | ランキングのソート
    |--------------------------------------------------------------------------
    |
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
            } elseif ($sort_basis === '閲覧回数') {
                $query->orderBy('views', 'desc')->get();
            }
        }


        // 期間
        if ($sort_time != null) {
            if ($sort_time === '年間') {
                $year = Carbon::today()->subDay(365);
                $query->whereDate('created_at', $year)->get();
            } elseif ($sort_time === '月間') {
                $month = Carbon::today()->subDay(30);
                $query->whereDate('created_at', $month)->get();
            } elseif ($sort_time === '週間') {
                $week = Carbon::today()->subDay(7);
                $query->whereDate('created_at', $week)->get();
            }
        }


        // 完結作品のカラム取得
        if ($sort_complete != null) {
            if ($sort_complete === '完結作品のみ') {
                $query->where('is_complete', 1)->get();
            }
        }


        // 読了作品のカラム取得 → 中間テーブル
        if ($sort_read != null) {
            if ($sort_read === '読了作品のみ') {
            }
        }
        // ユーザー = users、 作品 = books
        // 「読了」 は多対多なので 中間テーブルが必要
        // php artisan make:migration 〇〇〜 で中間テーブルを作成
        // 中間テーブルでuser_idとbook_idを取得して ＋ 読了フラグをつける
        // https://qiita.com/morikuma709/items/9fde633db9171b36a068


        // 非表示作品のカラム取得 → 中間テーブル
        if ($sort_hidden != null) {
            if ($sort_hidden === '非表示作品は除く') {
            }
        }


        //1ページにつき100件ずつ表示
        $books = $query->paginate(100);
        return view('search.ranking', [
            'books' => $books,
        ]);
    }
}
