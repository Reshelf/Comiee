@extends('app')

@section('title', $tag->hashtag)

@section('content')
    @include('atoms._nav', ['tab' => 0]))
    <div class="relative bg-[#0A2140] dark:bg-dark bg-opacity-50 flex w-full mx-auto py-12 items-center">
        <div class="max-w-6xl w-full mx-auto text-white font-semibold flex items-center">
            <h2 class="text-3xl">「{{ $tag->hashtag }}」</h2>
            <span class="inline-block text-2xl ml-4">
                {{ $tag->books->count() }}件
            </span>
        </div>
    </div>

    <div class="flex max-w-6xl w-full mx-auto mt-8 pt-8 px-12 md:px-0 justify-center">
        <div class="w-full mx-12">
            <div class="w-full flex flex-wrap justify-start">
                @foreach ($tag->books as $book)
                    @include('users.atoms.card')
                @endforeach
            </div>
        </div>
    </div>

    @include('atoms._footer')
@endsection
