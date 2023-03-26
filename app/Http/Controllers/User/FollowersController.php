<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;

class FollowersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /*
    |--------------------------------------------------------------------------
    | フォロワー一覧
    |--------------------------------------------------------------------------
     */
    public function __invoke(string $username)
    {
        $user = \Cache::rememberForever("user.{$username}", function () use ($username) {
            return User::byUsername($username)->first();
        });

        $followers = $user->followers->sortByDesc('created_at');

        return view('users.followers', [
            'user' => $user,
            'followers' => $followers,
        ]);
    }
}
