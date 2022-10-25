<?php

namespace App\Http\Controllers\Books;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $book = Book::where('id', $request->book_id)->first();

        /*
        |--------------------------------------------------------------------------
        | 最初の2話と最新から3,4話を無料にする
        |--------------------------------------------------------------------------
        */
        $latest = $episode->latest()->first();
        $latest_three = $episode->latest()->skip(2)->first();
        $latest->price = 80;
        $latest_three->is_free = true;
        $latest->save();
        $latest_three->save();

        $oldest = $episode->oldest()->first();
        $oldest_two = $episode->oldest()->skip(1)->first();
        $oldest->is_free = true;
        $oldest_two->is_free = true;
        $oldest->save();
        $oldest_two->save();

        /*
        |--------------------------------------------------------------------------
        | 閲覧回数を更新
        |--------------------------------------------------------------------------
        */
        if ($book->user->id !== Auth::user()->id) {
            $episode_total_views = 0;
            foreach ($book->episodes as $episode) {
                $episode_total_views += $episode->views;
            }
            $book->views = $episode_total_views;
            $book->save();
        }

        return view('books.show', [
            'book' => $book,
            'allTagNames' => $tag->all_tag_names,
        ]);
    }
}
