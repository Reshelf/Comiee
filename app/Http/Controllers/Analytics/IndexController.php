<?php

namespace App\Http\Controllers\Analytics;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\User;
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
        $user = [];
        return view('analytics.index', [
            'user' => $user,
            'likes' => $user->likes ?? [], // お気に入り
            'reads' => $user->reads ?? [], // 閲覧履歴
            'boughts' => $user->bought ?? [], // 購入履歴
            'followedBooks' => $followedBooks ?? [], // お気に入り
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
