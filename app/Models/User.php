<?php

namespace App\Models;

use App\Notifications\PasswordResetNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'username',
        'phone_number',
        'isVerified',
        'email',
        'country_code',
        'avatar',
        'thumbnail',
        // 'website',
        'body',
        'password',
        'email_verified_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /*
    |--------------------------------------------------------------------------
    | トークン
    |--------------------------------------------------------------------------
     */
    public function tokens()
    {
        return $this->hasMany(Token::class);
    }

    /*
    |--------------------------------------------------------------------------
    | 電話番号の取得　：
    |--------------------------------------------------------------------------
     */
    public function getPhoneNumber()
    {
        return $this->country_code . $this->phone;
    }

    /*
    |--------------------------------------------------------------------------
    | パスワードリセットのトークン
    |--------------------------------------------------------------------------
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new PasswordResetNotification($token));
    }

    /*
    |--------------------------------------------------------------------------
    | 作品　　：　　リレーション
    |--------------------------------------------------------------------------
     */
    public function books(): HasMany
    {
        return $this->hasMany('App\Models\Book');
    }

    /*
    |--------------------------------------------------------------------------
    | フォロワー　　：　　リレーション
    |--------------------------------------------------------------------------
     */
    public function followers(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\User', 'follows', 'followee_id', 'follower_id')->withTimestamps();
    }

    /*
    |--------------------------------------------------------------------------
    | フォロー　　：　　リレーション
    |--------------------------------------------------------------------------
     */
    public function followings(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\User', 'follows', 'follower_id', 'followee_id')->withTimestamps();
    }

    /*
    |--------------------------------------------------------------------------
    | コメント　　：　　リレーション
    |--------------------------------------------------------------------------
     */
    public function comments(): HasMany
    {
        return $this->hasMany('App\Models\Comment', 'comments')->withTimestamps();
    }

    /*
    |--------------------------------------------------------------------------
    | お気に入り　　：　　リレーション
    |--------------------------------------------------------------------------
     */
    public function likes(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Book', 'likes')->withTimestamps();
    }

    /*
    |--------------------------------------------------------------------------
    | フォロワーの数　　：　　アクセサ
    |--------------------------------------------------------------------------
     */
    public function countFollowers(): Attribute
    {
        return new Attribute(
            get:fn($value) => $this->followers->count()
        );
    }

    /*
    |--------------------------------------------------------------------------
    | フォローの数　　：　　アクセサ
    |--------------------------------------------------------------------------
     */
    public function countFollowings(): Attribute
    {
        return new Attribute(
            get:fn($value) => $this->followings->count()
        );
    }

    /*
    |--------------------------------------------------------------------------
    | フォローされているか
    |--------------------------------------------------------------------------
     */
    public function isFollowedBy(?User $user): bool
    {
        return $user
        ? (bool) $this->followers->where('id', $user->id)->count()
        : false;
    }
}
