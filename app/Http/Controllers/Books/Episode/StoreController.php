<?php

namespace App\Http\Controllers\Books\Episode;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Episode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
// メール
use Illuminate\Support\Facades\Mail;
use App\Mail\books\episodes\AddNewEpisodeMail;

class StoreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /*
    |--------------------------------------------------------------------------
    | エピソードの保存
    |--------------------------------------------------------------------------
    */
    public function __invoke(Request $request, Episode $episode)
    {
        /*
        |--------------------------------------------------------------------------
        | データのセット | 作品
        |--------------------------------------------------------------------------
        */
        $book = Book::where('id', $request->book_id)->first();


        /*
        |--------------------------------------------------------------------------
        | データの保存 | エピソード
        |--------------------------------------------------------------------------
        */
        $episode->book_id = $book->id;

        // エピソードの話数
        $episode->number = $episode->where('book_id', $book->id)->count() + 1;

        $request->validate([
            'images' => 'required|array|max:200',
            'images.*' => 'image',
        ]);
        // 画像
        if ($request->hasfile('images')) {
            foreach ($request->file('images') as $image) {

                $file = $image;
                $fileName = $image->getClientOriginalName();
                $filePath = '/app/books/' . $book->title . '/' . $episode->number . '/' . $fileName;

                $img =  \Image::make($file)->resize(
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
                'episodeNumber' => $episode->number,
                'user' => $request->user(),
                'bookLikesUserEmails' => $book_likes_users->pluck("email")
            ];
            Mail::send(new AddNewEpisodeMail($mailData));
        };

        return back()->with('success', '新しいエピソードを公開しました！');
    }
}
