@extends('app')

@section('title', $book->title)

@section('content')
    @include('atoms._nav', ['tab' => 0])

    <div class="w-full h-full bg-white dark:bg-dark">
        <div class="max-w-7xl mx-auto md:py-12 flex justify-between">
            {{-- 左サイドバー --}}
            <div class="top-0 sticky lg:h-[500px] pb-4 pr-4 lg:max-w-[266px] lg:min-w-[266px]">
                @empty($book->thumbnail)
                    <img src="/img/bg.svg" alt="thumbnail" class="block dark:hidden w-[250px] h-[250px] object-cover">
                    <img src="/img/bg-dark.svg" alt="thumbnail" class="hidden dark:block w-[250px] h-[250px] object-cover">
                @else
                    <img src="{{ asset('/img/book/thumbnail/' . $book->thumbnail) }}" alt="book thumbnail"
                        class="w-[250px] h-[250px] object-cover">
                @endempty

                {{-- 作品タイトル --}}
                <h2 class="text-2xl font-semibold my-2 px-2">
                    {{ $book->title }}
                </h2>

                {{-- 閲覧数 --}}
                {{-- @empty(!$book) --}}
                <div class="w-full flex items-center px-2 mb-2">
                    <div class="flex items-center">
                        <span class="text-666 text-lg">{{ number_format($book->views) }}</span>
                        <span class=" text-aaa pl-2">回閲覧</span>
                    </div>
                </div>
                {{-- @endempty --}}

                {{-- 完結作品 --}}
                @if ($book->is_complete)
                    <a href="{{ route('search.complete') }}"
                        class="mb-2 inline-block text-[#e19324] dark:bg-[#e19324] dark:bg-opacity-30 text-xs border dark:border-none px-2 py-0.5 rounded-[3px] ml-2">
                        完結</a>
                @endif


                {{-- お気に入り --}}
                <div class="w-full flex items-center px-2 mb-4">
                    <book-like :initial-is-liked-by='@json($book->isLikedBy(Auth::user()))'
                        :initial-count-likes='@json($book->count_likes)' :authorized='@json(Auth::check())'
                        endpoint="{{ route('book.like', ['book' => $book]) }}">
                    </book-like>
                </div>

                @if (Auth::id() !== $book->user_id)
                    {{-- 読者だったら --}}
                    <div class="w-full flex flex-col mt-6 px-2">
                        <button class="btn-border py-3 mb-2">1話を読む</button>
                        <button class="btn-primary py-3">全話をまとめて購入</button>
                    </div>
                @else
                    {{-- 作品内容の更新 --}}
                    @include('books.atoms.edit')
                @endif

                {{-- SNSシェア --}}
                <div class="mt-4 mx-2">
                    @include('atoms.sns')
                </div>
            </div>

            <div class="w-full flex">
                {{-- メインコンテンツ --}}
                <div class="px-6 lg:w-2/3">
                    <book-tab :is-comment="false">
                        @include('books.episode.tab.1')
                        @include('books.episode.tab.2')
                    </book-tab>
                </div>

                {{-- 右サイドバー --}}
                <div class="pl-4 lg:w-1/3">

                </div>
            </div>
        </div>

        <div class="w-full mx-auto">
            <div class="book-show">
                <div class="book-show-contents">
                    {{-- サムネイル --}}
                    @empty($book->thumbnail)
                        <img src="/img/bg.svg" alt="thumbnail" class="block dark:hidden w-[250px] h-[250px] object-cover">
                        <img src="/img/bg-dark.svg" alt="thumbnail" class="hidden dark:block w-[250px] h-[250px] object-cover">
                    @else
                        <img src="{{ asset('/img/book/thumbnail/' . $book->thumbnail) }}" alt=""
                            class="w-[250px] h-[250px] object-cover">
                    @endempty

                    <div class="flex flex-col max-w-lg ml-16">
                        <p class="w-full flex flex-wrap text-4xl whitespace-pre-line text-white font-semibold">
                            {{ $book->title }}</p>
                        <a href="{{ route('users.show', ['username' => $book->user->username]) }}"
                            class="flex items-center my-4">
                            <span class="text-xl text-white">{{ $book->user->name }}</span>
                        </a>

                        <book-like :initial-is-liked-by='@json($book->isLikedBy(Auth::user()))'
                            :initial-count-likes='@json($book->count_likes)' :authorized='@json(Auth::check())'
                            endpoint="{{ route('book.like', ['book' => $book]) }}" :big='true'
                            class="text-white">
                        </book-like>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('atoms._footer')
@endsection
