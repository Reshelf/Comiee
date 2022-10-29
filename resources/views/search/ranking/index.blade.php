@extends('app')

@section('title')
    @switch($genre_id)
        @case(1)
            少年
        @break

        @case(2)
            青年
        @break

        @case(3)
            少女
        @break

        @case(4)
            女性
        @break

        @case(5)
            オトナ
        @break

        @default
            総合
    @endswitch

    - ランキング
@endsection

@section('content')
    @include('atoms._nav', ['tab' => 1]))

    <div class="flex w-full mx-auto justify-center">
        <div class="w-full flex flex-col md:flex-row justify-around mx-auto px-4 lg:p-8 mb-8">
            <div class="mb-4">
                @include('books.atoms.tabs')
            </div>

            <div class="w-full md:w-4/5 rounded-lg md:ml-8">
                {{-- ランキング --}}
                <div class="w-full flex flex-col mb-4">
                    <div class="w-full max-w-8xl mx-auto mb-4">
                        <div class="w-full flex flex-col">
                            @include('search.atoms._term_tabs', [
                                'todays_new' => false,
                                'ranking' => true,
                                'genre' => $genre_id,
                            ])

                            {{-- フィルター --}}
                            @isset($books)
                                <div class="inline-block border-b border-ddd dark:border-dark-1 pb-2">
                                    @include('search.atoms._filter')
                                    <form class="acd-content" method="POST"
                                        @switch($genre_id)
                                            @case(1) action="{{ route('ranking.boys.search') }}" @break
                                            @case(2) action="{{ route('ranking.youth.search') }}" @break
                                            @case(3) action="{{ route('ranking.girls.search') }}" @break
                                            @case(4) action="{{ route('ranking.woman.search') }}" @break
                                            @case(5) action="{{ route('ranking.adult.search') }}" @break
                                            @default action="{{ route('ranking.search') }}"
                                        @endswitch>
                                        @csrf
                                        @include('search.ranking._form', [
                                            'sort' => $sort,
                                            'feature' => $feature,
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
