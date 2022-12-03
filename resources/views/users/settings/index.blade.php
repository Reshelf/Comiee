@extends('app')

@section('title', __('設定'))

@section('content')
    @include('atoms._nav', ['tab' => 0])

    <div class="mx-4 lg:mx-0">
        @include('atoms._error_card_list')
        @include('atoms.success')
    </div>

    <div class="bg-white dark:bg-dark">
        @include('users.atoms.user', [
            'mypage' => false,
            'settings' => true,
        ])
    </div>

    @if (Auth::id() === $user->id)
        <div class="flex max-w-6xl w-full mx-auto px-6 md:px-0 justify-center mb-8">
            <div class="w-full mx-12">
                <div class="w-full my-4 flex">
                    <setting-tab :is-comment="false">
                        @include('users.settings.atoms.1')
                        @include('users.settings.atoms.2')
                        @include('users.settings.atoms.3')
                        @include('users.settings.atoms.4')
                    </setting-tab>
                </div>
            </div>
        </div>
    @endif


    @include('atoms._footer')
@endsection
