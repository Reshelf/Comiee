<?php

namespace App\Http\Controllers\Books\Episode;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Episode;
use App\Models\Book;
use App\Models\Tag;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class ShowController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($book, Request $request)
    {
        // 作品
        $book = Book::where('id', $request->book_id)->first();
        // エピソード全体
        $episodes = $book->episodes()->orderBy('created_at', 'desc')->get(); // 新しい順でチャプターを取得
        // エピソード
        $episode_story = Episode::where('number', $request->episode_number)->first();
        // dd($request->episode_number);
        // エピソードのコメント
        $episode_comments = Comment::where('episode_id', $request->episode_number)->get();
        // dd($episode_comments);

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
            'episodes' => $episodes,
            'episode_story' => $episode_story,
            'episode_comments' => $episode_comments,
            'tagNames' => $book->tag_names,
            'allTagNames' => $tag->all_tag_names,
            'book_views' => $book->book_views
        ]);
    }
}
