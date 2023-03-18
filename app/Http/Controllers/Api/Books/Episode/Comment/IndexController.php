<?php

namespace App\Http\Controllers\Api\Books\Episode\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | コメントの取得
    |--------------------------------------------------------------------------
     */
    public function __invoke(Request $request)
    {
        $data = $this->getCommentsAndUser($request->only(['user_id', 'book_id', 'episode_id', 'episode_number']));

        return response()->json($data);
    }

    private function getCommentsAndUser($filters)
    {
        $comments = Comment::where($filters)->latest()->get();
        $user = User::find($filters['user_id']);

        return [
            'comments' => $comments,
            'user' => $user,
        ];
    }
}
