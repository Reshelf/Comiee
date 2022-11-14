<div class="w-full flex flex-wrap justify-start">
    @isset($books)
        @foreach ($books as $book)
            <div class="list-item">
                <a href="{{ route('book.show', ['book_id' => $book->id]) }}" class="relative inline-block">
                    @empty($book->thumbnail)
                        <img src="/img/bg.svg" alt="thumbnail" class="block dark:hidden list-item-img">
                        <img src="/img/bg-dark.svg" alt="thumbnail" class="hidden dark:block list-item-img">

                        {{-- ランキング15位まではラベルをつける --}}
                        @if ($books->currentpage() === 1 && $loop->iteration <= 15)
                            <span class="ranking-rabel">{{ $loop->iteration }}</span>
                        @endif
                    @else
                        <img src="{{ asset('/img/book/thumbnail/' . $book->thumbnail) }}" alt="thumbnail" class="list-item-img">
                    @endempty
                    <span class="thumbnail-title">{{ $book->title }}</span>
                </a>

                <div class="flex items-center">

                    {{-- お気に入り --}}
                    @include('books.atoms.likes')

                    {{-- 閲覧回数 --}}
                    <div class="flex items-center text-aaa pl-4">
                        <svg class="stroke-666 w-[20px] h-[20px]" viewBox="0 0 24 24" fill="none">
                            <path d="M16.5 9.5L12.3 13.7L10.7 11.3L7.5 14.5" stroke="#292D32" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M14.5 9.5H16.5V11.5" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M9 22H15C20 22 22 20 22 15V9C22 4 20 2 15 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22Z"
                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                        <span class="pl-2">{{ number_format($book->views) }}回</span>
                    </div>
                </div>
            </div>
        @endforeach
    @endisset

    @include('atoms.nomessage')
</div>
