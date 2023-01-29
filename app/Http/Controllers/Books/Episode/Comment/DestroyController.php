<?php

namespace App\Http\Controllers\Books\Episode\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class DestroyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
    }

    /*
    |--------------------------------------------------------------------------
    | コメント 削除
    |--------------------------------------------------------------------------
     */
    public function __invoke(Request $request)
    {
        $comment = Comment::find($request->comment_id);
        $comment->delete();

        return back();
    }
}
