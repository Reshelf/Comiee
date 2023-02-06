<?php

namespace App\Http\Controllers\Others;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SetLocaleController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | 特許商取引
    |--------------------------------------------------------------------------
     */
    public function __invoke(Request $request)
    {
        \App::setLocale($request->lang);

        return redirect('/' . $request->lang . '/' . Auth::user()->username . '/settings');
    }
}
