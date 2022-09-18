<?php

namespace App\Http\Controllers\Books\Episode\Comment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;

class DestroyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke(Request $request)
    {
        $comment = Comment::find($request->comment_id);
        $comment->delete();

        return redirect()->back();
    }
}
