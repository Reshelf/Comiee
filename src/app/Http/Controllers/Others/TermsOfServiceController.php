<?php

namespace App\Http\Controllers\Others;

use App\Http\Controllers\Controller;

class TermsOfServiceController extends Controller
{
    /**
     * 利用規約ページを返す
     */
    public function __invoke()
    {
        return view('others.terms_of_service');
    }
}
