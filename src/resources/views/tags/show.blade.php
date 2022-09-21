@extends('app')

@section('title', $tag->hashtag)

@section('content')
    @include('_patials._transparent_nav')
    <div class="tag-hero">
        <div class="z-30 absolute text-white font-semibold flex flex-col items-center justify-center">
            <h2 class="text-4xl my-4">{{ $tag->hashtag }}</h2>
            <span class="inline-block text-2xl">
                {{ $tag->books->count() }}件
            </span>
        </div>
        <div class="tag-hero-img">
            <div class="tag-hero-img-bg">
                <img class="" src="/img/bg-2.svg" alt="">
            </div>
        </div>
    </div>

    <div class="flex max-w-6xl w-full mx-auto mt-8 pt-8 px-12 md:px-0 justify-center">
        <div class="w-full mx-12">
            <div class="w-full flex flex-wrap justify-start">
                @foreach ($tag->books as $book)
                    @include('users._patials.card')
                @endforeach
            </div>
        </div>
    </div>

    @include('_patials._footer')
@endsection
