<template #info>
  {{-- あらすじ --}}
  @empty(!$book->story)
    <div class="w-full flex flex-col border-b border-ccc dark:border-dark-1 pb-6 mb-6 pl-2">
      <div class="text-sm">
        {!! nl2br($book->story) !!}
      </div>
    </div>
  @endempty

  {{-- 原作 --}}
  @empty(!$book->user->name)
    <div class="w-full flex items-center mb-4 pl-2">
      <div class="w-1/2">{{ __('作者') }}</div>
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
          <a href="{{ route('ranking.boys', app()->getLocale()) }}" class="hover:text-primary">{{ __('少年') }}</a>
        @elseif($book->genre_id === 2)
          <a href="{{ route('ranking.youth', app()->getLocale()) }}" class="hover:text-primary">{{ __('青年') }}</a>
        @elseif($book->genre_id === 3)
          <a href="{{ route('ranking.girls', app()->getLocale()) }}" class="hover:text-primary">{{ __('少女') }}</a>
        @elseif($book->genre_id === 4)
          <a href="{{ route('ranking.woman', app()->getLocale()) }}" class="hover:text-primary">{{ __('女性') }}</a>
        @elseif($book->genre_id === 5)
          <a href="{{ route('ranking.adult', app()->getLocale()) }}" class="hover:text-primary">{{ __('オトナ') }}</a>
        @endif
      </div>
    </div>
  @endempty


  {{-- 言語 --}}
  @empty(!$book->lang)
    <div class="w-full flex items-center mb-4 pl-2">
      <div class="w-1/2">{{ __('言語') }}</div>
      <div class="w-1/2">
        @if ($book->lang === 0)
          <a href="" class="hover:text-primary">{{ __('日本語') }}</a>
        @elseif($book->lang === 1)
          <a href="" class="hover:text-primary">{{ __('英語') }}</a>
        @elseif($book->lang === 2)
          <a href="" class="hover:text-primary">{{ __('繁体字') }}</a>
        @elseif($book->lang === 3)
          <a href="" class="hover:text-primary">{{ __('簡体字') }}</a>
        @elseif($book->lang === 4)
          <a href="" class="hover:text-primary">{{ __('スペイン語') }}</a>
        @elseif($book->lang === 5)
          <a href="" class="hover:text-primary">{{ __('ヒンディー語') }}</a>
        @elseif($book->lang === 6)
          <a href="" class="hover:text-primary">{{ __('アラビア語') }}</a>
        @elseif($book->lang === 7)
          <a href="" class="hover:text-primary">{{ __('ポルトガル語') }}</a>
        @elseif($book->lang === 8)
          <a href="" class="hover:text-primary">{{ __('ベンガル語') }}</a>
        @elseif($book->lang === 9)
          <a href="" class="hover:text-primary">{{ __('ドイツ語') }}</a>
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
            class="inline-block mr-2 mb-2 text-xs text-666 dark:text-ddd rounded-[3px] border border-aaa  hover:text-primary p-1.5 px-2">
            {{ $tag->hashtag }}
          </a>
          @if ($loop->last)
          @endif
        @endforeach
      </div>
    </div>
  @endif
</template>
