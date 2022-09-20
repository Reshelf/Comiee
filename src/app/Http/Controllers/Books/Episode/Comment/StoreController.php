<?php

namespace App\Http\Controllers\Books\Episode\Comment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Episode;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * コメントの保存
     *
     */
    public function __invoke(Comment $comment, Request $request)
    {
        $comment->user_id = Auth::user()->id;
        $comment->episode_id = $request->episode_number;
        dd($comment->episode_id);
        $comment->comment = $request->comment;
        $comment->save();

        return redirect()->back();
    }
}
