<?php

namespace App\Http\Controllers\Books\Episode;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Episode;
use App\Models\Book;
use App\Models\Tag;
use App\Models\EpisodeRead;
use Illuminate\Support\Facades\Auth;

class ShowController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($book, $episode)
    {
        $book = Book::where('id', $book)->first();
        $episodes = $book->episodes()->orderBy('created_at', 'desc')->get(); // 新しい順でチャプターを取得
        $story = Episode::where('id', $episode)->first();
        $counts = count($episodes); // 話数の番号
        $book_views = count($book->episodes()->where('is_read', true)->get());

        $tagNames = $book->tags->map(function ($tag) {
            return ['text' => $tag->name];
        });
        $allTagNames = Tag::all()->map(function ($tag) {
            return ['text' => $tag->name];
        });

        // 作者以外で未読なら
        if ($book->user->id !== Auth::user()->id) {
            if (!is_null($story->is_read)) {
                $story->is_read = true;
                $story->save();
            }
        }

        return view('books.episode.show', [
            'book' => $book,
            'episodes' => $episodes,
            'episode' => $story,
            'counts' => $counts,
            'tagNames' => $tagNames,
            'allTagNames' => $allTagNames,
            'book_views' => $book_views
        ]);
    }
}
