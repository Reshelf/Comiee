<?php

namespace App\Http\Controllers\Books;

use Carbon\Carbon;
use App\Models\Tag;
use App\Models\Book;
use App\Http\Requests\BookRequest;
use App\Mail\books\AddNewBookMail;
// メール
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

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
    public function __invoke($lang, BookRequest $request, Book $book, Tag $tag)
    {
        // ポリシー
        $this->authorize('create', $book);

        $expiresAt = Carbon::now()->endOfDay()->addSecond();
        $allTags = \Cache::remember("allTags", $expiresAt, function () use ($tag) {
            return $tag->all_tag_names;
        });

        $episodes_latest = $book->episodes()->orderBy('created_at', 'desc')->get();

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
            $filePath = 'app/' . env('APP_ENV') . '/books/' . $book->title . '/thumbnail/' . $fileName;

            $img =  \Image::make($file)->resize(
                1000,
                null,
                function ($constraint) {
                    $constraint->aspectRatio();
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
                'send_user' => $request->user(),
                'book' => $book,
                'followers' => $followers,
            ];
            Mail::send(new AddNewBookMail($mailData));
        };

        // リダイレクト
        return view('books.show', [
            'lang' => $lang,
            'book' => $book,
            'episodes_latest' => $episodes_latest,
            'allTags' => $allTags,
        ])->withSuccess('作品を投稿しました！エピソードを追加してね！');
    }
}
