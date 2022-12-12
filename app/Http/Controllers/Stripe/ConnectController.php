<?php

namespace App\Http\Controllers\Stripe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\OAuth;
use Stripe\Stripe;

class ConnectController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Stripe Connectの子アカウント作成
    |--------------------------------------------------------------------------
    */
    public function __invoke(Request $request)
    {
        $user = Auth::user();
        if ($user === null) {
            abort(404);
        };

        $books = $user->books()->latest()->get() ?? [];

        $code = $request->query('code');
        if (empty($code)) {
            return view('users.settings.index', [
                'user' => $user,
                'books' => $books,
            ])->withErrors('Stripeとの連携に失敗しました');
        }

        Stripe::setApiKey(config('app.stripe_secret'));

        // アクセストークン取得
        $params = [
            'grant_type' => 'authorization_code',
            'code' => $code,
        ];
        $response = OAuth::token($params);

        // StripeアカウントIDを保存
        $user->stripe_user_id = $response->stripe_user_id;
        $user->save();

        return view('users.settings.index', [
            'user' => $user,
            'books' => $books,
        ])->withSuccess('Stripeとの連携に成功しました！');
    }
}
