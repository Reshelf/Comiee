<?php

namespace App\Http\Controllers\Stripe;

use App\Http\Controllers\Controller;
use App\Mail\books\episodes\BoughtEpisodeMail;
use App\Models\Book;
use App\Models\Episode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Stripe\Stripe;

class PaymentWebhookController extends Controller
{
    public function __invoke(Request $request)
    {
        $event = $this->getStripeEvent($request);

        if (!$event) {
            return response()->json('Invalid payload or signature', 400);
        }

        if ($event->type === 'checkout.session.completed') {
            $this->handleCompletedCheckoutSession($event->data->object);
            return response()->json('ok', 200);
        }

        return response()->json('Unexpected event type', 400);
    }

    /*
    |--------------------------------------------------------------------------
    | イベントの開始
    |--------------------------------------------------------------------------
    |
     */
    private function getStripeEvent(Request $request)
    {
        Stripe::setApiKey(config('app.stripe_secret'));

        $endpoint_secret = config('app.stripe_endpoint_secret');
        $sig_header = $request->header('stripe-signature');

        try {
            return \Stripe\Webhook::constructEvent(
                $request->getContent(), $sig_header, $endpoint_secret
            );
        } catch (\UnexpectedValueException$e) {
            return null;
        } catch (\Stripe\Exception\SignatureVerificationException$e) {
            return null;
        }
    }

    /*
    |--------------------------------------------------------------------------
    | webhookを受け取り、DBに保存
    |--------------------------------------------------------------------------
    |
     */
    private function handleCompletedCheckoutSession($session)
    {
        $metadata = $session->metadata;
        $user_id = $metadata->user_id;
        $book_id = $metadata->book_id;
        $episode_number = $metadata->episode_number;

        $book = Book::find($book_id);
        $episode = Episode::where(['book_id' => $book->id, 'number' => $episode_number])->first();

        if ($book->user->id !== $user_id) {
            $episode->bought()->sync($user_id);
            $episode->save();
            $this->sendBoughtEpisodeMail($book, $episode);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | 購入メール
    |--------------------------------------------------------------------------
    |
     */
    private function sendBoughtEpisodeMail($book, $episode)
    {
        $mailData = [
            'book' => $book,
            'episode' => $episode,
            'user' => Auth::user(),
        ];
        Mail::send(new BoughtEpisodeMail($mailData));
    }
}
