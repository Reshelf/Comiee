@extends('app')

@section('title', '設定')

@section('content')
    @include('atoms._nav', ['tab' => 0]))
    <div class="bg-white dark:bg-dark">
        @include('users.atoms.user', [
            'mypage' => false,
            'settings' => true,
        ])
    </div>
    <div class="flex max-w-6xl w-full mx-auto mt-4 px-12 md:px-0 justify-center">
        <div class="w-full mx-12">
            <div class="w-full flex">
                <setting-tab :is-comment="false">
                    <template #1>
                        <h2 class="text-xl font-semibold">メール通知設定</h2>
                    </template>
                    <template #2>
                        <h2 class="text-xl font-semibold">購入履歴</h2>
                    </template>
                    <template #3>
                        <h2 class="text-xl font-semibold">表示しない作品</h2>
                    </template>
                </setting-tab>
            </div>
        </div>
    </div>

    @include('atoms._footer')
@endsection
