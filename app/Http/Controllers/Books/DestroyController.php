<?php

namespace App\Http\Controllers\Books;

use App\Http\Controllers\Controller;
use App\Models\Book;

class DestroyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
    }

    /*
    |--------------------------------------------------------------------------
    | 作品の削除
    |--------------------------------------------------------------------------
    */
    public function __invoke(Book $book)
    {
        $this->authorize('delete', $book);

        $book->delete();
        return back();
    }
}
