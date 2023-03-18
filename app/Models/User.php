<?php

namespace App\Models;

use App\Notifications\CustomVerifyEmail;
use App\Notifications\PasswordResetNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'name',
        'username',
        'phone_number',
        'isVerified',
        'email',
        'age',
        'gender',
        'birth',
        'lang',
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

    protected $dates = ['deleted_at'];

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
    | 新規登録ののパスワード認証
    |--------------------------------------------------------------------------
     */

    public function sendEmailVerificationNotification()
    {
        $this->notify(new CustomVerifyEmail());
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
    | 既読　　：　　リレーション
    |--------------------------------------------------------------------------
     */
    public function reads(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Episode', 'episode_read')->withTimestamps();
    }

    /*
    |--------------------------------------------------------------------------
    | エピソードの購入者　：　　リレーション
    |--------------------------------------------------------------------------
     */
    public function bought(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Episode', 'episode_bought')->withTimestamps();
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

    /*
    |--------------------------------------------------------------------------
    | usernameからユーザーを取得　(論理削除ユーザーは除く)　：　　スコープ
    |--------------------------------------------------------------------------
     */
    public function scopeByUsername($query, $username)
    {
        return $query->where('username', $username)->whereNull('deleted_at');
    }

}
