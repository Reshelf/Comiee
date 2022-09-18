<?php

namespace App\Http\Controllers\Books\Episode\Comment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
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
    public function __invoke(Request $request)
    {
        $comment = new Comment();
        $comment->comment = $request->comment;
        $comment->episode_id = $request->episode_id;
        $comment->user_id = Auth::user()->id;
        $comment->save();

        // 作成後のページ遷移に必要なのでidを渡す
        // return response()->json([
        //     'episode_id' => $episode->id,
        // ]);
        return redirect()->back();
    }
}
