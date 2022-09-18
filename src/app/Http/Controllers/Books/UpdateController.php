<?php

namespace App\Http\Controllers\Books;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Tag;
use App\Http\Requests\BookRequest;

class UpdateController extends Controller
{
    /**
     * 作品の更新
     * ポリシー(src/app/Policies/BookPolicy.php)
     */
    public function __invoke(BookRequest $request, Book $book)
    {
        // ポリシー
        $this->authorize('update', $book);

        // 作品タイトル
        $book->title = $request->title;
        // 原作
        $book->author = $request->author;
        // 漫画家
        $book->manga_artist = $request->manga_artist;
        // アシスタント
        $book->assistant = $request->assistant;
        // あらすじ
        $book->story = $request->story;
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
