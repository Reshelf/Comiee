@extends('app')

@section('title', '漫画プラットホーム - Starbooks')

@section('content')
    @include('_patials._nav')

    <div class="flex w-full mx-auto justify-center">
        <div class="w-full flex flex-col md:flex-row justify-around mx-auto p-4 lg:p-8 mb-8">
            <div class="mb-4">
                @include('books._patials.tabs')
            </div>

            <div class="w-full md:w-4/5 rounded-lg md:ml-8">
                {{-- ランキング --}}
                <div class="w-full flex flex-col mb-4">
                    <div class="w-full max-w-8xl mx-auto mb-4">
                        <div class="relative flex items-center justify-between">

                            {{-- たぶ --}}
                            @include('search._patials._tabs', [
                                'ranking' => true,
                                'todays_new' => false,
                                'like' => false,
                                'following' => false,
                            ])

                            {{-- 並び替え --}}
                            <ranking-sort-modal class="flex justify-end mr-4">
                                <template #trigger>並び替え</template>
                                @include('_patials._error_card_list')
                                <form method="POST" action="{{ route('ranking.search') }}">
                                    @csrf
                                    @include('search._patials._form', [
                                        'ranking' => true,
                                        'todays_new' => false,
                                        'like' => false,
                                        'following' => false,
                                    ])
                                    <div class="w-full flex p-2">
                                        <button onclick="this.disabled='disabled'; this.form.submit();" type="submit"
                                            class="btn w-full">並び替える</button>
                                    </div>
                                </form>
                            </ranking-sort-modal>
                        </div>
                    </div>


                    <div class="w-full flex flex-wrap justify-start">
                        @empty(!$books)
                            @foreach ($books as $book)
                                <div class="list-item">
                                    <a href="{{ route('book.show', ['book_id' => $book->id]) }}">
                                        <img src="/img/bg.svg" alt="thumbnail" class="list-item-img">
                                        <span class="thumbnail-title">{{ $book->title }}</span>
                                    </a>
                                    <div class="flex items-center mr-3">
                                        {{-- お気に入り数 --}}
                                        <book-like :initial-is-liked-by='@json($book->isLikedBy(Auth::user()))'
                                            :initial-count-likes='@json($book->count_likes)'
                                            :authorized='@json(Auth::check())'
                                            endpoint="{{ route('book.like', ['book' => $book]) }}">
                                        </book-like>
                                        {{-- 再生回数 --}}
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

                <div class="w-full flex justify-center mt-8">{{ $books->links() }}</div>
            </div>
        </div>
    </div>

    @include('_patials._footer')
@endsection
