<?php

namespace App\Http\Controllers\Books\Episode;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShowController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | エピソード詳細
    |--------------------------------------------------------------------------
     */
    public function __invoke(Tag $tag, Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | データセット
        |--------------------------------------------------------------------------
         */
        $book = Book::with(['comments', 'episodes' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }])
            ->where('title', $request->book_title)
            ->firstOrFail();

        $episode = $book->episodes->firstWhere('number', $request->episode_number);
        if ($episode === null) {
            abort(404);
        }

        $allTags = \Cache::remember("allTags", now()->addHour(), fn() => $tag->all_tag_names);

        /*
        |--------------------------------------------------------------------------
        | 既読処理
        |--------------------------------------------------------------------------
         */
        if (Auth::user() && $book->user->id !== Auth::user()->id) {
            $episode->registerReadBy(Auth::user());
            $book->updateViews();
        }

        /*
        |--------------------------------------------------------------------------
        | 今日の新作
        |--------------------------------------------------------------------------
         */
        $today = Carbon::now();
        if ($today->gt($episode->created_at->addDay()) && !$episode->reads->count()) {
            $book->update(['is_new' => false]);
        }

        return view('books.episode.show', [
            'book' => $book,
            'episode' => $episode,
            'episodes_latest' => $book->episodes,
            'comments' => $episode->commentsWithLikesCount(),
            'allTags' => $allTags,
        ]);
    }
}
