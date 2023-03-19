<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Episode extends Model
{
    protected $fillable = [
        'number',
        'price',
        'views',
        'book_id',
    ];

    /*
    |--------------------------------------------------------------------------
    | 作品　　：　　リレーション
    |--------------------------------------------------------------------------
     */
    public function book(): BelongsTo
    {
        return $this->belongsTo('App\Models\Book');
    }

    /*
    |--------------------------------------------------------------------------
    | 既読　　：　　リレーション
    |--------------------------------------------------------------------------
     */
    public function reads(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\User', 'episode_read')->withTimestamps();
    }

    /*
    |--------------------------------------------------------------------------
    | エピソードの購入者　：　　リレーション
    |--------------------------------------------------------------------------
     */
    public function bought(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\User', 'episode_bought')->withTimestamps();
    }

    /*
    |--------------------------------------------------------------------------
    | １エピソードの 既読数　　：　　アクセサ
    |--------------------------------------------------------------------------
     */
    public function countReads(): Attribute
    {
        return new Attribute(
            get:fn($value) => $this->reads->count()
        );
    }

    /*
    |--------------------------------------------------------------------------
    | ユーザーにとってそのエピソードが既読かどうか
    |--------------------------------------------------------------------------
     */
    public function isReadBy(?User $user): bool
    {
        return $user
        ? (bool) $this->reads->where('id', $user->id)->count()
        : false;
    }

    /*
    |--------------------------------------------------------------------------
    | ユーザーにとってそのエピソードは購入済かどうか
    |--------------------------------------------------------------------------
     */
    public function isBoughtBy(?User $user): bool
    {
        return $user
        ? (bool) $this->bought->where('id', $user->id)->count()
        : false;
    }

    /*
    |--------------------------------------------------------------------------
    | 既読処理 メソッド
    |--------------------------------------------------------------------------
    | 与えられたユーザーによる読み込みを登録し、閲覧数を更新
     */
    public function registerReadBy(User $user)
    {
        $this->reads()->detach($user->id);
        $this->reads()->attach($user->id);
        $this->views = $this->count_reads;
        $this->save();
    }

    public function commentsWithLikesCount()
    {
        return Comment::where(['book_id' => $this->book_id, 'episode_id' => $this->id, 'episode_number' => $this->number])
            ->withCount('likes')
            ->orderBy('likes_count', 'desc')
            ->get();
    }
}
