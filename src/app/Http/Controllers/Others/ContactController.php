<?php

namespace App\Http\Controllers\Others;

use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    /**
     * 利用規約ページを返す
     */
    public function __invoke()
    {
        return view('others.contact');
    }
}
