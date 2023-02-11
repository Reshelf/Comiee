<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DestroyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /*
    |--------------------------------------------------------------------------
    | アカウント削除
    |--------------------------------------------------------------------------
     */
    public function __invoke(Request $request)
    {
        $user = User::where('username', $request->username)->first();

        if (Auth::user()->id === $user->id) {
            $user->delete();
            return back();
        }
    }
}
