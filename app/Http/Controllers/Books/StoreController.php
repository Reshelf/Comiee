<?php

namespace App\Http\Controllers\Books;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Tag;
use App\Http\Requests\BookRequest;
use Illuminate\Support\Facades\Storage;
// メール
use Illuminate\Support\Facades\Mail;
use App\Mail\books\AddNewBookMail;

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
        // ジャンル
        $book->genre_id = $request->genre_id;
        // あらすじ
        $book->story = $request->story;
        // サムネイル
        if ($request->has('thumbnail')) {
            $path = Storage::disk('s3')->put('/app/books/' . $book->title . '/thumbnail', $request->file('thumbnail'));
            $book->thumbnail = Storage::disk('s3')->url($path);
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

        // フォロワー全員にメール通知
        $followers = $request->user()->followers()->where('m_notice_1', 1)->get();
        if ($followers->count() > 0) {
            $mailData = [
                'user' => $request->user(),
                'followers' => $followers,
                'followersMails' => $followers->pluck("email")
            ];
            Mail::send(new AddNewBookMail($mailData));
        };

        // リダイレクト
        return redirect()
            ->route('users.show', ['username' => $book->user->username])
            ->withSuccess("新たな作品の世界が始まりました！");
    }
}
