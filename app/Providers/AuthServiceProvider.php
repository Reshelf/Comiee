<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Book;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * アプリケーションにマップ付されたポリシー
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        'App\Models\Book' => 'App\Policies\BookPolicy',
    ];

    /**
     * アプリケーションの全認証／認可サービスの登録
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
    }
}
