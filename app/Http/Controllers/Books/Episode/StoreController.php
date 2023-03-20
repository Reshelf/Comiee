<?php

namespace App\Http\Controllers\Books\Episode;

use App\Http\Controllers\Controller;
use App\Mail\books\episodes\AddNewEpisodeMail;
use App\Models\Book;
use App\Models\Episode;
use Illuminate\Http\Request;
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
        $validatedData = $request->validate([
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:30720',
            'images' => 'required|array|min:10|max:100',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:30720',
        ]);

        $book = Book::find($request->book_id);

        $this->saveEpisode($request, $book, $episode);
        $this->updateBook($book);
        $request->session()->regenerateToken();
        $this->sendMail($request, $book, $episode);

        return back()->withSuccess($this->getRandomSuccessMessage());
    }

    /*
    |--------------------------------------------------------------------------
    | DBに保存
    |--------------------------------------------------------------------------
     */
    private function saveEpisode(Request $request, Book $book, Episode $episode)
    {
        $episode->book_id = $book->id;
        $episode->number = $episode->where('book_id', $book->id)->count() + 1;
        $episode->title = $request->title;
        $episode->short_from_author = $request->short_from_author;
        $episode->is_hidden = $request->is_hidden === null ? false : true;
        $episode->is_free = $request->is_free === null ? true : false;

        $this->saveThumbnail($request, $book, $episode);
        $this->saveContent($request, $book, $episode);

        $episode->save();
    }

    /*
    |--------------------------------------------------------------------------
    | サムネイルの保存
    |--------------------------------------------------------------------------
     */
    private function saveThumbnail(Request $request, Book $book, Episode $episode)
    {
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
    }

    /*
    |--------------------------------------------------------------------------
    | コンテンツの保存
    |--------------------------------------------------------------------------
     */
    private function saveContent(Request $request, Book $book, Episode $episode)
    {
        if ($request->hasfile('images')) {
            $imgData = [];

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
    }

    /*
    |--------------------------------------------------------------------------
    | 今日の新作に追加
    |--------------------------------------------------------------------------
     */
    private function updateBook(Book $book)
    {
        $book->is_new = true;
        $book->save();
    }

    /*
    |--------------------------------------------------------------------------
    | 作品のお気に入り登録者にメールを送信
    |--------------------------------------------------------------------------
     */
    private function sendMail(Request $request, Book $book, Episode $episode)
    {
        $book_likes_users = $book->likes()->where(['book_id' => $book->id, 'm_notice_4' => 1])->get();
        if ($book_likes_users->count() > 0) {
            $mailData = [
                'book' => $book,
                'episode' => $episode,
                'user' => $request->user(),
                'bookLikesUserEmails' => $book_likes_users->pluck("email"),
            ];
            Mail::send(new AddNewEpisodeMail($mailData));
        }
    }

    /*
    |--------------------------------------------------------------------------
    | 成功メッセージ
    |--------------------------------------------------------------------------
     */
    private function getRandomSuccessMessage()
    {
        $success = [
            __('投稿完了！続きも楽しみにしています！'),
            __('また描いてくださいね！'),
        ];
        $random = array_rand($success, 1);

        return $success[$random];
    }
}
