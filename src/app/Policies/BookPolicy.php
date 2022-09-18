<?php

namespace App\Policies;

use App\Models\Book;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BookPolicy
{
    use HandlesAuthorization;

    /**
     * viewAnyメソッドは、indexアクションメソッドに対応,
     * 誰でもアクセスできる
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(?User $user)
    {
        return true;
    }

    /**
     * viewメソッドは、showアクションメソッドに対応
     * 誰でもアクセスできる
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(?User $user, Book $book)
    {
        return true;
    }

    /**
     * ログイン中のユーザーのIDと作品モデルのユーザーIDが一致すればOK
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * ログイン中のユーザーのIDと作品モデルのユーザーIDが一致すればOK
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Book $book)
    {
        return $user->id === $book->user_id;
    }

    /**
     * ログイン中のユーザーのIDと作品モデルのユーザーIDが一致すればOK
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Book $book)
    {
        return $user->id === $book->user_id;
    }

    /**
     * ログイン中のユーザーのIDと作品モデルのユーザーIDが一致すればOK
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Book $book)
    {
        return $user->id === $book->user_id;
    }

    /**
     * ログイン中のユーザーのIDと作品モデルのユーザーIDが一致すればOK
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Book $book)
    {
        return $user->id === $book->user_id;
    }
}
