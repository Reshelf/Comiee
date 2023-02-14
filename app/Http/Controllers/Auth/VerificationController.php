<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\VerifiesEmails;

class VerificationController extends Controller
{
    use VerifiesEmails;
    protected $redirectTo;
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:3,1')->only('verify', 'resend');

        // ユーザーの好み選択ページに飛ばす
        $this->redirectTo = '/' . app()->getLocale() . '/users/setup';
    }
}
