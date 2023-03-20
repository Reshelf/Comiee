<div class="">
  {{-- あらすじ --}}
  @empty(!$book->story)
    <div class="w-full flex flex-col border-b border-[#dadce0] dark:border-dark-1 pb-6 mb-6 pl-2">
      <div class="text-sm">
        {!! nl2br($book->story) !!}
      </div>
    </div>
  @endempty

  {{-- 原作 --}}
  @empty(!$book->user->name)
    <div class="w-full flex items-center mb-4 pl-2">
      <div class="w-1/2">{{ __('クリエイター') }}</div>
      <a href="{{ route('users.show', ['lang' => app()->getLocale(), 'username' => $book->user->username]) }}"
        class="w-1/2 hover:text-primary">{{ $book->user->name }}</a>
    </div>
  @endempty

  {{-- ジャンル --}}
  @empty(!$book->genre_id)
    <div class="w-full flex items-center mb-4 pl-2">
      <div class="w-1/2">{{ __('ジャンル') }}</div>
      <div class="w-1/2">
        @if ($book->genre_id === 1)
          {{ __('少年') }}
        @elseif($book->genre_id === 2)
          {{ __('青年') }}
        @elseif($book->genre_id === 3)
          {{ __('少女') }}
        @elseif($book->genre_id === 4)
          {{ __('女性') }}
        @endif
      </div>
    </div>
  @endempty


  {{-- 言語 --}}
  @empty(!$book->lang)
    <div class="w-full flex items-center mb-4 pl-2">
      <div class="w-1/2">{{ __('言語') }}</div>
      <div class="w-1/2">
        @if ($book->lang === 'ja')
          <a href="" class="hover:text-primary">日本語</a>
        @elseif($book->lang === 'en')
          <a href="" class="hover:text-primary">英語</a>
        @elseif($book->lang === 'tw')
          <a href="" class="hover:text-primary">繁体字</a>
        @elseif($book->lang === 'cn')
          <a href="" class="hover:text-primary">簡体字</a>
        @elseif($book->lang === 'es')
          <a href="" class="hover:text-primary">スペイン語</a>
        @elseif($book->lang === 'fr')
          <a href="" class="hover:text-primary">フランス語</a>
        @elseif($book->lang === 'it')
          <a href="" class="hover:text-primary">イタリア語</a>
        @elseif($book->lang === 'id')
          <a href="" class="hover:text-primary">インドネシア語</a>
        @elseif($book->lang === 'th')
          <a href="" class="hover:text-primary">タイ語</a>
        @elseif($book->lang === 'ko')
          <a href="" class="hover:text-primary">韓国語</a>
        @elseif($book->lang === 'hi')
          <a href="" class="hover:text-primary">ヒンディー語</a>
        @elseif($book->lang === 'ar')
          <a href="" class="hover:text-primary">アラビア語</a>
        @elseif($book->lang === 'pr')
          <a href="" class="hover:text-primary">ポルトガル語</a>
        @elseif($book->lang === 'bn')
          <a href="" class="hover:text-primary">ベンガル語</a>
        @elseif($book->lang === 'de')
          <a href="" class="hover:text-primary">ドイツ語</a>
        @endif
      </div>
    </div>
  @endempty

  {{-- タグ --}}
  @if (count($book->tags) > 0)
    <div class="w-full flex items-start pl-2">
      <div class="w-1/2">{{ __('タグ') }}</div>
      <div class="w-1/2 flex flex-wrap items-center">
        @foreach ($book->tags as $tag)
          @if ($loop->first)
          @endif
          <a href="{{ route('search.tag_name', ['lang' => app()->getLocale(), 'name' => $tag->name]) }}"
            class="inline-block mr-2 mb-2 text-xs text-666 dark:text-ddd rounded-[5px] border border-aaa  hover:text-primary p-1.5 px-2">
            {{ $tag->hashtag }}
          </a>
          @if ($loop->last)
          @endif
        @endforeach
      </div>
    </div>
  @endif
</div>
