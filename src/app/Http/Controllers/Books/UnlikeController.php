<?php

namespace App\Http\Controllers\Books;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class UnlikeController extends Controller
{
    /**
     * 作品へのいいね解除
     * ポリシー(src/app/Policies/BookPolicy.php)
     */
    public function __invoke(Request $request, Book $book)
    {
        $book->likes()->detach($request->user()->id);

        return [
            'id' => $book->id,
            'countLikes' => $book->count_likes,
        ];
    }
}
