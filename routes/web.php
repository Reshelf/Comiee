<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/connect', 'App\Http\Controllers\Stripe\ConnectController')->name('stripe.connect');
Route::post('stripe/webhook', 'App\Http\Controllers\Stripe\PaymentWebhookController')->name('stripe.payment.webhook');

Route::post('change/lang', 'App\Http\Controllers\Others\SetLocaleController')->name('change.lang');
/*
|--------------------------------------------------------------------------
| 認証
|--------------------------------------------------------------------------
|
 */
Auth::routes(['verify' => true]);

/*
|--------------------------------------------------------------------------
| 言語未設定ユーザーのリダイレクト
|--------------------------------------------------------------------------
| app/Http/Middleware/SetLocale.php でアプリケーションのロケール設定
 */
Route::get('/', function (Request $request) {
    // サポートされている言語のリスト
    $supportedLanguages = ['ja', 'en', 'tw', 'cn', 'es', 'fr', 'it', 'id', 'th', 'ko', 'de', 'hi', 'ar', 'pt', 'bn'];
    // クライアントが受け入れる言語の中で、サポートされている言語を選択
    $preferredLanguage = $request->getPreferredLanguage($supportedLanguages);
    // ない場合はenへ
    return redirect("/{$preferredLanguage}") ?? 'en';
});

/*
|--------------------------------------------------------------------------
| ルーティング
|--------------------------------------------------------------------------
 */
Route::prefix('{lang}')->where(['lang' => 'ja|en|tw|cn|es|fr|it|id|th|ko|de|hi|ar|pt|bn'])->group(function () {

    // トップページ
    Route::view('/', 'index')->name('top');

    // タグ検索
    Route::get('/tags/{name}', 'App\Http\Controllers\Search\TagController')->name('search.tag_name');

    // 本棚
    Route::get('/shelf', 'App\Http\Controllers\User\ShelfController')->name('user.shelf.like');

    // 購入
    Route::get('/payment', 'App\Http\Controllers\Stripe\PaymentCreateController')->name('stripe.payment.loading');
    Route::post('/payment/create/product', 'App\Http\Controllers\Stripe\PaymentCreateController')->name('stripe.payment.create');

    // その他
    Route::view('/about/comiee', 'others.about_comiee')->name('others.about.comiee'); // Comieeについて
    Route::view('/company', 'others.company')->name('others.company'); // 会社概要
    Route::view('/user_guide', 'others.user_guide')->name('others.user_guide'); // ご利用ガイド
    Route::view('/terms_of_service', 'others.terms_of_service')->name('others.terms'); // 利用規約
    Route::view('/privacy_policy', 'others.privacy_policy')->name('others.privacy'); // プライバシーポリシー
    Route::view('/sct', 'others.sct')->name('others.sct'); // 特許商取引
    Route::view('/release_note', 'others.release_note')->name('others.release_note'); // 特許商取引
    Route::get('/faq', 'App\Http\Controllers\Others\FaqController')->name('others.faq'); // よくあるご質問
    Route::post('/contact', 'App\Http\Controllers\Others\ContactController')->middleware('throttle:2, 1')->name('others.contact'); // お問い合せ
    Route::post('/report', 'App\Http\Controllers\Others\ReportController')->middleware('throttle:2, 1')->name('others.report'); // 通報

    /*
    |--------------------------------------------------------------------------
    | 作品
    |--------------------------------------------------------------------------
    |
     */
    Route::prefix('books')->name('book.')->group(function () {

        // 作品
        Route::get('/{book_title}', 'App\Http\Controllers\Books\ShowController')->name('show');
        Route::post('/', 'App\Http\Controllers\Books\StoreController')->middleware('throttle:2, 1')->name('store');
        Route::delete('/{book_id}', 'App\Http\Controllers\Books\DestroyController')->name('destroy');
        Route::patch('/{book_id}', 'App\Http\Controllers\Books\UpdateController')->name('update');

        // エピソード
        Route::get('/{book_title}/{episode_number}', 'App\Http\Controllers\Books\Episode\ShowController')->name('episode.show');
        Route::post('/{book_id}/episode', 'App\Http\Controllers\Books\Episode\StoreController')->middleware('throttle:3, 1')->name('episode.store');
        Route::patch('/{book_id}/{episode_id}', 'App\Http\Controllers\Books\Episode\UpdateController')->name('episode.update');

        // コメント
        Route::post('/{book_id}/{episode_number}', 'App\Http\Controllers\Books\Episode\Comment\StoreController')->middleware('throttle:3, 1')->name('episode.comment.store');
        Route::delete('/{book_id}/{episode_id}/{comment_id}', 'App\Http\Controllers\Books\Episode\Comment\DestroyController')->name('episode.comment.destroy');
        Route::put('/{book_id}/{episode_id}/{comment}/like', 'App\Http\Controllers\Books\Episode\Comment\LikeController')->name('episode.comment.like');
        Route::delete('/{book_id}/{episode_id}/{comment}/like', 'App\Http\Controllers\Books\Episode\Comment\UnlikeController')->name('episode.comment.unlike');

        // お気に入り
        Route::put('/{book}/like', 'App\Http\Controllers\Books\LikeController')->name('like');
        Route::delete('/{book}/like', 'App\Http\Controllers\Books\UnlikeController')->name('unlike');
    });

    /*
    |--------------------------------------------------------------------------
    | ユーザー
    |--------------------------------------------------------------------------
    |
     */
    Route::patch('/{username}', 'App\Http\Controllers\User\UpdateController')->name('users.update');
    Route::put('/{username}/follow', 'App\Http\Controllers\User\FollowController')->name('users.follow');
    Route::delete('/{username}/follow', 'App\Http\Controllers\User\UnfollowController')->name('users.unfollow');
    Route::get('/{username}/settings', 'App\Http\Controllers\User\Setting\IndexController')->name('users.settings');
    Route::patch('/{username}/settings', 'App\Http\Controllers\User\Setting\UpdateController')->name('users.settings.update');
    Route::get('/{username}', 'App\Http\Controllers\User\ShowController')->name('users.show');
    Route::get('/{username}/about', 'App\Http\Controllers\User\AboutController')->name('users.about');
    Route::get('/{username}/followings', 'App\Http\Controllers\User\FollowingsController')->name('users.followings');
    Route::get('/{username}/followers', 'App\Http\Controllers\User\FollowersController')->name('users.followers');
    Route::delete('/{username}/delete', 'App\Http\Controllers\User\DestroyController')->name('users.delete');
    Route::get('/users/setup', 'App\Http\Controllers\User\SetupController')->name('users.setup');
});
