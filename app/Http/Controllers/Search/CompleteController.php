<?php

namespace App\Http\Controllers\Search;

use App\Http\Controllers\Controller;
use App\Models\Book;

class CompleteController extends Controller
{
    public function __invoke()
    {
        $books = Book::where('is_complete', true)->latest()->paginate(15);

        return view('search.complete', compact('books'));
    }
}
