<?php

namespace App\Http\Controllers\Books\Episode;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Episode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    | エピソードの更新
    |--------------------------------------------------------------------------
     */
    public function __invoke(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | データのセット | 作品
        |--------------------------------------------------------------------------
         */
        $book = Book::find($request->book_id);
        $episode = Episode::find($request->episode_id);

        /*
        |--------------------------------------------------------------------------
        | データの保存 | エピソード
        |--------------------------------------------------------------------------
         */
        if ($book->user->id === Auth::user()->id) {
            $request->validate([
                'thumbnail' => 'image|mimes:jpeg,png,jpg,gif,webp|max:30720',
                'images' => 'array|min:10|max:100',
                'images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:30720',
            ]);

            // タイトル
            if ($request->has('title')) {
                $episode->title = $request->title;
            }

            // 作者から一言
            if ($request->has('short_from_author')) {
                $episode->short_from_author = $request->short_from_author;
            }

            // 非公開設定
            $episode->is_hidden = true;
            if ($request->is_hidden == null) {
                $episode->is_hidden = false;
            }

            // 値段設定
            $episode->is_free = false;
            if ($request->is_free == null) {
                $episode->is_free = true;
            }

            // サムネイル
            if ($request->has('thumbnail')) {
                $file = $request->file('thumbnail');
                $fileName = $file->getClientOriginalName();
                $filePath = 'app/' . env('APP_ENV') . '/books/' . $book->title . '/' . $episode->number . '/thumbnail/' . $fileName;

                $img = \Image::make($file)->resize(
                    1000,
                    null,
                    function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    }
                )->limitColors(null)->encode('webp', 0.01); // 多分最大は0.1

                Storage::disk('s3')->put($filePath, $img);
                $episode->thumbnail = Storage::disk('s3')->url($filePath);
            }

            // コンテンツ
            if ($request->hasfile('images')) {
                foreach ($request->file('images') as $image) {

                    $file = $image;
                    $fileName = $image->getClientOriginalName();
                    $filePath = 'app/' . env('APP_ENV') . '/books/' . $book->title . '/' . $episode->number . '/' . $fileName;

                    $img = \Image::make($file)->resize(
                        3200,
                        null,
                        function ($constraint) {
                            $constraint->aspectRatio();
                            $constraint->upsize();
                        }
                    )->limitColors(null)->encode('webp', 0.01); // 多分最大は0.1

                    Storage::disk('s3')->put($filePath, $img);
                    $imgData[] = Storage::disk('s3')->url($filePath);
                }
                $episode->contents = json_encode($imgData);
            }

        }

        $episode->save();

        return back()->with('success', __('エピソードを更新しました！'));
    }
}
