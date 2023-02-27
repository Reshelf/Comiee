<?php

namespace App\Http\Controllers\Api\Books\Episode\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | コメントの保存
    |--------------------------------------------------------------------------
     */
    public function __invoke(Comment $comment, Request $request)
    {
        $comment = new Comment();
        $comment->body = $request->input('body');
        $comment->save();
        return response()->json($comment);
    }
}
