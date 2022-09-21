@extends('app')

@section('title', $user->name . 'さんのプロフィール')

@section('content')
    @include('_patials._nav')
    <div class="bg-white dark:bg-dark">
        @include('users._patials.user')
    </div>
    <div class="flex max-w-6xl w-full mx-auto mt-4 px-12 md:px-0 justify-center">
        <div class="w-full mx-12">
            <div class="w-full flex flex-wrap">
                @if (Auth::id() === $user->id)
                    <create-modal>
                        <template #header>新しく作品を投稿する</template>
                        @include('_patials._error_card_list')
                        <form method="POST" action="{{ route('book.store') }}" enctype="multipart/form-data">
                            @include('books._patials.form')
                            <div class="w-full flex justify-end"><button id="submit-btn" type="submit"
                                    class="btn">投稿する</button></div>
                        </form>
                    </create-modal>
                @endif

                @if ($books->count())
                    @foreach ($books as $book)
                        @include('users._patials.card')
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    @include('_patials._footer')
@endsection
