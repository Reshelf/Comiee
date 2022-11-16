@extends('app')

@section('title', '設定')

@section('content')
    @include('atoms._nav', ['tab' => 0])
    <div class="bg-white dark:bg-dark">
        @include('users.atoms.user', [
            'mypage' => false,
            'settings' => true,
        ])
    </div>
    <div class="flex max-w-6xl w-full mx-auto mt-4 px-6 md:px-0 justify-center mb-8">
        <div class="w-full md:my-8 mx-12">
            <div class="w-full flex">
                @if (Auth::id() === $user->id)
                    <setting-tab :is-comment="false">
                        @include('users.settings.atoms.1')
                        @include('users.settings.atoms.2')
                        @include('users.settings.atoms.3')
                        @include('users.settings.atoms.4')
                    </setting-tab>
                @endif
            </div>
        </div>
    </div>

    @include('atoms._footer')
@endsection
