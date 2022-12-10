<?php

namespace App\Http\Controllers\Books;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Tag;
use App\Http\Requests\BookRequest;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
    }

    /*
    |--------------------------------------------------------------------------
    | 作品の更新
    |--------------------------------------------------------------------------
    */
    public function __invoke(BookRequest $request)
    {
        $book = Book::find($request->book_id);

        // ポリシー
        $this->authorize('update', $book);

        $request->validate([
            'title' => 'required|string|max:50|unique:books,title,' . $book->id . ',id',
            'genre_id' => ['required', 'integer'],
            'story' => ['nullable', 'string', 'max:400'],
            'thumbnail' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp'],
        ]);

        $book->user_id = $request->user()->id; // 投稿ユーザー
        $book->title = $request->title; // 作品タイトル
        $book->genre_id = $request->genre_id; // ジャンル
        $book->story = $request->story; // あらすじ


        // 完結
        $book->is_complete = true;
        if ($request->is_complete === null) $book->is_complete = false;

        // 非公開設定
        $book->is_hidden = true;
        if ($request->is_hidden === null) $book->is_hidden = false;


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
