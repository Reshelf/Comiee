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
        $this->middleware('signed')->only('verify');
    }

    /*
    |--------------------------------------------------------------------------
    | 作品の投稿
    |--------------------------------------------------------------------------
    */
    public function __invoke($lang, BookRequest $request, Book $book)
    {
        // ポリシー
        $this->authorize('create', $book);

        $request->validate([
            'title' => 'required|string|max:50|unique:books,title,' . $book->id . ',id',
            'genre_id' => ['required', 'integer'],
            'story' => ['nullable', 'string', 'max:400'],
            'thumbnail' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp'],
        ]);

        $book->title = $request->title; // 作品タイトル
        $book->genre_id = $request->genre_id;  // ジャンル
        $book->story = $request->story; // あらすじ

        // サムネイル
        if ($request->has('thumbnail')) {
            $file = $request->file('thumbnail');
            $fileName = $file->getClientOriginalName();
            $filePath = 'app/books/' . $book->title . '/thumbnail/' . $fileName;

            $img =  \Image::make($file)->resize(
                1000,
                1000,
                function ($constraint) {
                    $constraint->upsize();
                }
            )->limitColors(null)->encode('webp', 0.01); // 多分最大は0.1

            Storage::disk('s3')->put($filePath, $img);
            $book->thumbnail = Storage::disk('s3')->url($filePath);
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

        $success = array(
            '投稿完了！続きも楽しみにしています！',
            'また描いてくださいね！',
        );
        $random = array_rand($success, 1);

        // リダイレクト
        return redirect()
            ->route('users.show', ['lang' => $lang, 'username' => $book->user->username])
            ->withSuccess($success[$random]);
    }
}
