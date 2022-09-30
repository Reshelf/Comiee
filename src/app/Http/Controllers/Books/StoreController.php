<?php

namespace App\Http\Controllers\Books;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Tag;
use App\Http\Requests\BookRequest;
use Illuminate\Support\Str;
use App\Models\User;

class StoreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /*
    |--------------------------------------------------------------------------
    | 作品の投稿
    |--------------------------------------------------------------------------
    */
    public function __invoke(BookRequest $request, Book $book)
    {
        // ポリシー
        $this->authorize('create', $book);
        // $book->fill($r900equest->except('story'));

        // 作品タイトル
        $book->title = $request->title;
        // あらすじ
        $book->story = $request->story;
        // サムネイル
        if ($request->has('thumbnail')) {
            $image = $request->file('thumbnail');
            $filename = $image->getClientOriginalName();
            $image->move(public_path('img/book/thumbnail'), $filename);
            $book->thumbnail = $request->file('thumbnail')->getClientOriginalName();
        }
        // 投稿するユーザー
        $book->user_id = $request->user()->id;
        // 保存
        $book->save();

        // タグ
        $request->tags->each(function ($tagName) use ($book) {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            $book->tags()->attach($tag);
        });

        // 二重送信防止
        $request->session()->regenerateToken();

        // リダイレクト
        return redirect()
            ->route('users.show', ['username' => $book->user->username])
            ->withSuccess("投稿しました！");
    }
}
