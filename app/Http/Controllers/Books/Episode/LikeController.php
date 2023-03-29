<?php

namespace App\Http\Controllers\Books\Episode;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Episode;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function __invoke(Request $request)
    {
        $episode = Episode::find($request->episode_id);
        $book = Book::find($request->book_id);

        if ($book->user_id !== $request->user()->id) {
            $episode->likes()->detach($request->user()->id);
            $episode->likes()->attach($request->user()->id);
        }

        return [
            'id' => $episode->id,
            'countLikes' => $episode->count_likes,
        ];
    }
}
