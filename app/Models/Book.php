<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'story',
        'is_color',
        'screen_type',
        'thumbnail',
    ];

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
    | エピソード　　：　　リレーション
    |--------------------------------------------------------------------------
     */
    public function episodes(): HasMany
    {
        return $this->hasMany('App\Models\Episode');
    }

    /*
    |--------------------------------------------------------------------------
    | お気に入り　　：　　リレーション
    |--------------------------------------------------------------------------
     */
    public function likes(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\User', 'likes')->withTimestamps();
    }

    /*
    |--------------------------------------------------------------------------
    | タグ　　：　　リレーション
    |--------------------------------------------------------------------------
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Tag')->withTimestamps();
    }

    /*
    |--------------------------------------------------------------------------
    | コメント　　：　　リレーション
    |--------------------------------------------------------------------------
     */
    public function comments(): HasMany
    {
        return $this->hasMany('App\Models\Comment');
    }

    /*
    |--------------------------------------------------------------------------
    | 特定作品のエピソード　　：　　アクセサ
    |--------------------------------------------------------------------------
     */
    public function bookEpisodes(): Attribute
    {
        return new Attribute(
            get:fn($value) => $this->episodes()->orderBy('created_at', 'desc')->get()
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
            get:fn($value) =>
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
            get:fn($value) => $this->likes->count()
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
        ? (bool) $this->likes->where('id', $user->id)->count()
        : false;
    }

    /*
    |--------------------------------------------------------------------------
    | すべてのエピソードの閲覧数を合計して、作品の閲覧数を更新
    |--------------------------------------------------------------------------
     */
    public function updateViews()
    {
        $totalViews = 0;
        foreach ($this->episodes as $episode) {
            $totalViews += $episode->views;
        }
        $this->views = $totalViews;
        $this->save();
    }

    /*
    |--------------------------------------------------------------------------
    | すべてのエピソードのいいねの総数　　　：　　メソッド
    |--------------------------------------------------------------------------
     */
    public function totalLikes()
    {
        return $this->episodes->sum(function ($episode) {
            return $episode->countLikes;
        });
    }

    /*
    |--------------------------------------------------------------------------
    | 作品のページビュー数　　：　　リレーション
    |--------------------------------------------------------------------------
     */
    public function pageViews()
    {
        return $this->hasMany(BookPageView::class);
    }

}
