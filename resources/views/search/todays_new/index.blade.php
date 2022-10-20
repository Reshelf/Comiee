@extends('app')

@section('title', '漫画プラットホーム | Starbooks')

@section('content')
    @include('_patials._nav', [
        'ranking' => false,
        'todays_new' => true,
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
                                'todays_new' => true,
                                'ranking' => false,
                                // ソート
                                'all' => true,
                                'boys' => false,
                                'youth' => false,
                                'girls' => false,
                                'woman' => false,
                                'adult' => false,
                            ])

                            {{-- フィルター --}}
                            @isset($books)
                                <div class="flex flex-col justify-center border-b border-ddd dark:border-dark-1 pb-2">
                                    @include('search._patials._filter')
                                    <form class="acd-content" method="POST" action="{{ route('todays_new.search') }}">
                                        @csrf
                                        <div class="filters w-1/5 flex flex-col pr-12">
                                            <h4 class="text-xs my-2 py-4 border-b border-ccc">並び替え</h4>
                                            <input class="visually-hidden" type="radio" name="sort" id="like"
                                                value="お気に入り数"
                                                @isset($sort)
                                                    @if ($sort == 'お気に入り数') checked @endif
                                                @endisset />
                                            <label for="like" class="mt-4">お気に入り数</label>
                                            <input class="visually-hidden" type="radio" name="sort" id="view"
                                                value="閲覧回数"
                                                @isset($sort)
                                                    @if ($sort == '閲覧回数') checked @endif
                                                @endisset />
                                            <label for="view" class="mt-4">閲覧回数</label>
                                        </div>
                                        <button type="submit" class="btn-border mt-6">絞り込む</button>
                                    </form>
                                </div>
                            @endisset
                        </div>
                    </div>

                    <div class="w-full flex flex-wrap justify-start">
                        @isset($books)
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

                                            <span class="pl-2">{{ number_format($book->views) }}回</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endisset
                    </div>
                </div>

                <div class="w-full flex justify-center mt-8">{{ $books->links() }}</div>
            </div>
        </div>
    </div>

    @include('_patials._footer')
@endsection
