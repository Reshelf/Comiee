<?php

namespace App\Http\Controllers\Api\Search;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class GetBooksController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | キーワード検索
    |--------------------------------------------------------------------------
     */
    public function __invoke()
    {
        $books = DB::table('books')->paginate(20);

        return response()->json($books);
    }
}
