<?php

namespace App\Http\Controllers\User\Setting;

use App\Http\Controllers\Controller;

use App\Models\User;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(string $username)
    {
        $user = User::where('username', $username)->first();
        // $books = $user->books()->latest()->get();

        // $user = DB::select("select * from users where username = $username limit 1");
        // $books = DB::select("select * from `books` where `books`.`user_id` = 1 and `books`.`user_id` is not null order by `created_at` desc");

        return view('users.settings.index', compact(
            'user',
            // 'books'
        ));
    }
}
