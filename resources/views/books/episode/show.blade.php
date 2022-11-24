@extends('app')

@section('title', $episode->number . '話' . ' - ' . $book->title)

@isset($episode->thumbnail)
    @section('image')
        <meta property="og:image" content="{{ $episode->thumbnail }}">
        <meta property="og:image:secure_url" content="{{ $episode->thumbnail }}">
        <meta name="twitter:image" content="{{ $episode->thumbnail }}">
    @endsection
@endisset

@isset($book->story)
    @section('description')
        <meta name="description" itemprop="description" content="{{ $book->story }}">
        <meta property="og:description" content="{{ $book->story }}">
        <meta name="twitter:description" content="{{ $book->story }}">
    @endsection
@endisset

@section('content')
    <div class="hidden lg:block">
        @include('atoms._episode_nav', ['tab' => 0])
    </div>
    <div class="block lg:hidden">
        @include('atoms._nav', ['tab' => 1])
    </div>

    {{-- エピソードスクリーン --}}
    <episode-screen :title='@json($book->title)' :episode-number='@json($episode->number)'
        :contents='@json($episode->contents ?? [])' endpoint="{{ url('/') }}">
    </episode-screen>

    <div class="w-full mt-8 lg:mt-auto h-full bg-white dark:bg-dark">
        <div class="max-w-7xl mx-auto md:py-8 flex flex-col md:flex-row justify-between">
            {{-- 左サイドバー --}}
            <div class="hidden lg:block">
                @include('books.atoms.leftSidebar', [
                    'sns_title' => $episode->number . '話' . ' - ' . $book->title,
                ])
            </div>

            <div class="w-full flex py-8">

                {{-- メインコンテンツ --}}
                <div class="px-4 md:px-6 w-full lg:w-2/3">
                    <book-tab :is-comment="true" :count='@json(count($comments) ?? 0)'>
                        @include('books.episode.tab.1')
                        @include('books.episode.tab.2')
                        @include('books.episode.tab.3')
                    </book-tab>
                </div>


                {{-- 右サイドバー --}}
                <div class="mg:pl-4 lg:w-1/3"></div>
            </div>
        </div>
    </div>

    @include('atoms._footer')
@endsection
