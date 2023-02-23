<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
// use App\Mail\user\RegisterdUserMail;
use Illuminate\Support\Carbon;
// use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;
use Laravel\Socialite\Facades\Socialite;

class RegisterController extends Controller
{
    use RegistersUsers;
    protected $redirectTo = '/email/verify';
    public function __construct()
    {
        $this->middleware('guest');
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', ':filter,dns', 'max:255', 'unique:users'],
            'password' => ['required', Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->uncompromised()],
        ]);
    }
    protected function create(array $data)
    {
        $email = $data['email'];
        $password = Hash::make($data['password']);
        $gender = $data['gender'];

        // 誕生日
        $date = Carbon::createFromFormat('Y-m-d', $data['birth']);
        $birth = $date->format('Y-m-d');

        // ユーザー番号をランダムで生成する
        do {
            $username = 'user-' . Str::random(20);
        } while (User::where('username', $username)->exists());
        $name = $username;

        /*
        |--------------------------------------------------------------------------
        | 言語の設定 用意してない言語はデフォルトで英語を返し保存しとく
        |--------------------------------------------------------------------------
         */
        $langs = explode(', ', $_SERVER['HTTP_ACCEPT_LANGUAGE']);
        $langs_val = [];
        foreach ($langs as $lang) {
            $langs_val[] = substr($lang, 0, 2);
        }
        $lang = $langs_val[0];
        \App::setLocale($lang);
        if ($lang !== 'ja' && 'en' && 'tw' && 'cn' && 'es' && 'fr' && 'it' && 'id' && 'th' && 'ko' && 'de') {
            \App::setLocale('en');
            $lang = 'en';
        }

        return User::create([
            'name' => $name,
            'username' => $username,
            'email' => $email,
            'password' => $password,
            'lang' => $lang,
            'birth' => $birth,
            'gender' => $gender,
        ]);
    }

    public function showProviderUserRegistrationForm(Request $request, string $provider)
    {
        $token = $request->token;

        $providerUser = Socialite::driver($provider)->userFromToken($token);

        return view('auth.social_register', [
            'provider' => $provider,
            'email' => $providerUser->getEmail(),
            'token' => $token,
        ]);
    }

    public function registerProviderUser(Request $request, string $provider)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:2', 'max:20'],
            'username' => ['required', 'string', 'alpha_num', 'min:3', 'max:16', 'unique:users'],
            'token' => ['required', 'string'],
        ]);

        $token = $request->token;

        $providerUser = Socialite::driver($provider)->userFromToken($token);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $providerUser->getEmail(),
            'password' => null,
        ]);

        $this->guard()->login($user, true);

        return $this->registered($request, $user)
        ?: redirect($this->redirectPath());
    }
}
