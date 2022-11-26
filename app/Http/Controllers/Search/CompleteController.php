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
        $pickup = ['is_complete' => true, 'is_hidden' => false];
        $books = \Cache::remember("books.is_complete", Carbon::now()->endOfDay()->addSecond(), function () use ($pickup) {
            return Book::where($pickup)->latest()->paginate(50);
        });

        return view('search.complete', compact('books'));
    }
}
