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
            $file = $request->file('thumbnail');
            $fileName = $file->getClientOriginalName();
            $filePath = 'app/books/' . $book->title . '/thumbnail/' . $fileName;

            $img = new \Image(['driver' => 'imagick']);
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
