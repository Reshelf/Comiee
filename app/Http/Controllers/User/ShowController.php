<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

// use DB;

class ShowController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | プロフィール
    |--------------------------------------------------------------------------
     */
    public function __invoke($lang, string $username)
    {
        $user = \Cache::rememberForever("user.{$username}", function () use ($username) {
            return User::where('username', $username)->first();
        });

        // 存在しないユーザーページにアクセスしたら 404を返す
        if ($user === null) {
            abort(404);
        }

        // 言語未設定なら設定する
        if (Auth::user() && isset($user->lang) && $user->id === Auth::user()->id) {
            $user->lang = App::getLocale();
            $user->save();
        }

        $books = $user->books()->latest()->get() ?? [];

        return view('users.show', [
            'user' => $user,
            'books' => $books,
        ]);
    }
}
