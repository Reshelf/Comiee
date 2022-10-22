<?php

namespace App\Http\Controllers\Books\Episode;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Episode;
use App\Models\Book;
use App\Models\Tag;
use App\Models\Read;
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
        /*
        |--------------------------------------------------------------------------
        | データのセット | 作品、エピソード、コメント
        |--------------------------------------------------------------------------
        */
        $book = Book::where('id', $request->book_id)->first();
        $episode = Episode::where('number', $request->episode_number)->first();
        $episode_comments = Comment::where('episode_id', $request->episode_number)->get();


        /*
        |--------------------------------------------------------------------------
        | 今日の新作から削除 | エピソード投稿 + 1日後 < 今 だったら
        |--------------------------------------------------------------------------
        | エピソードが、１人にも読まれていない場合は今日の新作から削除しないようにする
        */
        $today = new Carbon('now');
        $plus_oneday = new Carbon($episode->created_at->addDay());
        if ($today->gt($plus_oneday)) {
            $book->is_new = false;
            $book->save();
        }


        /*
        |--------------------------------------------------------------------------
        | 既読 | 作者以外なら
        |--------------------------------------------------------------------------
        | 既読の中間テーブルを更新
        | 既読の数をエピソードの閲覧数に入れ直す
        |
        | もしログインユーザーが既読していたら,エピソードの既読フラグをtrueにする
        */
        if (Auth::user()) {
            if ($book->user->id !== Auth::user()->id) {
                $episode->reads()->sync($request->user()->id);
                $episode->views = $episode->count_reads;

                $episode->save();
            }
        }


        return view('books.episode.show', [
            'book' => $book,
            'episode_story' => $episode,
            'episode_comments' => $episode_comments,
            'tagNames' => $book->tag_names,
            'allTagNames' => $tag->all_tag_names,
        ]);
    }
}
