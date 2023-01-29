<?php

namespace App\Http\Controllers\Stripe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConnectSuccessController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
    }

    /*
    |--------------------------------------------------------------------------
    | Stripe 静的ページのテスト
    |--------------------------------------------------------------------------
     */
    public function __invoke(Request $request)
    {
        return view('users.stripe.connected', [
            'error' => false,
            'success' => true,
        ]);
    }
}
