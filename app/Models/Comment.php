<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Comment extends Model
{
    protected $fillable = [
        'comment',
        'user_id',
        'book_id',
        'episode_id',
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
    | ユーザー　　：　　リレーション
    |--------------------------------------------------------------------------
    */
    public function user(): BelongsTo
    {
        return $this->belongsTo('App\Models\User');
    }


    /*
    |--------------------------------------------------------------------------
    | リプライ　
    |--------------------------------------------------------------------------
    */
    public function replies()
    {
        return $this->hasMany('App\Models\Comment', 'parent_id');
    }


    /*
    |--------------------------------------------------------------------------
    | コメントへのいいね　　：　　リレーション
    |--------------------------------------------------------------------------
    */
    public function likes(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\User', 'comment_likes')->withTimestamps();
    }


    /*
    |--------------------------------------------------------------------------
    | お気に入りの数　　：　　アクセサ
    |--------------------------------------------------------------------------
    */
    public function countLikes(): Attribute
    {
        return new Attribute(
            get: fn ($value) => $this->likes->count()
        );
    }


    /*
    |--------------------------------------------------------------------------
    | 誰にお気に入りされているか
    |--------------------------------------------------------------------------
    */
    public function isLikedBy(?User $user): bool
    {
        return $user
            ? (bool)$this->likes->where('id', $user->id)->count()
            : false;
    }
}
