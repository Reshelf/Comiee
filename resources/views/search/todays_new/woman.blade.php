@extends('app')

@section('title', '女性マンガ - 今日の新作')

@section('content')
    @include('atoms._nav', ['tab' => 2])

    <div class="flex w-full mx-auto justify-center">
        <div class="w-full flex flex-col md:flex-row justify-around mx-auto p-4 lg:p-8 mb-8">
            <div class="mb-4">
                @include('books.atoms.tabs')
            </div>

            <div class="w-full md:w-4/5 rounded-lg md:ml-8">
                {{-- ランキング --}}
                <div class="w-full flex flex-col mb-4">
                    <div class="w-full max-w-8xl mx-auto mb-4">
                        <div class="w-full flex flex-col">
                            @include('search.atoms._term_tabs', [
                                'todays_new' => true,
                                'ranking' => false,
                                'genre' => $genre_id,
                            ])

                            {{-- フィルター --}}
                            @isset($books)
                                <div class="inline-block border-b border-ddd dark:border-dark-1 pb-2">
                                    @include('search.atoms._filter')
                                    <form class="acd-content" method="POST" action="{{ route('todays_new.woman.search') }}">
                                        @csrf
                                        @include('search.todays_new._form', [
                                            'sort' => $sort,
                                        ])
                                    </form>
                                </div>
                            @endisset
                        </div>
                    </div>

                    @include('search.atoms._content')
                </div>

                <div class="w-full flex justify-center mt-8">{{ $books->appends(Request::except('page'))->links() }}</div>
            </div>
        </div>
    </div>

    @include('atoms._footer')
@endsection
