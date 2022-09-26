<?php

namespace App\Http\Controllers\Api\Search;

use App\Http\Controllers\Controller;
use App\Models\Book;

class SearchWordController extends Controller
{

    /**
     * 作品の削除
     * ポリシー(src/app/Policies/BookPolicy.php)
     */
    public function __invoke(Book $book)
    {
        $all = Book::all()->sortByDesc('created_at')
            ->load(['user']);
        // $collection = collect($all);
        // $books = $collection->pluck("title", "author", "manga_artist");

        return response()->json($all);
    }
}
