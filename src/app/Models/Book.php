<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Book extends Model
{
    protected $fillable = [
        'title',
        'author',
        'manga_artist',
        'assistant',
        'story',
        'thumbnail',
    ];

    /*
    |--------------------------------------------------------------------------
    | ユーザー
    |--------------------------------------------------------------------------
    */
    public function user(): BelongsTo
    {
        return $this->belongsTo('App\Models\User');
    }

    /*
    |--------------------------------------------------------------------------
    | エピソード
    |--------------------------------------------------------------------------
    */
    public function episodes(): HasMany
    {
        return $this->hasMany('App\Models\Episode');
    }

    /*
    |--------------------------------------------------------------------------
    | お気に入り
    |--------------------------------------------------------------------------
    */
    public function likes(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\User', 'likes')->withTimestamps();
    }

    /*
    |--------------------------------------------------------------------------
    | タグ
    |--------------------------------------------------------------------------
    */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Tag')->withTimestamps();
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

    /*
    |--------------------------------------------------------------------------
    | お気に入りの数
    |--------------------------------------------------------------------------
    */
    public function getCountLikesAttribute(): int
    {
        return $this->likes->count();
    }
}
