<?php

namespace App\Http\Controllers\Books;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use App\Models\Book;
use App\Models\Episode;
use App\Models\Tag;

class ShowController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | 作品の詳細
    |--------------------------------------------------------------------------
    */
    public function __invoke(Request $request, Tag $tag, Episode $episode)
    {
        $book = \Cache::rememberForever("book.{$request->book_id}", function () use ($request) {
            return Book::where('id', $request->book_id)->first();
        });

        $expiresAt = Carbon::now()->endOfDay()->addSecond();
        $allTags = \Cache::remember("allTags", $expiresAt, function () use ($tag) {
            return $tag->all_tag_names;
        });

        $episodes_latest = $book->episodes()->orderBy('created_at', 'desc')->get();


        /*
        |--------------------------------------------------------------------------
        | 最初の2話と最新から3,4話を無料にする
        |--------------------------------------------------------------------------
        */
        // 最初にリセット
        // foreach ($book->episodes as $episode) {
        //     $episode->is_free = false;
        //     $episode->price = 50;
        //     $episode->save();
        // }
        // if ($book->episodes->count() > 0) {
        //     $oldest = $episode->oldest()->first();
        //     $oldest->is_free = true;
        //     $oldest->price = 50;
        //     $oldest->save();
        // }

        // if ($book->episodes->count() > 2) {
        //     $oldest_two = $episode->oldest()->skip(1)->first();
        //     $oldest_two->is_free = true;
        //     $oldest_two->price = 50;
        //     $oldest_two->save();
        // }

        // if ($book->episodes->count() > 2) {
        //     $latest = $episode->latest()->first();
        //     $latest->price = 80;
        //     $latest->save();
        // }

        // if ($book->episodes->count() > 4) {
        //     $latest_three = $episode->latest()->skip(2)->first();
        //     $latest_three->is_free = true;
        //     $latest_three->save();
        // }

        /*
        |--------------------------------------------------------------------------
        | 閲覧回数を更新
        |--------------------------------------------------------------------------
        */
        if (Auth::user()) {
            if ($book->user->id !== Auth::user()->id) {
                $episode_total_views = 0;
                foreach ($book->episodes as $episode) {
                    $episode_total_views += $episode->views;
                }
                $book->views = $episode_total_views;
                $book->save();
            }
        }

        return view('books.show', [
            'book' => $book,
            'episodes_latest' => $episodes_latest,
            'allTags' => $allTags,
        ]);
    }
}
