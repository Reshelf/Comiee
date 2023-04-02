<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookPageView extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'book_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    /*
    |--------------------------------------------------------------------------
    | 作品の情報が含まれたページビューを取得 クエリスコープ
    |--------------------------------------------------------------------------
     */
    public function scopeWithUserAndBook($query)
    {
        return $query->with(['user', 'book']);
    }
}
