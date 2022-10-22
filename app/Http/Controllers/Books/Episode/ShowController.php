<?php

namespace App\Http\Controllers\Books\Episode;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Episode;
use App\Models\Book;
use App\Models\Tag;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;

class ShowController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /*
    |--------------------------------------------------------------------------
    | エピソードの詳細
    |--------------------------------------------------------------------------
    */
    public function __invoke(Tag $tag, Request $request)
    {
        // 作品
        $book = Book::where('id', $request->book_id)->first();
        // エピソード
        $episode_story = Episode::where('number', $request->episode_number)->first();
        // エピソードのコメント
        $episode_comments = Comment::where('episode_id', $request->episode_number)->get();

        /*
        |--------------------------------------------------------------------------
        | 今日の新作から削除 | エピソード投稿 + 1日後 < 今 だったら
        |--------------------------------------------------------------------------
        | エピソードが、１人にも読まれていない場合は今日の新作から削除しないようにする
        */
        $today = new Carbon('now');
        $plus_oneday = new Carbon($episode_story->created_at->addDay());
        if ($today->gt($plus_oneday)) {
            $book->is_new = false;
            $book->save();
        }

        // 作者以外で未読なら
        if (Auth::user()) {
            if ($book->user->id !== Auth::user()->id) {
                if (!is_null($episode_story->is_read)) {
                    $episode_story->is_read = true;
                    $episode_story->save();
                }
            }
        }

        return view('books.episode.show', [
            'book' => $book,
            'episodes' => $book->book_episodes,
            'episode_story' => $episode_story,
            'episode_comments' => $episode_comments,
            'tagNames' => $book->tag_names,
            'allTagNames' => $tag->all_tag_names,
        ]);
    }
}
