<?php

namespace App\Http\Controllers\Others;

use App\Http\Controllers\Controller;

class CompanyController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | 会社概要（運営会社）
    |--------------------------------------------------------------------------
    */
    public function __invoke()
    {
        return view('others.company');
    }
}
