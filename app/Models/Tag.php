<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    protected $fillable = [
        'name',
    ];

    /*
    |--------------------------------------------------------------------------
    | 作品　　：　　リレーション
    |--------------------------------------------------------------------------
    */
    public function books(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Book')->withTimestamps();
    }

    /*
    |--------------------------------------------------------------------------
    | ハッシュタグ　　：　　アクセサ
    |--------------------------------------------------------------------------
    */
    public function hashtag(): Attribute
    {
        return new Attribute(
            get: fn ($value) => '#' . $this->name
        );
    }

    /*
    |--------------------------------------------------------------------------
    | すべてのタグ　　：　　アクセサ
    |--------------------------------------------------------------------------
    */
    public function allTags(): Attribute
    {
        return new Attribute(
            get: fn ($value) =>
            Tag::all()->map(function ($tag) {
                return ['text' => $tag->name];
            })
        );
    }
}
