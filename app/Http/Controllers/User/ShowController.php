<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
// use DB;

class ShowController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | プロフィール
    |--------------------------------------------------------------------------
    */
    public function __invoke(string $username)
    {
        $user = User::where('username', $username)->first();

        // 存在しないユーザーページにアクセスしたら 404を返す
        if ($user === null) {
            abort(404);
        }

        $books = $user->books()->latest()->get();
        // $sql = <<< SQL
        //     select * from users
        //         where username = '$username'
        //         limit 1
        // SQL;
        // $sql_result = DB::select($sql);
        // $user = $sql_result[0];

        // $sql2 = <<< SQL
        //     select * from books
        //         where books . user_id = $user->id
        //         and books . user_id is not null
        //         order by created_at desc
        // SQL;
        // $books = DB::select($sql2);
        return view('users.show', compact('user', 'books'));
    }
}
