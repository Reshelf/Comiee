<?php

namespace App\Http\Controllers\Stripe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\OAuth;
use Stripe\Stripe;

class ConnectSuccessController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Stripe 静的ページのテスト
    |--------------------------------------------------------------------------
    */
    public function __invoke(Request $request)
    {
        return view('users.stripe.connected', [
            'error' => false,
            'success' => true
        ]);
    }
}
