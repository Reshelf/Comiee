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


        $books = $query->where(['is_hidden' => false])->paginate(15);
        return view('search.ranking.index', [
            'books' => $books,
        ]);
    }
}
