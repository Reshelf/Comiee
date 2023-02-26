<?php

namespace App\Http\Controllers\Api\Books\Episode\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment;
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
        $user_id = $request->input('user_id');
        $book_id = $request->input('book_id');
        $episode_id = $request->input('episode_id');
        $episode_number = $request->input('episode_number');

        $comments = Comment::where(['user_id' => $user_id, 'book_id' => $book_id, 'episode_id' => $episode_id, 'episode_number' => $episode_number])->latest()->get();
        return response()->json($comments);
    }
}
