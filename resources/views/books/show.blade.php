@extends('app')

@section('title', $book->title)

@isset($book->thumbnail)
    @section('image')
        <meta property="og:image" content="{{ $book->thumbnail }}">
        <meta property="og:image:secure_url" content="{{ $book->thumbnail }}">
        <meta name="twitter:image" content="{{ $book->thumbnail }}">
    @endsection
@endisset

@section('content')
    @include('atoms._nav', ['tab' => 0])

    <div class="w-full h-full bg-white dark:bg-dark">
        <div class="max-w-7xl mx-auto md:py-8 flex flex-col md:flex-row justify-between">
            {{-- 左サイドバー --}}
            @include('books.atoms.leftSidebar')

            <div class="w-full flex flex-col md:flex-row py-8">
                {{-- メインコンテンツ --}}
                <div class="px-6 lg:w-2/3">
                    <book-tab :is-comment="false">
                        @include('books.episode.tab.1')
                        @include('books.episode.tab.2')
                    </book-tab>
                </div>

                {{-- 右サイドバー --}}
                <div class="lg:pl-4 lg:w-1/3"></div>
            </div>
        </div>
    </div>

    @include('atoms._footer')
@endsection
