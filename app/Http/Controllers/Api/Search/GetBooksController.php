<?php

namespace App\Http\Controllers\Api\Search;

use App\Http\Controllers\Controller;
use App\Models\Book;

class GetBooksController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | トップページ
    |--------------------------------------------------------------------------
     */
    public function __invoke()
    {
        // 非公開 & 休載は外す
        $books = Book::where(['is_hidden' => false, 'is_suspend' => false])->paginate(20);

        return response()->json($books);
    }
}
