<?php

namespace App\Http\Controllers\Books;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Tag;
use App\Http\Requests\BookRequest;

class UpdateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /*
    |--------------------------------------------------------------------------
    | 作品の更新
    |--------------------------------------------------------------------------
    */
    public function __invoke(BookRequest $request)
    {
        $book = Book::where('id', $request->book_id)->first();

        // ポリシー
        $this->authorize('update', $book);

        // 投稿ユーザー
        $book->user_id = $request->user()->id;
        // 作品タイトル
        $book->title = $request->title;
        // ジャンル
        $book->genre_id = $request->genre_id;
        // あらすじ
        $book->story = $request->story;
        // 完結
        if ($request->is_complete === null) {
            $book->is_complete = false;
        } else {
            $book->is_complete = true;
        };

        // dd($request->is_complete);
        // サムネイル
        if ($request->has('thumbnail')) {
            $image = $request->file('thumbnail');
            $filename = $image->getClientOriginalName();
            $image->move(public_path('img/book/thumbnail'), $filename);
            $book->thumbnail = $request->file('thumbnail')->getClientOriginalName();
        }
        // タグ
        $book->tags()->detach();
        $request->tags->each(function ($tagName) use ($book) {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            $book->tags()->attach($tag);
        });

        // 保存
        $book->save();

        // リロード
        return back();
    }
}
