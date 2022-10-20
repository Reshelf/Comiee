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
                                'youth' => true,
                                'girls' => false,
                                'woman' => false,
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

                    @include('search._patials._content')
                </div>

                <div class="w-full flex justify-center mt-8">{{ $books->links() }}</div>
            </div>
        </div>
    </div>

    @include('_patials._footer')
@endsection
