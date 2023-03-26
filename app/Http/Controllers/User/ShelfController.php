<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ShelfController extends Controller
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
        if (Auth::user()) {
            $username = Auth::user()->username;
            $user = User::byUsername($username)->first();
            $followings = $user->followings;

            // フォロー中の作者のIDの配列を取得
            $followedUserIds = $user->followings->pluck('id')->toArray();

            // フォロー中の作者の作品一覧
            $followedBooks = Book::whereIn('user_id', $followedUserIds)->where('is_hidden', false)->get();

            $this->addBookTitles($user->likes);
            $this->addBookTitles($user->reads);
            $this->addBookTitles($user->boughts);
            $this->addBookTitles($followedBooks);
        }

        return view('users.shelf.index', [
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
