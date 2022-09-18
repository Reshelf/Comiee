<?php

namespace App\Http\Controllers\Books;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    /**
     * 作品へのいいね
     * ポリシー(src/app/Policies/BookPolicy.php)
     */
    public function __invoke(Request $request, Book $book)
    {
        // 作者以外のユーザー
        if ($book->user->id !== $request->user()->id) {
            $book->likes()->detach($request->user()->id);
            $book->likes()->attach($request->user()->id);
        }

        return [
            'id' => $book->id,
            'countLikes' => $book->count_likes,
        ];
    }
}
