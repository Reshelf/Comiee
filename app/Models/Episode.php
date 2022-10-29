<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Auth;

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
    function reads(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\User', 'episode_read')->withTimestamps();
    }

    /*
    |--------------------------------------------------------------------------
    | １エピソードの 既読数　　：　　アクセサ
    |--------------------------------------------------------------------------
    */
    public function countReads(): Attribute
    {
        return new Attribute(
            get: fn ($value) => $this->reads->count()
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
            ? (bool)$this->reads->where('id', $user->id)->count()
            : false;
    }
}
