<?php

namespace App\Http\Controllers\Analytics;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
    }

    /*
    |--------------------------------------------------------------------------
    | 分析ページ
    |--------------------------------------------------------------------------
    |
     */
    public function __invoke()
    {
        $user = Auth::user();

        // 作品ページビュー,お気に入り数、いいね数、離脱率を取得
        $books = $user->books()
            ->with(['pageViews', 'exitEvents'])
            ->withCount('likes')
            ->latest()
            ->get()
            ->map(function ($book) {
                $book->count_episode_likes = $book->countEpisodeLikes(); // エピソードのいいね数
                $book->bounce_rate = $book->bounceRate(); // 離脱率
                return $book;
            });

        return view('analytics.index', [
            'user' => $user,
            'books' => $books ?? [],
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
