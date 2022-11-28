<?php

namespace App\Http\Controllers\Others;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use App\Mail\others\ContactMail;

class ContactController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | お問い合わせ
    |--------------------------------------------------------------------------
    */
    public function __invoke(Request $request)
    {
        $email = 'info@starbooks.one';

        Mail::to($email)->send(new ContactMail($request->user(), $request->body));
        return back()->withSuccess('運営にお問合わせをしました！回答をお待ちください！');
    }
}
