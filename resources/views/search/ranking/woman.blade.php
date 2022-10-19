@extends('app')

@section('title', '漫画プラットホーム | Starbooks')

@section('content')
    @include('_patials._nav', [
        'ranking' => true,
        'todays_new' => false,
        'like' => false,
        'following' => false,
    ])

    <div class="flex w-full mx-auto justify-center">
        <div class="w-full flex flex-col md:flex-row justify-around mx-auto p-4 lg:p-8 mb-8">
            <div class="mb-4">
                @include('books._patials.tabs')
            </div>

            <div class="w-full md:w-4/5 rounded-lg md:ml-8">
                {{-- ランキング --}}
                <div class="w-full flex flex-col mb-4">
                    <div class="w-full max-w-8xl mx-auto mb-4">
                        <div class="w-full flex flex-col">
                            @include('search._patials._term_tabs', [
                                'todays_new' => false,
                                'ranking' => true,
                                // ソート
                                'all' => false,
                                'boys' => false,
                                'youth' => false,
                                'girls' => false,
                                'woman' => true,
                                'adult' => false,
                            ])
                            {{-- フィルター --}}
                            @include('search._patials._filter', [
                                'ranking' => true,
                                'todays_new' => false,
                                'like' => false,
                                'following' => false,
                            ])
                        </div>
                    </div>


                    <div class="w-full flex flex-wrap justify-start">
                        @empty(!$books)
                            @foreach ($books as $book)
                                <div class="list-item">
                                    <a href="{{ route('book.show', ['book_id' => $book->id]) }}">
                                        @empty($book->thumbnail)
                                            <img src="/img/bg.svg" alt="thumbnail" class="block dark:hidden list-item-img">
                                            <img src="/img/bg-dark.svg" alt="thumbnail" class="hidden dark:block list-item-img">
                                        @else
                                            <img src="{{ asset('/img/book/thumbnail/' . $book->thumbnail) }}" alt="thumbnail"
                                                class="list-item-img">
                                        @endempty
                                        <span class="thumbnail-title">{{ $book->title }}</span>
                                    </a>
                                    <div class="flex items-center mr-3">
                                        {{-- お気に入り数 --}}
                                        <book-like :initial-is-liked-by='@json($book->isLikedBy(Auth::user()))'
                                            :initial-count-likes='@json($book->count_likes)'
                                            :authorized='@json(Auth::check())'
                                            endpoint="{{ route('book.like', ['book' => $book]) }}">
                                        </book-like>
                                        {{-- 閲覧回数 --}}
                                        <div class="flex items-center text-aaa ml-4">
                                            <svg class="stroke-666 w-[20px] h-[20px]" viewBox="0 0 24 24" fill="none">
                                                <path d="M16.5 9.5L12.3 13.7L10.7 11.3L7.5 14.5" stroke="#292D32"
                                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M14.5 9.5H16.5V11.5" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path
                                                    d="M9 22H15C20 22 22 20 22 15V9C22 4 20 2 15 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22Z"
                                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>

                                            <span class="pl-2">{{ $book->views }}回</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endempty
                    </div>
                </div>

            </div>
        </div>
    </div>

    @include('_patials._footer')
@endsection
