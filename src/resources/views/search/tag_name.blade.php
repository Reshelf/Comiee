@extends('app')

@section('title', $tag->hashtag)

@section('content')
    @include('_patials._nav')
    <div class="relative bg-[#0A2140] dark:bg-dark bg-opacity-50 flex w-full mx-auto py-12 items-center">
        <div class="max-w-6xl w-full mx-auto text-white font-semibold flex flex-col">
            <h2 class="text-4xl my-4">{{ $tag->hashtag }}</h2>
            <span class="inline-block text-2xl">
                検索結果：{{ $tag->books->count() }}件
            </span>
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
