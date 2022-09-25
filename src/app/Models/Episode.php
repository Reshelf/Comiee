<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
    | コメント　　：　　リレーション
    |--------------------------------------------------------------------------
    */
    public function comments(): HasMany
    {
        return $this->hasMany('App\Models\Comment');
    }
}
