<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ShelfController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | 本棚
    |--------------------------------------------------------------------------
    |
     */
    public function __invoke()
    {
        if (Auth::user()) {
            $username = Auth::user()->username;
            $user = User::byUsername($username)->first();
        }

        return view('users.shelf.index', [
            'user' => $user ?? [],
            'likes' => $user->likes ?? [], // お気に入り
            'reads' => $user->reads ?? [], // 閲覧履歴
            'boughts' => $user->bought ?? [], // 購入履歴
        ]);
    }
}
