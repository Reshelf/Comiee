<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;

class AboutController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | 概要ページ
    |--------------------------------------------------------------------------
     */
    public function __invoke($lang, string $username)
    {
        $user = User::byUsername($username)->first();

        if ($user === null) {
            abort(404);
        }

        return view('users.about', [
            'user' => $user,
        ]);
    }
}
