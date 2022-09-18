<?php

namespace App\Http\Controllers\Books;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Tag;

class ShowController extends Controller
{
    /**
     * 作品の詳細
     */
    public function __invoke(string $book)
    {
        $book = Book::where('id', $book)->first(); // 特定の本のidを取得
        $episodes = $book->episodes()->orderBy('created_at', 'desc')->get(); // 新しい順でチャプターを取得
        $counts = count($episodes); // 話数の番号
        $book_views = count($book->episodes()->where('is_read', true)->get());

        $tagNames = $book->tags->map(function ($tag) {
            return ['text' => $tag->name];
        });
        $allTagNames = Tag::all()->map(function ($tag) {
            return ['text' => $tag->name];
        });

        return view('books.show', [
            'book' => $book,
            'episodes' => $episodes,
            'counts' => $counts,
            'tagNames' => $tagNames,
            'allTagNames' => $allTagNames,
            'book_views' => $book_views
        ]);
    }
}
