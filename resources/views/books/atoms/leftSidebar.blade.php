<div class="top-0 sticky lg:h-[500px] mb-8 pb-4 pr-4 lg:max-w-[266px] lg:min-w-[266px]">
    @empty($book->thumbnail)
        <img src="/img/bg.svg" alt="thumbnail" class="block dark:hidden w-[250px] h-[250px] object-cover">
        <img src="/img/bg-dark.svg" alt="thumbnail" class="hidden dark:block w-[250px] h-[250px] object-cover">
    @else
        <img src="{{ asset('/img/book/thumbnail/' . $book->thumbnail) }}" alt="book thumbnail"
            class="w-[250px] h-[250px] object-cover">
    @endempty

    {{-- 作品タイトル --}}
    <a href="{{ route('book.show', ['book_id' => $book->id]) }}"
        class="inline-block text-2xl font-semibold my-4 px-2">{{ $book->title }}</a>

    {{-- 閲覧数 --}}
    {{-- @empty(!$book) --}}
    <div class="w-full flex items-center px-2 mb-2">
        <div class="flex items-center">
            <span class="text-666 text-lg">{{ number_format($book->views) }}</span>
            <span class=" text-aaa pl-2">回閲覧</span>
        </div>
    </div>
    {{-- @endempty --}}

    {{-- お気に入り --}}
    <div class="w-full flex items-center px-2 mb-4">
        @if (Auth::user() && $book->user->id === Auth::user()->id)
            <div class="flex items-center cursor-not-allowed">
                <svg class="w-[24px] h-[24px] stroke-aaa" viewBox="0 0 22 22" fill="none">
                    <path
                        d="M12.7299 2.51014L14.4899 6.03014C14.7299 6.52014 15.3699 6.99014 15.9099 7.08014L19.0999 7.61014C21.1399 7.95014 21.6199 9.43014 20.1499 10.8901L17.6699 13.3701C17.2499 13.7901 17.0199 14.6001 17.1499 15.1801L17.8599 18.2501C18.4199 20.6801 17.1299 21.6201 14.9799 20.3501L11.9899 18.5801C11.4499 18.2601 10.5599 18.2601 10.0099 18.5801L7.01991 20.3501C4.87991 21.6201 3.57991 20.6701 4.13991 18.2501L4.84991 15.1801C4.97991 14.6001 4.74991 13.7901 4.32991 13.3701L1.84991 10.8901C0.389909 9.43014 0.859909 7.95014 2.89991 7.61014L6.08991 7.08014C6.61991 6.99014 7.25991 6.52014 7.49991 6.03014L9.25991 2.51014C10.2199 0.600137 11.7799 0.600137 12.7299 2.51014Z"
                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <span class="ml-2">{{ $book->count_likes }}</span>
            </div>
        @else
            {{-- お気に入り --}}
            @include('atoms.likes')
        @endif
    </div>

    {{-- 完結作品 --}}
    @if ($book->is_complete)
        <a href="{{ route('search.complete') }}"
            class="inline-block text-[#e19324] dark:bg-[#e19324] dark:bg-opacity-30 text-xs border dark:border-none px-2 py-0.5 rounded-[3px] ml-2">
            完結</a>
    @endif

    @if (Auth::id() !== $book->user_id)
        {{-- 読者だったら --}}
        <div class="w-full flex flex-col mt-4 px-2">
            <button class="btn-border py-3 mb-2">1話を読む</button>
            <button class="btn-primary py-3">全話をまとめて購入</button>
        </div>
    @else
        {{-- 作品内容の更新 --}}
        @include('books.atoms.edit')
    @endif

    {{-- SNSシェア --}}
    <div class="mt-4 mx-2">
        @include('atoms.sns')
    </div>
</div>
