<?php

namespace App\Http\Controllers\Books\Episode;

use App\Http\Controllers\Controller;
use App\Models\Episode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Episode $episode)
    {
        $episode->book_id = $request->book_id;
        $episode->save();

        // 作成後のページ遷移に必要なのでidを渡す
        return response()->json([
            'episode_id' => $episode->id,
        ]);
    }
}
