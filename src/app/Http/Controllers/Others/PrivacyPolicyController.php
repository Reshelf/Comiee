<?php

namespace App\Http\Controllers\Others;

use App\Http\Controllers\Controller;

class PrivacyPolicyController extends Controller
{
    /**
     * プライバシーポリシー
     */
    public function __invoke()
    {
        return view('others.privacy_policy');
    }
}
