<?php

namespace App\Http\Controllers\Analytics;

use App\Http\Controllers\Controller;
use App\Models\BookPageView;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | 本棚
    |--------------------------------------------------------------------------
    |
     */
    public function __invoke()
    {
        $user = Auth::user();

        // ユーザーと作品情報を含むページビューを取得
        $pageViews = BookPageView::withUserAndBook()->get();

        return view('analytics.index', [
            'user' => $user,
            'pageViews' => $pageViews ?? [], // ページビュー
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | 本のタイトルを追加
    |--------------------------------------------------------------------------
    |
     */
    private function addBookTitles($episodes)
    {
        if (isset($episodes)) {
            foreach ($episodes as $episode) {
                $episode->book_title = $episode->book ? $episode->book->title : '';
            }
        }
    }
}
