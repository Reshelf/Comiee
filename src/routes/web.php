<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| 認証
|--------------------------------------------------------------------------
|
*/

Auth::routes();
// Route::get('/login/{provider}', 'App\Http\Controllers\Auth\LoginController@redirectToProvider')->name('login.{provider}');
// Route::get('/register/{provider}', 'App\Http\Controllers\Auth\RegisterController@showProviderUserRegistrationForm')->name('register.{provider}');

/*
|--------------------------------------------------------------------------
| 検索
|--------------------------------------------------------------------------
|
*/

// トップページ
Route::get('/', 'App\Http\Controllers\Search\IndexController')->name('search.index');
// ランキング
Route::get('/ranking', 'App\Http\Controllers\Search\Ranking\IndexController')->name('search.ranking');
Route::post('/ranking/search/result', 'App\Http\Controllers\Search\Ranking\SearchController')->name('ranking.search');
// 今日の新作
Route::get('/todays_new', 'App\Http\Controllers\Search\TodaysNew\IndexController')->name('search.todays_new');
Route::post('/todays_new/search/result', 'App\Http\Controllers\Search\TodaysNew\SearchController')->name('todays_new.search');
// タグ検索
Route::get('/tags/{name}', 'App\Http\Controllers\Search\TagController')->name('search.tag_name');

Route::middleware('auth')->group(function () {
    // お気に入り
    Route::get('/like', 'App\Http\Controllers\Search\Like\IndexController')->name('search.like');
    Route::post('/like/search/result', 'App\Http\Controllers\Search\Like\SearchController')->name('like.search');
});



/*
|--------------------------------------------------------------------------
| その他
|--------------------------------------------------------------------------
|
*/

// ご利用ガイド
Route::get('/user_guide', 'App\Http\Controllers\Others\UserGuideController')->name('others.user_guide');
// 利用規約
Route::get('/terms_of_service', 'App\Http\Controllers\Others\TermsOfServiceController')->name('others.terms');
// プライバシーポリシー
Route::get('/privacy_policy', 'App\Http\Controllers\Others\PrivacyPolicyController')->name('others.privacy');
// 特許商取引
Route::get('/sct', 'App\Http\Controllers\Others\SctController')->name('others.sct');
// お問い合せ
Route::post('/contact', 'App\Http\Controllers\Others\ContactController')->name('others.contact');


/*
|--------------------------------------------------------------------------
| 作品
|--------------------------------------------------------------------------
|
*/

Route::prefix('books')->name('book.')->group(function () {
    Route::middleware('auth')->group(function () {
        Route::post('/', 'App\Http\Controllers\Books\StoreController')->middleware('throttle:3, 1')->name('store');
        Route::delete('/{book_id}', 'App\Http\Controllers\Books\DestroyController')->name('destroy');
        Route::patch('/{book_id}', 'App\Http\Controllers\Books\UpdateController')->name('update');
        // Route::get('/{book}/edit', 'App\Http\Controllers\Books\EditController')->name('edit');
        Route::put('/{book}/like', 'App\Http\Controllers\Books\LikeController')->name('like');
        Route::delete('/{book}/like', 'App\Http\Controllers\Books\UnlikeController')->name('unlike');

        // エピソード
        Route::get('/{book_id}/{episode_number}', 'App\Http\Controllers\Books\Episode\ShowController')->name('episode.show');
        Route::post('/{book_id}/episode', 'App\Http\Controllers\Books\Episode\StoreController')->middleware('throttle:3, 1')->name('episode.store');
        Route::patch('/{book_id}/{episode_id}/edit', 'App\Http\Controllers\Books\Episode\UpdateController')->name('episode.update');
        Route::delete('/{book_id}/{episode_id}', 'App\Http\Controllers\Books\Episode\DestroyController')->name('episode.destroy');
        // コメント
        Route::post('/{book_id}/{episode_number}', 'App\Http\Controllers\Books\Episode\Comment\StoreController')->middleware('throttle:3, 1')->name('episode.comment.store');
        Route::delete('/{book_id}/{episode_id}/{comment_id}', 'App\Http\Controllers\Books\Episode\Comment\DestroyController')->name('episode.comment.destroy');
    });
    Route::get('/{book_id}', 'App\Http\Controllers\Books\ShowController')->name('show');
});


/*
|--------------------------------------------------------------------------
| ユーザー
|--------------------------------------------------------------------------
|
*/

Route::middleware('auth')->group(function () {
    Route::patch('/{username}', 'App\Http\Controllers\User\UpdateController')->name('users.update');
    Route::put('/{username}/follow', 'App\Http\Controllers\User\FollowController')->name('users.follow');
    Route::delete('/{username}/follow', 'App\Http\Controllers\User\UnfollowController')->name('users.unfollow');
    Route::get('/{username}/settings', 'App\Http\Controllers\User\Setting\IndexController')->name('users.settings');
});
Route::get('/{username}', 'App\Http\Controllers\User\ShowController')->name('users.show');
Route::get('/{username}/likes', 'App\Http\Controllers\User\LikesController')->name('users.likes');
Route::get('/{username}/followings', 'App\Http\Controllers\User\FollowingsController')->name('users.followings');
Route::get('/{username}/followers', 'App\Http\Controllers\User\FollowersController')->name('users.followers');
