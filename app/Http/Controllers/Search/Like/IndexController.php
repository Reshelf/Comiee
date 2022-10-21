<?php

namespace App\Http\Controllers\Search\Like;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Book;
use App\Models\User;

class IndexController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /*
    |--------------------------------------------------------------------------
    | お気に入り : トップ
    |--------------------------------------------------------------------------
    |
    */
    public function __invoke(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->first();

        // ユーザーのお気に入り
        $books = $user->likes()->paginate(15);

        return view('search.like', [
            'books' => $books,
            'genre_id' => 0,
            'sort' => 'お気に入り数',
            'feature' => '全ての作品'
        ]);
    }
}
