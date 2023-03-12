<?php

namespace App\Http\Controllers\Books\Episode;

use App\Http\Controllers\Controller;
use App\Mail\books\episodes\AddNewEpisodeMail;
use App\Models\Book;
use App\Models\Episode;
use Illuminate\Http\Request;
// メール
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
    | エピソードの保存
    |--------------------------------------------------------------------------
     */
    public function __invoke(Request $request, Episode $episode)
    {
        $request->validate([
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:30720',
            'images' => 'required|array|min:10|max:100',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:30720',
        ]);

        /*
        |--------------------------------------------------------------------------
        | データの保存 | エピソード
        |--------------------------------------------------------------------------
         */
        $book = Book::find($request->book_id);

        $episode->book_id = $book->id;

        // エピソードの話数
        $episode->number = $episode->where('book_id', $book->id)->count() + 1;

        // タイトル
        $episode->title = $request->title;
        // 作者から一言
        $episode->short_from_author = $request->short_from_author;

        // 非公開設定
        $episode->is_hidden = true;
        if ($request->is_hidden === null) {
            $episode->is_hidden = false;
        }

        // 値段設定
        $episode->is_free = false;
        if ($request->is_free === null) {
            $episode->is_free = true;
        }

        // サムネイル
        if ($request->has('thumbnail')) {
            $file = $request->file('thumbnail');
            $img = \Image::make($file)->resize(
                1000,
                null,
                function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                }
            )->limitColors(null)->encode('webp', 0.01);

            $filePath = 'app/' . env('APP_ENV') . '/books/' . $book->title . '/' . $episode->number . '/thumbnail.webp';
            Storage::disk('r2')->put($filePath, $img);
            $episode->thumbnail = env('CLOUDFLARE_R2_URL') . '/' . $filePath;
        }

        // コンテンツ
        if ($request->hasfile('images')) {
            foreach ($request->file('images') as $index => $image) {
                $file = $image;
                $img = \Image::make($file)->resize(
                    3200,
                    null,
                    function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    }
                )->limitColors(null)->encode('webp', 0.01);

                $filePath = 'app/' . env('APP_ENV') . '/books/' . $book->title . '/' . $episode->number . '/' . $index . '.webp';
                Storage::disk('r2')->put($filePath, $img);

                $imgData[] = env('CLOUDFLARE_R2_URL') . '/' . $filePath;
            }
            $episode->contents = json_encode($imgData);
        }

        $episode->save();

        /*
        |--------------------------------------------------------------------------
        | データの更新 | 今日の新作に追加
        |--------------------------------------------------------------------------
         */
        $book->is_new = true;
        $book->save();

        // 二重送信防止
        $request->session()->regenerateToken();

        /*
        |--------------------------------------------------------------------------
        | メール送信 | 作品をお気に入りに追加してる人に新着エピソードの通知
        |--------------------------------------------------------------------------
         */
        $book_likes_users = $book->likes()->where(['book_id' => $book->id, 'm_notice_4' => 1])->get();
        if ($book_likes_users->count() > 0) {
            $mailData = [
                'book' => $book,
                'episode' => $episode,
                'user' => $request->user(),
                'bookLikesUserEmails' => $book_likes_users->pluck("email"),
            ];
            Mail::send(new AddNewEpisodeMail($mailData));
        };

        /*
        |--------------------------------------------------------------------------
        | 成功メッセージ
        |--------------------------------------------------------------------------
         */
        $success = array(
            __('投稿完了！続きも楽しみにしています！'),
            __('また描いてくださいね！'),
        );
        $random = array_rand(
            $success,
            1
        );
        return back()->withSuccess($success[$random]);
    }
}
