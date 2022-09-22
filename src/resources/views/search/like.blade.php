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

                    {{-- 並び替え --}}
                    <div class="w-full max-w-8xl mx-auto mb-4">
                        <div class="relative flex items-center justify-between">
                            @include('search._patials._tabs', [
                                'ranking' => false,
                                'todays_new' => false,
                                'like' => true,
                                'following' => false,
                            ])
                            <ranking-sort-modal class="flex justify-end mr-4">
                                <template #trigger>お気に入りの並び替え</template>
                                <template #header>お気に入りの並び替えをする</template>
                                @include('_patials._error_card_list')
                                <form id="submit-form" method="POST" enctype="multipart/form-data"
                                    action="{{ route('ranking.search') }}">
                                    @csrf
                                    @method('PATCH')
                                    @include('books._patials.form')
                                    <div class="w-full flex justify-end">
                                        <button id="submit-btn" type="submit" class="btn">並び替える</button>
                                    </div>
                                </form>
                            </ranking-sort-modal>
                        </div>
                    </div>

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
