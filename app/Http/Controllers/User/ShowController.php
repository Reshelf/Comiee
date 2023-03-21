<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class ShowController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | プロフィール
    |--------------------------------------------------------------------------
     */
    public function __invoke($lang, string $username)
    {
        $user = $this->getUserByUsername($username);

        if (Auth::user() && $user->id === Auth::user()->id) {
            $this->updateUserLanguageAndCountry($user);
        }

        $books = $user->books()->latest()->get() ?? [];

        return view('users.show', [
            'user' => $user,
            'books' => $books,
        ]);
    }

    private function getUserByUsername($username)
    {
        $user = User::byUsername($username)->first();

        if ($user === null) {
            abort(404);
        }

        return $user;
    }

    private function updateUserLanguageAndCountry(User $user)
    {
        if (empty($user->lang)) {
            $user->lang = App::getLocale();
        }

        if (getenv('APP_ENV') === 'production') {
            $ip = $_SERVER['HTTP_CF_CONNECTING_IP']; // cloudflareを通す場合
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        $url = file_get_contents('http://www.geoplugin.net/json.gp?ip=' . $ip);
        $getInfo = json_decode($url);
        $user->country = strtolower($getInfo->geoplugin_countryCode);

        $user->save();
    }
}
