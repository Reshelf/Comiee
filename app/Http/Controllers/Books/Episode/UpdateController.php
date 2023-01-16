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
        $request->validate([
            'thumbnail' => 'image|mimes:jpeg,png,jpg,gif,webp|max:30720',
            'images' => 'array|min:10|max:100',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:30720',
        ]);

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

        /*
        |--------------------------------------------------------------------------
        | Stripe Connectユーザーで Stripeに商品がなかったら登録
        |--------------------------------------------------------------------------
         */
        if ($book->user->stripe_user_id && !$episode->prod_id) {
            $stripe = new \Stripe\StripeClient(config('app.stripe_secret'));

            // 商品
            $product = $stripe->products->create([
                'name' => $book->title . ' - ' . $episode->number . '話',
                "metadata" => [
                    "user_id" => Auth::user()->id,
                    "book_id" => $book->id,
                    "episode_number" => $episode->number,
                ],
            ], ['stripe_account' => $book->user->stripe_user_id],
            );

            // 価格
            $price = $stripe->prices->create([
                'product' => $product->id, // 作成した製品と紐づける
                'unit_amount' => 50, // 単価
                'currency' => 'jpy', // 支払通貨
                'tax_behavior' => 'inclusive',
            ], ['stripe_account' => $book->user->stripe_user_id]);

            $episode->prod_id = $product->id;
            $episode->price_id = $price->id;
        }

        $episode->save();

        return back()->with('success', 'エピソードを更新しました！');
    }
}
