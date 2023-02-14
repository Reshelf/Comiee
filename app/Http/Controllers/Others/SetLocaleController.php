<?php

namespace App\Http\Controllers\Others;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SetLocaleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
    }
    /*
    |--------------------------------------------------------------------------
    | 言語切替 & DBに保存
    |--------------------------------------------------------------------------
     */
    public function __invoke(Request $request)
    {
        \App::setLocale($request->lang);

        $user = Auth::user();
        $user->lang = $request->lang;
        $user->save();

        return redirect('/' . $request->lang . '/' . Auth::user()->username . '/settings');
    }
}
