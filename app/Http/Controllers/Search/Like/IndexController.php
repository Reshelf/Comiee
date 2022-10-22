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
        $query = $user->likes();

        $feature = $request->input('feature');
        // $books = $likes->where('likes_count', '>', 0);

        if ($feature != null) {
            if ($feature === '完結作品のみ') {
                $query->where('is_complete', 1)->latest();
            }
        }

        $books = $query->paginate(15);
        return view('search.like.index', [
            'books' => $books,
            'feature' => $feature
        ]);
    }
}
