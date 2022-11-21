<?php

namespace App\Http\Controllers\User\Setting;

use App\Http\Controllers\Controller;

use App\Models\User;

class IndexController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /*
    |--------------------------------------------------------------------------
    | 設定
    |--------------------------------------------------------------------------
    */
    public function __invoke(string $username)
    {
        $user = \Cache::rememberForever("user.{$username}", function () use ($username) {
            return User::where('username', $username)->first();
        });

        return view('users.settings.index', compact('user'));
    }
}
