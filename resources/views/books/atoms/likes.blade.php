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
    <book-like :initial-is-liked-by='@json($book->isLikedBy(Auth::user()))' :initial-count-likes='@json($book->count_likes)'
        :authorized='@json(Auth::check())' endpoint="{{ route('book.like', ['book' => $book]) }}">
    </book-like>
@endif
