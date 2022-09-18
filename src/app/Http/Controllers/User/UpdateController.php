<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
// use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UpdateController extends Controller
{
    /**
     * 作品の更新
     * ポリシー(src/app/Policies/BookPolicy.php)
     */
    public function __invoke(Request $request, User $user)
    {
        $user = Auth::user();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->body = $request->body;
        $user->website = $request->website;

        if ($request->has('avatar')) {
            $image = $request->file('avatar');
            $filename = $image->getClientOriginalName();
            $image->move(public_path('img/users/avatar'), $filename);
            $user->avatar = $request->file('avatar')->getClientOriginalName();
        }

        if ($request->has('thumbnail')) {
            $image = $request->file('thumbnail');
            $filename = $image->getClientOriginalName();
            $image->move(public_path('img/users/thumbnail'), $filename);
            $user->thumbnail = $request->file('thumbnail')->getClientOriginalName();
        }

        $user->save();

        return redirect()->back();
    }
}
