<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShelfController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /*
    |--------------------------------------------------------------------------
    | 本棚
    |--------------------------------------------------------------------------
    |
     */
    public function __invoke(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | お気に入り or 閲覧履歴 or 購入履歴
        |--------------------------------------------------------------------------
        |
         */

        $path = $request->path('');
        $type = substr($path, 9);

        /*
        |--------------------------------------------------------------------------
        | ユーザー
        |--------------------------------------------------------------------------
        |
         */

        $username = Auth::user()->username;
        $user = User::where('username', $username)->first();

        /*
        |--------------------------------------------------------------------------
        | お気に入り
        |--------------------------------------------------------------------------
        |
         */

        if ($type === 'like') {
            $query = $user->likes();
            $feature = $request->input('feature');

            if ($feature != null) {
                if ($feature === '完結作品のみ') {
                    $query->where(['is_complete' => 1])->latest();
                }
            }
        }

        /*
        |--------------------------------------------------------------------------
        | 閲覧履歴
        |--------------------------------------------------------------------------
        |
         */

        if ($type === 'view_history') {
            $query = $user->reads();
            $feature = $request->input('feature');

            if ($feature != null) {
                if ($feature === '完結作品のみ') {
                    $query->where(['is_complete' => 1])->latest();
                }
            }
        }

        /*
        |--------------------------------------------------------------------------
        | 購入履歴
        |--------------------------------------------------------------------------
        |
         */

        if ($type === 'purchase_history') {
            $query = $user->bought();
            $feature = $request->input('feature');

            if ($feature != null) {
                if ($feature === '完結作品のみ') {
                    $query->where(['is_complete' => 1])->latest();
                }
            }
        }

        $books = $query->paginate(15);
        return view('users.shelf.index', [
            'books' => $books,
            'feature' => $feature,
            'type' => $type,
        ]);
    }
}
