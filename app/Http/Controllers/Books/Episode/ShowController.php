<?php

namespace App\Http\Controllers\Books\Episode;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Episode;
use App\Models\Book;
use App\Models\Comment;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;

class ShowController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | エピソードの詳細
    |--------------------------------------------------------------------------
    */
    public function __invoke(Tag $tag, Request $request, Episode $e)
    {
        /*
        |--------------------------------------------------------------------------
        | データのセット | 作品、エピソード、コメント
        |--------------------------------------------------------------------------
        */
        $book = \Cache::rememberForever("book.{$request->book_id}", function () use ($request) {
            return Book::with('comments')->where('id', $request->book_id)->first();
        });

        $expiresAt = Carbon::now()->endOfDay()->addSecond();
        $episode = \Cache::remember("book.{$request->book_id}.{$request->episode_number}", $expiresAt, function () use ($book, $request) {
            return Episode::where(['book_id' => $book->id, 'number' => $request->episode_number])->first();
        });

        $episodes_latest = \Cache::rememberForever("book.{$request->book_id}.latest", function () use ($book, $request) {
            return Episode::where(['book_id' => $book->id, 'number' => $request->episode_number])->orderBy('created_at', 'desc')->get();
        });

        $comments = \Cache::rememberForever("book.{$request->book_id}.comments", function () use ($book, $episode, $request) {
            return Comment::where(['book_id' => $book->id, 'episode_id' => $episode->id, 'episode_number' => $request->episode_number])->withCount('likes')->orderBy('likes_count', 'desc')->get();
        });

        $allTags = \Cache::remember("allTags", now()->addHour(), function () use ($tag) {
            return $tag->all_tag_names;
        });

        /*
        |--------------------------------------------------------------------------
        | 最初の2話と最新から3,4話を無料にする
        |--------------------------------------------------------------------------
        */
        // 最初にリセット
        foreach ($book->episodes as $epi) {
            $epi->is_free = false;
            $epi->price = 50;
            $epi->save();
        }
        if ($book->episodes->count() > 0) {
            $oldest = $e->oldest()->first();
            $oldest->is_free = true;
            $oldest->price = 50;
            $oldest->save();
        }

        if ($book->episodes->count() > 2) {
            $oldest_two = $e->oldest()->skip(1)->first();
            $oldest_two->is_free = true;
            $oldest_two->price = 50;
            $oldest_two->save();
        }

        if ($book->episodes->count() > 2) {
            $latest = $e->latest()->first();
            $latest->price = 80;
            $latest->save();
        }

        if ($book->episodes->count() > 4) {
            $latest_three = $e->latest()->skip(2)->first();
            $latest_three->is_free = true;
            $latest_three->save();
        }


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
                $episode->reads()->detach($request->user()->id);
                $episode->reads()->attach($request->user()->id);
                $episode->views = $episode->count_reads;
                $episode->save();
            }
        }


        /*
        |--------------------------------------------------------------------------
        | 閲覧回数を更新
        |--------------------------------------------------------------------------
        */
        if (Auth::user()) {
            if ($book->user->id !== Auth::user()->id) {
                $episode_total_views = 0;
                foreach ($book->episodes as $e) {
                    $episode_total_views += $e->views;
                }
                $book->views = $episode_total_views;
                $book->save();
            }
        }

        // dump();

        return view('books.episode.show', [
            'book' => $book,
            'episode' => $episode,
            'episodes_latest' => $episodes_latest,
            'comments' => $comments,
            'allTags' => $allTags,
        ]);
    }
}
