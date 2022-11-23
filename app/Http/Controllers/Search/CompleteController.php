<?php

namespace App\Http\Controllers\Search;

use App\Models\Book;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class CompleteController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | 完結作品 一覧
    |--------------------------------------------------------------------------
    */
    public function __invoke()
    {
        $books = \Cache::remember("books.is_complete", Carbon::now()->endOfDay()->addSecond(), function () {
            return Book::where('is_complete', true)->latest()->paginate(50);
        });

        return view('search.complete', compact('books'));
    }
}
