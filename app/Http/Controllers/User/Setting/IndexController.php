<?php

namespace App\Http\Controllers\User\Setting;

use App\Http\Controllers\Controller;
use App\Models\User;

class IndexController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
    }

    /*
    |--------------------------------------------------------------------------
    | 設定ページを返す
    |--------------------------------------------------------------------------
     */
    public function __invoke(string $username)
    {
        $user = User::byUsername($username)->first();

        return view('users.settings', compact('user'));
    }
}
