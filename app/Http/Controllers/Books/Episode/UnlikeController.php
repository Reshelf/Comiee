<?php

namespace App\Http\Controllers\Books\Episode;

use App\Http\Controllers\Controller;
use App\Models\Episode;
use Illuminate\Http\Request;

class UnlikeController extends Controller
{
    public function __invoke(Request $request)
    {
        $episode = Episode::find($request->episode_id);
        $episode->likes()->detach($request->user()->id);

        return [
            'id' => $episode->id,
            'countLikes' => $episode->count_likes,
        ];
    }
}
