<?php

namespace App\Http\Controllers\Books;

use App\Http\Controllers\Controller;
use App\Mail\books\LikedBookMail;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
    }

    /*
    |--------------------------------------------------------------------------
    | 作品をお気に入りに追加する
    |--------------------------------------------------------------------------
     */
    public function __invoke(Request $request, Book $book)
    {
        if ($book->user->id !== $request->user()->id) {
            $this->addToFavorites($request, $book);
            $this->sendEmailWhenLiked($request, $book);
        }

        return [
            'id' => $book->id,
            'countLikes' => $book->count_likes,
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | お気に入りに追加するメソッド
    |--------------------------------------------------------------------------
     */
    private function addToFavorites(Request $request, Book $book)
    {
        $book->likes()->detach($request->user()->id);
        $book->likes()->attach($request->user()->id);
    }

    /*
    |--------------------------------------------------------------------------
    | お気に入りされたときにメールを送信する
    |--------------------------------------------------------------------------
     */
    private function sendEmailWhenLiked(Request $request, Book $book)
    {
        if ($book->user->m_notice_3 === 1) {
            $sessionKey = "liked_book_email_{$request->user()->id}_to_{$book->user->id}";
            $emailCooldown = 1440; // 送信間隔を1日に設定
            $now = \Carbon\Carbon::now();
            $lastEmailSentAt = $request->session()->get($sessionKey);

            if (!$lastEmailSentAt || $now->diffInMinutes($lastEmailSentAt) > $emailCooldown) {
                $mailData = [
                    'send_user' => $request->user(),
                    'received_user' => $book->user,
                    'book' => $book,
                ];
                Mail::send(new LikedBookMail($mailData));

                // セッションに最後に送信されたメールの日時を保存
                $request->session()->put($sessionKey, $now);
            }
        }
    }
}
