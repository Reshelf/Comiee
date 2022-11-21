<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
// use DB;

class ShowController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | プロフィール
    |--------------------------------------------------------------------------
    */
    public function __invoke(string $username)
    {
        $user = \Cache::rememberForever("user.{$username}", function () use ($username) {
            return User::where('username', $username)->first();
        });

        // 存在しないユーザーページにアクセスしたら 404を返す
        if ($user === null) {
            abort(404);
        }

        $books = $user->books()->latest()->get();

        return view('users.show', compact('user', 'books'));
    }
}
