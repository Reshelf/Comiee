<?php

namespace App\Http\Controllers\Books;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
