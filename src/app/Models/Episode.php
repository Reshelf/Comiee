<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Episode extends Model
{
    protected $fillable = [
        'book_id',
    ];

    /**
     * エピソードの作品
     */
    public function book(): BelongsTo
    {
        return $this->belongsTo('App\Models\Book');
    }

    /**
     * エピソードへのコメント
     */
    public function comments(): HasMany
    {
        return $this->hasMany('App\Models\Comment');
    }
}
