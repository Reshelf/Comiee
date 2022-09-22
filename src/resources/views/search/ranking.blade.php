@extends('app')

@section('title', '漫画プラットホーム - Starbooks')

@section('content')
    @include('_patials._nav')
    @include('_patials._genre_nav')

    <div class="flex w-full mx-auto justify-center">
        <div class="w-full flex flex-col md:flex-row justify-around mx-auto p-4 lg:p-8 mb-8">
            <div class="mb-4">
                @include('books._patials.tabs')
            </div>

            <div class="w-full md:w-4/5 rounded-lg md:ml-8">
                {{-- ランキング --}}
                <div class="w-full flex flex-col mb-4">
                    @include('search._patials._tabs', [
                        'ranking' => true,
                        'todays_new' => false,
                        'like' => false,
                        'following' => false,
                    ])

                    <div class="w-full flex flex-wrap justify-start">
                        @empty(!$books)
                            @foreach ($books as $book)
                                <div class="list-item">
                                    <a href="{{ route('book.show', ['book' => $book->id]) }}">
                                        <img src="/img/bg.svg" alt="thumbnail" class="list-item-img">
                                        <span class="thumbnail-title">{{ $book->title }}</span>
                                    </a>

                                    <book-like :initial-is-liked-by='@json($book->isLikedBy(Auth::user()))'
                                        :initial-count-likes='@json($book->count_likes)'
                                        :authorized='@json(Auth::check())'
                                        endpoint="{{ route('book.like', ['book' => $book]) }}">
                                    </book-like>
                                </div>
                            @endforeach
                        @endempty
                    </div>
                </div>

                <div class="w-full flex justify-center mt-8">{{ $books->links() }}</div>
            </div>
        </div>
    </div>

    @include('_patials._footer')
@endsection
