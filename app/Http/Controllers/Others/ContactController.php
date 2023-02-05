<?php

namespace App\Http\Controllers\Others;

use App\Http\Controllers\Controller;
use App\Mail\others\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | お問い合わせ
    |--------------------------------------------------------------------------
     */
    public function __invoke(Request $request)
    {
        $email = 'support@comiee.one';

        Mail::to($email)->send(new ContactMail($request->user(), $request->body));
        return back()->withSuccess(__('運営にお問合わせをしました！回答をお待ちください！'));
    }
}
