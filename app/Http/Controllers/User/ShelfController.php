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
        $this->middleware('signed')->only('verify');
    }

    /*
    |--------------------------------------------------------------------------
    | 本棚
    |--------------------------------------------------------------------------
    |
     */
    public function __invoke(Request $request)
    {
        $username = Auth::user()->username;
        $user = User::byUsername($username)->first();

        return view('users.shelf.index', [
            'user' => $user,
            'likes' => $user->likes, // お気に入り
            'reads' => $user->reads, // 閲覧履歴
            'boughts' => $user->bought, // 購入履歴
        ]);
    }
}
