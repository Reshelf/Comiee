@extends('app')

@section('title', $user->name . 'さんのプロフィール')

@section('content')
    @include('atoms._nav', ['tab' => 0])
    <div class="bg-white dark:bg-dark">
        @include('users.atoms.user', [
            'mypage' => true,
            'settings' => false,
        ])
    </div>
    <div class="flex max-w-6xl w-full mx-auto mt-4 px-12 md:px-0 justify-center">
        <div class="w-full mx-12">
            <div class="lg:mb-4">
                @include('atoms.success')
            </div>
            <div class="w-full flex flex-wrap">
                @if ($books->count() > 0)
                    @foreach ($books as $book)
                        @include('users.atoms.card')
                    @endforeach
                @endif
                @include('atoms.nomessage')
            </div>
        </div>
    </div>

    @include('atoms._footer')
@endsection
