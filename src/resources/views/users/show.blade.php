@extends('app')

@section('title', $user->name . 'さんのプロフィール')

@section('content')
    @include('_patials._nav')
    <div class="bg-white dark:bg-dark">
        @include('users._patials.user', [
            'mypage' => true,
            'setting' => false,
        ])
    </div>
    <div class="flex max-w-6xl w-full mx-auto mt-4 px-12 md:px-0 justify-center">
        <div class="w-full mx-12">
            <div class="w-full flex flex-wrap">
                @if ($books->count())
                    @foreach ($books as $book)
                        @include('users._patials.card')
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    @include('_patials._footer')
@endsection
