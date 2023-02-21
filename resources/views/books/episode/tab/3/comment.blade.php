<div class="flex items-start justify-between">
  <div class="flex items-start">
    <a href="{{ route('users.show', ['lang' => app()->getLocale(), 'username' => $comment->user->username]) }}">
      @empty($comment->user->avatar)
        <svg class="h-8 w-8 fill-dark" viewBox="0 0 42 42" fill="none">
          <rect rx="21" />
          <path class="stroke-ccc"
            d="M21 21C23.7614 21 26 18.7614 26 16C26 13.2386 23.7614 11 21 11C18.2386 11 16 13.2386 16 16C16 18.7614 18.2386 21 21 21Z"
            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
          <path d="M29.5901 31C29.5901 27.13 25.7402 24 21.0002 24C16.2602 24 12.4102 27.13 12.4102 31" class="stroke-ccc"
            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
      @else
        <img src="{{ $comment->user->avatar }}" alt="" class="h-8 w-8 rounded-full shadow">
      @endempty
    </a>
    <div class="flex flex-col mt-1 ml-4">
      <div class="flex items-start">
        <div class="flex items-start max-w-[50px] lg:max-w-auto truncate leading-none text-ddd">
          {{ $comment->user->name }}
        </div>
        @if ($book->user->id === $comment->user->id)
          <svg class="ml-1 w-[14px] h-[14px]" viewBox="0 0 24 24" fill="none">
            <path
              d="M12 2C6.49 2 2 6.49 2 12C2 17.51 6.49 22 12 22C17.51 22 22 17.51 22 12C22 6.49 17.51 2 12 2ZM16.78 9.7L11.11 15.37C10.97 15.51 10.78 15.59 10.58 15.59C10.38 15.59 10.19 15.51 10.05 15.37L7.22 12.54C6.93 12.25 6.93 11.77 7.22 11.48C7.51 11.19 7.99 11.19 8.28 11.48L10.58 13.78L15.72 8.64C16.01 8.35 16.49 8.35 16.78 8.64C17.07 8.93 17.07 9.4 16.78 9.7Z"
              class="fill-white" />
          </svg>
        @endif
        <div class="ml-2 text-xs text-bbb">{{ $comment->created_at->format('Y/m/d H:i') }}</div>
      </div>


      {{-- コメント内容 --}}
      <div class="pt-2 pb-3 text-bbb">{!! nl2br($comment->comment) !!}</div>


      <div class="flex items-center justify-between">
        <div class="flex items-center">
          <div class="mr-4">
            {{-- コメントへのイイね --}}
            @include('books.episode.comment.likes')
          </div>


          <comment-post-modal class="mr-4">
            <template #trigger>
              <span class="text-bbb">{{ __('返信') }}</span>
            </template>
            <template #header>{{ $comment->user->username }}{{ __('さんに返信する') }}</template>
            <form method="POST"
              action="{{ route('book.episode.comment.store', [
                  'lang' => app()->getLocale(),
                  'book_id' => $book->id,
                  'episode_id' => $episode->id,
                  'episode_number' => $episode->number,
                  'parent_id' => $comment->id,
              ]) }}">
              @csrf
              <input value="{{ Auth::id() }}" type="hidden" name="user_id" />
              <textarea class="bg-dark-1 w-full h-[250px] rounded-[5px]"
                placeholder="{{ __('ここはエピソードへの応援コメントを投稿できる場所です！') }}&#10;&#10;{{ __('作品内容と関係がないコメント、作品や作家を中傷するようなコメント、ネタバレやその他不適切なコメントは投稿しないでね！') }}&#10;&#10;{{ __('不適切なコメントを見つけた場合は通報をお願いいたします！') }}&#10;&#10;{{ __('ひどい場合は、断りなくコメントの削除やアカウントを凍結させていただく場合があります。') }}"
                autocomplete="off" autofocus="on" type="text" name="comment" maxlength="400" required></textarea>

              <button type="submit" class="btn w-full">{{ __('返信する') }}</button>
            </form>
          </comment-post-modal>
        </div>
      </div>
    </div>
  </div>


  <div class="dropdown">
    <button class="dropbtn">
      <svg class="w-[20px] h-[20px] stroke-ddd" viewBox="0 0 24 24" fill="none">
        <path d="M5 10C3.9 10 3 10.9 3 12C3 13.1 3.9 14 5 14C6.1 14 7 13.1 7 12C7 10.9 6.1 10 5 10Z"
          stroke-width="1.5" />
        <path d="M19 10C17.9 10 17 10.9 17 12C17 13.1 17.9 14 19 14C20.1 14 21 13.1 21 12C21 10.9 20.1 10 19 10Z"
          stroke-width="1.5" />
        <path d="M12 10C10.9 10 10 10.9 10 12C10 13.1 10.9 14 12 14C13.1 14 14 13.1 14 12C14 10.9 13.1 10 12 10Z"
          stroke-width="1.5" />
      </svg>
    </button>
    <div class="dropdown-content">
      @if ($comment->user->id == Auth::id())
        <form method="POST"
          action="{{ route('book.episode.comment.destroy', ['lang' => app()->getLocale(), 'book_id' => $book->id, 'episode_id' => $episode->id, 'comment_id' => $comment->id]) }}"
          class="m-2">
          @csrf
          @method('DELETE')
          <button type="submit" class="flex w-full h-full py-2 px-4 hover:text-primary">{{ __('削除する') }}</button>
        </form>
      @endif
      {{-- 通報 --}}
      @if ($comment->user->id != Auth::id())
        <comment-post-modal>
          <template #trigger>
            <div class="flex w-full h-full p-2 lg:px-4 hover:text-primary">
              {{ __('通報する') }}
            </div>
          </template>
          <template #header>{{ __('コメントに対して通報する') }}</template>
          <form method="POST"
            action="{{ route('others.report', ['lang' => app()->getLocale(), 'user' => Auth::user(), 'reportedUser' => $comment->user->email, 'comment' => $comment->comment]) }}"
            class="flex flex-col">
            @csrf
            <input value="{{ Auth::id() }}" type="hidden" name="user_id" />
            <textarea class="bg-dark-1 w-full h-[250px] rounded-[5px]" placeholder="{{ __('お問い合せ内容を記入してください。') }}"
              autocomplete="off" autofocus="on" type="text" name="body" maxlength="400" required></textarea>

            <button type="submit" class="btn w-full">{{ __('送信する') }}</button>
          </form>
        </comment-post-modal>
      @endif
    </div>
  </div>

</div>
