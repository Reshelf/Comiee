<div class="flex items-start justify-between">
    <div class="flex items-start">
        <a href="{{ route('users.show', ['username' => $comment->user->username]) }}">
            @empty($comment->user->avatar)
                <img src="{{ asset('/img/bg.svg') }}" alt="" class="block dark:hidden h-12 w-12 rounded-full shadow">
                <img src="{{ asset('/img/bg-dark.svg') }}" alt=""
                    class="hidden dark:block h-12 w-12 rounded-full shadow">
            @else
                <img src="{{ $comment->user->avatar }}" alt="" class="h-8 w-8 rounded-full shadow">
            @endempty
        </a>
        <div class="flex flex-col mt-1 ml-4">
            <div class="flex items-start">
                <div class="flex items-start leading-none">{{ $comment->user->name }}</div>
                @if ($book->user->id === $comment->user->id)
                    <svg class="ml-1 w-[14px] h-[14px]" viewBox="0 0 24 24" fill="none">
                        <path
                            d="M12 2C6.49 2 2 6.49 2 12C2 17.51 6.49 22 12 22C17.51 22 22 17.51 22 12C22 6.49 17.51 2 12 2ZM16.78 9.7L11.11 15.37C10.97 15.51 10.78 15.59 10.58 15.59C10.38 15.59 10.19 15.51 10.05 15.37L7.22 12.54C6.93 12.25 6.93 11.77 7.22 11.48C7.51 11.19 7.99 11.19 8.28 11.48L10.58 13.78L15.72 8.64C16.01 8.35 16.49 8.35 16.78 8.64C17.07 8.93 17.07 9.4 16.78 9.7Z"
                            class="fill-primary" />
                    </svg>
                @endif
                <div class="ml-2 text-xs text-666 dark:text-ddd">{{ $comment->created_at->format('Y/m/d H:i') }}</div>
            </div>


            {{-- コメント内容 --}}
            <div class="pt-2 pb-3 text-666">{!! nl2br($comment->comment) !!}</div>


            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <div class="mr-4">
                        {{-- コメントへのイイね --}}
                        @include('books.episode.comment.likes')
                    </div>


                    <comment-post-modal class="mr-4">
                        <template #trigger>
                            <span class="text-666">返信</span>
                        </template>
                        <template #header>{{ $comment->user->username }}さんに返信する</template>
                        <form method="POST"
                            action="{{ route('book.episode.comment.store', [
                                'book_id' => $book->id,
                                'episode_id' => $episode->id,
                                'episode_number' => $episode->number,
                                'parent_id' => $comment->id,
                            ]) }}">
                            @csrf
                            <input value="{{ Auth::id() }}" type="hidden" name="user_id" />
                            <textarea class="dark:bg-dark-1 w-full h-[250px] rounded-[3px]"
                                placeholder="ここはエピソードへの応援コメントを投稿できる場所です！&#10;&#10;作品内容と関係がないコメント、作品や作家を中傷するようなコメント、ネタバレやその他不適切なコメントは投稿しないでね！&#10;&#10;不適切なコメントを見つけた場合は通報をお願いいたします！&#10;&#10;ひどい場合は、断りなくコメントの削除やアカウントを凍結させていただく場合があります。"
                                autocomplete="off" autofocus="on" type="text" name="comment" maxlength="400" required></textarea>
                            <button type="submit" class="btn w-full">返信する</button>
                        </form>
                    </comment-post-modal>
                </div>
            </div>
        </div>
    </div>


    <div class="dropdown">
        <button class="dropbtn">
            <svg class="w-[20px] h-[20px] stroke-t-color" viewBox="0 0 24 24" fill="none">
                <path d="M5 10C3.9 10 3 10.9 3 12C3 13.1 3.9 14 5 14C6.1 14 7 13.1 7 12C7 10.9 6.1 10 5 10Z"
                    stroke-width="1.5" />
                <path
                    d="M19 10C17.9 10 17 10.9 17 12C17 13.1 17.9 14 19 14C20.1 14 21 13.1 21 12C21 10.9 20.1 10 19 10Z"
                    stroke-width="1.5" />
                <path
                    d="M12 10C10.9 10 10 10.9 10 12C10 13.1 10.9 14 12 14C13.1 14 14 13.1 14 12C14 10.9 13.1 10 12 10Z"
                    stroke-width="1.5" />
            </svg>
        </button>
        <div class="dropdown-content">
            @if ($comment->user->id == Auth::id())
                <form method="POST"
                    action="{{ route('book.episode.comment.destroy', ['book_id' => $book->id, 'episode_id' => $episode->id, 'comment_id' => $comment->id]) }}"
                    class="m-2">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="flex w-full h-full py-2 px-4 hover:text-primary">削除する</button>
                </form>
            @endif
            {{-- 通報 --}}
            @if ($comment->user->id != Auth::id())
                <li>
                    <comment-post-modal>
                        <template #trigger>
                            通報する
                        </template>
                        <template #header>コメントに対して通報する</template>
                        <form method="POST"
                            action="{{ route('others.report', ['user' => Auth::user(), 'reportedUser' => $comment->user->email, 'comment' => $comment->comment]) }}"
                            class="flex flex-col">
                            @csrf
                            <input value="{{ Auth::id() }}" type="hidden" name="user_id" />
                            <textarea class="dark:bg-dark-1 w-full h-[250px] rounded-[3px]" placeholder="お問い合せ内容を記入してください。" autocomplete="off"
                                autofocus="on" type="text" name="body" maxlength="400" required></textarea>
                            <button type="submit" class="btn w-full">送信する</button>
                        </form>
                    </comment-post-modal>
                </li>
            @endif
        </div>
    </div>

</div>
