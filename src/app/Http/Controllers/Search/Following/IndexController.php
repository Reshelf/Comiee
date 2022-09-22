<?php

namespace App\Http\Controllers\Search\Following;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Book;

class IndexController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /*
    |--------------------------------------------------------------------------
    | フォロー中 トップ
    |--------------------------------------------------------------------------
    |
    */
    public function __invoke(Request $request)
    {
        // フォロー中ユーザー
        // $following = Auth::user()->followings()->pluck('followee_id')->first();

        // if (!empty($following)) {
        $books = Book::query()
            ->whereIn('user_id', Auth::user()->followings()->pluck('followee_id')) // フォロー中ユーザー
            ->orWhere('user_id', Auth::user()->id) // 自分
            ->latest() // 最新順
            ->paginate(50);

        return view('search.following', compact('books'));
        // }
    }
}
