<?php

namespace App\Http\Controllers\Books;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Tag;
use Illuminate\Http\Request;

class EditController extends Controller
{
    /**
     * 作品の編集
     * ポリシー(src/app/Policies/BookPolicy.php)
     */
    public function __invoke(Book $book, Request $request)
    {
        $this->authorize('update', $book);

        $tagNames = $book->tags->map(function ($tag) {
            return ['text' => $tag->name];
        });

        $allTagNames = Tag::all()->map(function ($tag) {
            return ['text' => $tag->name];
        });

        return view('books.edit', [
            'book' => $book,
            'tagNames' => $tagNames,
            'allTagNames' => $allTagNames,
        ]);
    }
}
