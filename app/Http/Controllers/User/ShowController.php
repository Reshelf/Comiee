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
        /*
        |--------------------------------------------------------------------------
        | ユーザーを返す
        |--------------------------------------------------------------------------
         */
        $user =
        // \Cache::rememberForever("user.{$username}", function () use ($username) {
        User::where('username', $username)->first();
        // });

        /*
        |--------------------------------------------------------------------------
        | 存在しないユーザーページにアクセスしたら 404を返す
        |--------------------------------------------------------------------------
         */
        if ($user === null) {
            abort(404);
        }

        if (Auth::user() && $user->id === Auth::user()->id) {

            /*
            |--------------------------------------------------------------------------
            | 言語未設定なら自動で設定
            |--------------------------------------------------------------------------
             */
            if (empty($user->lang)) {
                $user->lang = App::getLocale();
            }

            /*
            |--------------------------------------------------------------------------
            | 国が未設定なら自動で設定
            |--------------------------------------------------------------------------
             */
            // if (empty($user->country)) {
            $ip = ip2long($_SERVER['REMOTE_ADDR']); // ipアドレス取得
            $url = file_get_contents('http://www.geoplugin.net/json.gp?ip=' . $ip); // 地理apiで国を割り出す
            $getInfo = json_decode($url); // データをjson形式に
            $user->country = strtolower($getInfo->geoplugin_countryCode); // 国名を小文字で保存
            // }
            $user->save();
        };

        /*
        |--------------------------------------------------------------------------
        | 作品があれば返す
        |--------------------------------------------------------------------------
         */
        $books = $user->books()->latest()->get() ?? [];

        return view('users.show', [
            'user' => $user,
            'books' => $books,
        ]);
    }
}
