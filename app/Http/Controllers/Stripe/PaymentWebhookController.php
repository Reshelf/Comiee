<?php

namespace App\Http\Controllers\Stripe;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Episode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;

class PaymentWebhookController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | 決済完了後に Webhookを使いサービスへの反映を行う
    |--------------------------------------------------------------------------
     */
    public function __invoke(Request $request)
    {
        Stripe::setApiKey(config('app.stripe_secret'));

        $endpoint_secret = config('app.stripe_endpoint_secret');
        $payload = $request->getContent();
        $sig_header = $request->header('stripe-signature');
        $event = null;

        try {
            $event = \Stripe\Webhook::constructEvent(
                $payload, $sig_header, $endpoint_secret
            );
            return response()->json('Success', 200);
        } catch (\UnexpectedValueException$e) {
            return response()->json('Invalid payload', 400);
        } catch (\Stripe\Exception\SignatureVerificationException$e) {
            return response()->json('Invalid Signature', 400);
        }

        if ($event->type == 'checkout.session.completed') {

            // 子アカウントのID、Checkoutセッションが取得できるので、それを元に処理を行う
            $session = $event->data->object;
            // サービスへの反映を行う処理へ
            $this->handleCompletedCheckoutSession($session);
        }

        return response()->json('ok', 200);
    }

    /*
    |--------------------------------------------------------------------------
    | サービスへの反映を行う
    |--------------------------------------------------------------------------
     */
    private function handleCompletedCheckoutSession($session)
    {
        if ($session->data->object->payment_status == 'paid') {

            /*
            |--------------------------------------------------------------------------
            | Stripeの決済後のセッションIDから、購入者と作品情報を受け取る
            |--------------------------------------------------------------------------
             */
            $user_id = $session->data->object->metadata->buyer->user_id;
            $book_id = $session->data->object->metadata->buyer->book_id;
            $episode_number = $session->data->object->metadata->buyer->episode_number;

            /*
            |--------------------------------------------------------------------------
            | 受け取った情報をComieeのDBに保存する
            |--------------------------------------------------------------------------
             */
            $book = Book::find($book_id);
            $episode = Episode::where(['book_id' => $book->id, 'number' => $episode_number])->first();

            if (isset($user_id)) {
                if (Auth::user()) {
                    if ($book->user->id !== $user_id) {
                        $episode->bought()->attach($user_id);
                        $episode->save();
                    }
                }
                // Mail::
                //     to($user->email)
                //     ->send(new PurchasedProduct($purchase));
            }
        }
    }
}
