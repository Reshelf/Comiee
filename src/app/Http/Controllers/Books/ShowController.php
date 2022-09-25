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
    public function __invoke(string $book, Tag $tag)
    {
        $book = Book::where('id', $book)->first(); // 特定の本のidを取得
        $episodes = $book->episodes()->orderBy('created_at', 'desc')->get(); // 新しい順でチャプターを取得
        // $book_views = count($book->episodes()->where('is_read', true)->get());
        
        return view('books.show', [
            'book' => $book,
            'episodes' => $episodes,
            'tagNames' => $book->tag_names,
            'allTagNames' => $tag->all_tag_names,
            'book_views' => $book->book_views
        ]);
    }
}
