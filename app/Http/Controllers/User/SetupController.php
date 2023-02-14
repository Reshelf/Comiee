<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
// use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SetupController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
    }

    /*
    |--------------------------------------------------------------------------
    | ユーザーの好みページ
    |--------------------------------------------------------------------------
     */
    public function __invoke(Request $request, User $user)
    {
        $user = Auth::user();
        return view('users.setup', ['user' => $user]);
    }

}
