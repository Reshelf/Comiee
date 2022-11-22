<?php

namespace App\Http\Controllers\Search;

use App\Http\Controllers\Controller;
use App\Models\Book;

class CompleteController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | 完結作品 一覧
    |--------------------------------------------------------------------------
    */
    public function __invoke()
    {
        $expiresAt = Carbon::now()->endOfDay()->addSecond();
        $books = \Cache::remember("books.is_complete", $expiresAt, function () {
            return Book::where('is_complete', true)->latest()->paginate(50);
        });

        return view('search.complete', compact('books'));
    }
}
