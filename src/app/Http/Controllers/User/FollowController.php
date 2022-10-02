<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
// メール
use Illuminate\Support\Facades\Mail;
use App\Mail\user\NewFollowedUserMail;

use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, string $username)
    {
        $user = User::where('username', $username)->first();

        if ($user->id === $request->user()->id) {
            return abort('404', 'Cannot follow yourself.');
        }

        $request->user()->followings()->detach($user);
        $request->user()->followings()->attach($user);

        // フォローされたらメール通知を送る
        $email = $user->email;
        Mail::to($email)->send(new NewFollowedUserMail($request->user()));


        return ['username' => $username];
    }
}
