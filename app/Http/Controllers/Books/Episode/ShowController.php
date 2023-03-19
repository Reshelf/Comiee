<?php

namespace App\Http\Controllers\Books\Episode;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Episode;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShowController extends Controller
{
    public function __invoke(Tag $tag, Request $request, Episode $e)
    {
        $book = Book::with(['comments', 'episodes' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }])
            ->where('id', $request->book_id)
            ->firstOrFail();

        $episode = $book->episodes->firstWhere('number', $request->episode_number);
        if ($episode === null) {
            abort(404);
        }

        if (Auth::user() && $book->user->id !== Auth::user()->id) {
            $episode->registerReadBy(Auth::user());
            $book->updateViews();
        }

        $today = Carbon::now();
        if ($today->gt($episode->created_at->addDay()) && !$episode->reads->count()) {
            $book->update(['is_new' => false]);
        }

        $allTags = \Cache::remember("allTags", now()->addHour(), fn() => $tag->all_tag_names);

        return view('books.episode.show', [
            'book' => $book,
            'episode' => $episode,
            'episodes_latest' => $book->episodes,
            'comments' => $episode->commentsWithLikesCount(),
            'allTags' => $allTags,
        ]);
    }
}
