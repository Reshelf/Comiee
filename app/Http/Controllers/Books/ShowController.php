<?php

namespace App\Http\Controllers\Books;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;

use App\Models\Book;
use App\Models\Tag;

class ShowController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | 作品の詳細
    |--------------------------------------------------------------------------
    */
    public function __invoke(Request $request, Tag $tag)
    {
        $book = Book::where('id', $request->book_id)->first();

        // 閲覧回数を更新
        $book->views = $book->book_views;
        $book->save();

        return view('books.show', [
            'book' => $book,
            'tagNames' => $book->tag_names,
            'allTagNames' => $tag->all_tag_names,
        ]);
    }
}
