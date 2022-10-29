<?php

namespace App\Http\Controllers\Books\Episode\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class UnlikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /*
    |--------------------------------------------------------------------------
    | コメントのお気に入りを解除する
    |--------------------------------------------------------------------------
    */
    public function __invoke(Request $request)
    {
        $comment = Comment::find($request->comment);
        $comment->likes()->detach($request->user()->id);

        return [
            'id' => $comment->id,
            'countLikes' => $comment->count_likes,
        ];
    }
}
