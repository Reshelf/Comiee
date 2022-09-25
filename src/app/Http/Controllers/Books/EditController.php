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
    public function __invoke(Book $book, Tag $tag Request $request)
    {
        $this->authorize('update', $book);

        return view('books.edit', [
            'book' => $book,
            'tagNames' => $book->tag_names,
            'allTagNames' => $tag->all_tag_names,
        ]);
    }
}
