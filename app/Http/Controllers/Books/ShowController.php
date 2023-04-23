<?php

namespace App\Http\Controllers\Books;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\BookPageView;
use App\Models\Episode;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShowController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | 作品の詳細
    |--------------------------------------------------------------------------
     */
    public function __invoke(Request $request, Tag $tag, Episode $episode)
    {
        $book = Book::where('title', $request->book_title)->firstOrFail();

        $allTags = $tag->all_tag_names;

        $episodes_latest = $book->episodes()->orderBy('created_at', 'desc')->get();

        $total_likes = $book->totalLikes();

        if (Auth::check()) {
            if ($book->user->id !== Auth::id()) {

                /*
                |--------------------------------------------------------------------------
                | エピソードの総閲覧回数を更新
                |--------------------------------------------------------------------------
                 */
                $episode_total_views = 0;
                foreach ($book->episodes as $episode) {
                    $episode_total_views += $episode->views;
                }
                $book->views = $episode_total_views;

                if ($book->is_hidden) {
                    abort(404);
                }

                /*
                |--------------------------------------------------------------------------
                | 作品ページビュー数を更新 作者とログインユーザーが同じ場合は更新しない
                |--------------------------------------------------------------------------
                 */
                $book->page_views = $book->page_views + 1;
                $book->save();
            }

            /*
            |--------------------------------------------------------------------------
            | ユーザーデータを収集
            |--------------------------------------------------------------------------
             */
            $userId = Auth::id();
            $bookPageView = new BookPageView([
                'user_id' => $userId,
                'book_id' => $book->id,
            ]);
            $bookPageView->save();
        }

        return view('books.show', [
            'book' => $book,
            'episodes_latest' => $episodes_latest,
            'allTags' => $allTags,
            'total_likes' => $total_likes,
        ]);
    }
}
