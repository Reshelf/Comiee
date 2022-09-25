<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;

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
    | 作品再生回数　　：　　アクセサ
    |--------------------------------------------------------------------------
    */
    public function bookViews(): Attribute
    {
        return new Attribute(
            get: fn ($value) => $this->episodes()->where('is_read', true)->count()
        );
    }

    /*
    |--------------------------------------------------------------------------
    | 作品のタグ　　：　　アクセサ
    |--------------------------------------------------------------------------
    */
    public function tagNames(): Attribute
    {
        return new Attribute(
            get: fn ($value) => 
                $this->tags->map(function ($tag) {
                    return ['text' => $tag->name];
                })
        );
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
