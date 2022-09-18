<?php

namespace App\Models;

use App\Mail\BareMail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Notifications\PasswordResetNotification;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'avatar',
        'thumbnail',
        'website',
        'body',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new PasswordResetNotification($token, new BareMail()));
    }

    /**
     * 作品
     *
     */
    public function books(): HasMany
    {
        return $this->hasMany('App\Models\Book');
    }

    /**
     * フォロワー
     *
     */
    public function followers(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\User', 'follows', 'followee_id', 'follower_id')->withTimestamps();
    }

    /**
     * フォロー
     *
     */
    public function followings(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\User', 'follows', 'follower_id', 'followee_id')->withTimestamps();
    }

    /**
     * コメント
     *
     */
    public function comments(): HasMany
    {
        return $this->hasMany('App\Models\Comment', 'comments')->withTimestamps();
    }

    /**
     * お気に入り
     *
     */
    public function likes(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Book', 'likes')->withTimestamps();
    }

    /**
     * フォローされているか
     *
     */
    public function isFollowedBy(?User $user): bool
    {
        return $user
            ? (bool)$this->followers->where('id', $user->id)->count()
            : false;
    }

    /**
     * フォロワーの数
     *
     */
    public function getCountFollowersAttribute(): int
    {
        return $this->followers->count();
    }

    /**
     * フォローの数
     *
     */
    public function getCountFollowingsAttribute(): int
    {
        return $this->followings->count();
    }

    /**
     * コメント
     *
     */
    public function hasComments()
    {
        return $this->hasMany(Book::class)
            ->has('episodes.comments')
            ->with(['episodes.comments', 'user'])
            ->get();
    }
}
