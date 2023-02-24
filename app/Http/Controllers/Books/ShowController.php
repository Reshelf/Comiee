<?php

namespace App\Http\Controllers\Books;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Episode;
use App\Models\Tag;
use Carbon\Carbon;
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
        $book =
        // \Cache::rememberForever("book.{$request->book_id}", function () use ($request) {
        //     return
        Book::where('id', $request->book_id)->first();
        // });

        // 存在しない作品は404
        if ($book === null) {
            abort(404);
        }

        $expiresAt = Carbon::now()->endOfDay()->addSecond();
        $allTags = \Cache::remember("allTags", $expiresAt, function () use ($tag) {
            return $tag->all_tag_names;
        });

        $episodes_latest = $book->episodes()->orderBy('created_at', 'desc')->get();

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
