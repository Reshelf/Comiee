@extends('app')

@section('title', '少年マンガ - ランキング | Starbooks')

@section('content')
    @include('_patials._nav', ['tab' => 1]))

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
                                'genre' => $genre_id,
                            ])

                            {{-- フィルター --}}
                            @isset($books)
                                <div class="inline-block border-b border-ddd dark:border-dark-1 pb-2">
                                    @include('search._patials._filter')
                                    <form class="acd-content" method="POST" action="{{ route('todays_new.adult.search') }}">
                                        @csrf
                                        <div class="filters w-1/5 flex flex-col pr-12">
                                            <h4 class="text-xs my-2 py-4 border-b border-ccc">並び替え</h4>
                                            <input class="visually-hidden" type="radio" name="sort" id="like"
                                                value="お気に入り数"
                                                @isset($sort)
                                                    @if ($sort === 'お気に入り数') checked @endif
                                                @endisset />
                                            <label for="like" class="mt-4">お気に入り数</label>
                                            <input class="visually-hidden" type="radio" name="sort" id="view"
                                                value="閲覧回数"
                                                @isset($sort)
                                                    @if ($sort === '閲覧回数') checked @endif
                                                @endisset />
                                            <label for="view" class="mt-4">閲覧回数</label>
                                        </div>
                                        <button type="submit" class="btn-border mt-6">絞り込む</button>
                                    </form>
                                </div>
                            @endisset
                        </div>
                    </div>

                    @include('search._patials._content')
                </div>

                <div class="w-full flex justify-center mt-8">{{ $books->links() }}</div>
            </div>
        </div>
    </div>

    @include('_patials._footer')
@endsection
