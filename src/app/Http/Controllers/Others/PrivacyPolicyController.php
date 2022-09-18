<?php

namespace App\Http\Controllers\Others;

use App\Http\Controllers\Controller;

class PrivacyPolicyController extends Controller
{
    /**
     * 利用規約ページを返す
     */
    public function __invoke()
    {
        return view('others.privacy_policy');
    }
}
