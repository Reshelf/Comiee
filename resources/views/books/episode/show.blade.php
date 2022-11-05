@extends('app')

@section('title', $episode->number . '話' . ' - ' . $book->title)

@section('content')
    @include('atoms._episode_nav', ['tab' => 0])

    {{-- エピソードスクリーン --}}
    <episode-screen :title='@json($book->title)' :episode-number='@json($episode->number)'
        :contents='@json($episode->contents ?? [])' endpoint="{{ url('/') }}">
    </episode-screen>

    <div class="w-full h-full bg-white dark:bg-dark">
        <div class="max-w-7xl mx-auto md:py-8 flex flex-col md:flex-row justify-between">
            {{-- 左サイドバー --}}
            @include('books.atoms.leftSidebar')

            <div class="w-full flex py-8">

                {{-- メインコンテンツ --}}
                <div class="px-4 md:px-6 w-full lg:w-2/3">
                    <book-tab :is-comment="true">
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
