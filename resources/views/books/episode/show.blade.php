@extends('app')

@php
  $a = __('エピソード');
  $b = __('作品情報');
  $c = __('コメント');
  $d = __('件');
  
@endphp

@section('title', $episode->number . __('話') . ' - ' . $book->title)

@isset($episode->thumbnail)
  @section('image')
    <meta property="og:image" content="{{ $episode->thumbnail }}">
    <meta property="og:image:secure_url" content="{{ $episode->thumbnail }}">
    <meta name="twitter:image" content="{{ $episode->thumbnail }}">
  @endsection
@endisset

@isset($book->story)
  @section('description')
    <meta name="description" itemprop="description" content="{{ $book->story }}">
    <meta property="og:description" content="{{ $book->story }}">
    <meta name="twitter:description" content="{{ $book->story }}">
  @endsection
@endisset

@section('content')
  <div class="hidden lg:block">
    @include('atoms._episode_nav', ['tab' => 0])
  </div>

  {{-- エピソードスクリーン --}}
  @if ($episode->is_free || $episode->isBoughtBy(Auth::user()) || $book->user->id === Auth::user()->id)
    <episode-screen :episode-count='@json($book->episodes()->count())' :episode='@json($episode)'
      :lang='@json(Auth::user()->lang)' :book='@json($book)' :comments='@json($comments)'
      :comment-counts='@json(count($comments) ?? 0)'>

      <template #comments>
        @isset($comments)
          @if (count((array) $comments))
            @foreach ($comments as $comment)
              @if ($episode->number === $comment->episode_number)
              @empty($comment->parent_id)
                <div id="{{ $book->title }}-{{ $episode->number }}-comment-{{ $comment->id }}">
                  <div class="mb-2 pt-2 px-2 pb-2">
                    @include('books.episode.tab.3.comment')
                  </div>
                  @include('books.episode.tab.3.commentList')
                </div>
              @endempty
            @endif
          @endforeach
        @endif
      @endisset
    </template>

    <template #add-comments>
      @isset($episode)
        <div class="flex justify-between items-center">
          <comment-post-modal>
            <template #btn-trigger>
              <span class="p-2 text-eee">{{ __('コメントをする') }}</span>
            </template>
            <template #header>{{ __('応援コメントを投稿する') }}</template>
            <form method="POST"
              action="{{ route('book.episode.comment.store', [
                  'lang' => app()->getLocale(),
                  'book_id' => $book->id,
                  'episode_id' => $episode->id,
                  'episode_number' => $episode->number,
              ]) }}">
              @csrf
              <textarea class="dark:bg-dark-1 w-full h-[250px] rounded-[5px]"
                placeholder="{{ __('ここは作品への応援コメントを投稿できる場所です！') }} &#10;&#10; {{ __('作品内容と関係がないコメント、作品や作家を中傷するようなコメント、ネタバレやその他不適切なコメントは投稿しないでね！') }}&#10;&#10; {{ __('不適切なコメントを見つけた場合は通報をお願いいたします！') }}&#10;&#10; {{ __('ひどい場合は、断りなくコメントの削除やアカウントを凍結させていただく場合があります。') }}"
                autocomplete="off" autofocus="on" type="text" name="comment" maxlength="400" required></textarea>

              <button type="submit" class="btn-primary py-4 w-full">{{ __('投稿する') }}</button>
            </form>
          </comment-post-modal>
        </div>
      @endisset
    </template>

  </episode-screen>
@endif

{{-- 有料の場合 --}}
@if (
    !$episode->isBoughtBy(Auth::user()) &&
        !$episode->is_free &&
        $book->user->stripe_user_id &&
        $book->user->id !== Auth::user()->id)
  <div class="w-full h-[70vh] bg-f8 flex flex-col items-center justify-center px-8">
    <div class="text-3xl mt-4 tracking-widest">
      {{ $book->title }} {{ $episode->number }}{{ __('話') }}</div>
    <div class="my-8">
      作者にスーパーエールを送って作品を読もう！
    </div>

    <div class="">
      <form method="POST"
        action="{{ route('stripe.payment.create', ['lang' => app()->getLocale(), 'book_id' => $book->id, 'episode_id' => $episode->id, 'payment' => true]) }}"
        class="whitespace-pre-line" onsubmit="submit_btn()">
        @csrf
        @method('POST')
        {{-- 料金変更 --}}
        <change-payment-price></change-payment-price>

        <div class="relative mt-12">
          <button type="submit" class="submit_btn2 btn-primary lg:py-4 w-full">
            {{ __('スーパーエールでエピソードを読む') }}
            <span class="load loading"></span>
          </button>
        </div>
      </form>

      <div class="text-[11px] mt-4">
        50エールから応援することができます。(1エール = 1円)
      </div>

    </div>
  </div>
@endif

<div class="hidden lg:block w-full mt-8 lg:mt-auto h-full bg-white dark:bg-dark">
  <div class="max-w-7xl mx-auto md:py-8 flex flex-col md:flex-row justify-between">
    {{-- 左サイドバー --}}
    <div>
      @include('books.atoms.leftSidebar', [
          'sns_title' => $episode->number . __('話') . ' - ' . $book->title,
      ])
    </div>

    <div class="w-full flex py-8">

      {{-- メインコンテンツ --}}
      <div class="px-4 md:px-6 w-full lg:w-2/3">
        <div class="w-full max-h-[600px] overflow-y-auto scroll-none">
          @if (Auth::id() !== $book->user_id && $book->is_hidden)
            <div class="bg-primary bg-opacity-10 text-primary px-4 py-2 font-semibold">
              {{ __('この作品は現在非公開になっています') }}
            </div>
          @else
            @if (Auth::id() === $book->user_id && !$book->is_complete && !$book->is_suspend)
              <episode-list @if (Session::has('store')) :store='true' @endif>
                <template #trigger>
                  <div
                    class="tracking-widest w-full flex justify-center py-4 mb-2 cursor-pointer hover:bg-f5 dark:hover:bg-dark-1 rounded-[5px] border-dotted border-2 dark:border-4 border-ccc hover:border-aaa dark:border-dark-1">
                    {{ __('作品のエピソードを追加する') }}
                  </div>
                </template>
                <template #header>{{ __('作品のエピソードを追加する') }}</template>
                <form method="POST"
                  action="{{ route('book.episode.store', ['lang' => app()->getLocale(), 'book_id' => $book->id]) }}"
                  enctype="multipart/form-data" onsubmit="submit_btn()">
                  @csrf

                  <div class="-mt-4">
                    @include('atoms._error_card_list')
                    @include('atoms.success')
                  </div>

                  @include('books.episode.tab.1.episode_form', ['update' => false])
                  <div class="relative mt-4">
                    <button type="submit" class="submit_btn2 btn-primary lg:py-4 w-full">
                      {{ __('追加する') }}
                      <span class="load loading"></span>
                    </button>
                  </div>
                </form>
              </episode-list>
            @endif
            @foreach ($episodes_latest as $e)
              <div
                class="my-2 py-2 border-b border-ddd dark:border-dark-1 flex justify-between w-full overflow-hidden rounded-[5px] dark:hover:bg-dark-1 hover:bg-f5">
                <a @if (Auth::id() === $book->user_id || !$e->is_hidden) href="{{ route('book.episode.show', ['lang' => app()->getLocale(), 'book_id' => $book->id, 'episode_number' => $e->number]) }}" @endif
                  class="flex items-center w-full {{ Auth::id() === $book->user_id || !$e->is_hidden ?? 'cursor-pointer' }}">
                  @empty($e->thumbnail)
                    <img src="/img/noimage.svg" alt="thumbnail" class="block dark:hidden w-[160px] h-[80px] object-cover">
                    <img src="/img/noimage-dark.svg" alt="thumbnail"
                      class="hidden dark:block w-[160px] h-[80px] object-cover">
                  @else
                    <img src="{{ $e->thumbnail }}" alt="" class="w-[160px] h-[80px] object-cover">
                  @endempty

                  {{-- タイトル --}}
                  <div class="w-full h-full flex flex-col justify-around lg:justify-center pl-4 overflow-hidden">
                    {{-- 日付 --}}
                    <div class="text-666 text-xs hidden lg:block lg:mb-1">
                      {{ $e->created_at->format('Y/m/d') }}
                    </div>

                    <div class="w-full flex justify-between items-end">
                      {{-- 話数 --}}
                      <div class="flex flex-col">
                        <div class="mr-2 flex flex-col lg:flex-row lg:items-center">
                          <div>{{ __('第') }}{{ $e->number }}{{ __('話') }}</div>
                          @isset($e->title)
                            <div class="lg:ml-4 truncate text-sm">
                              {{ $e->title }}</div>
                          @endisset
                        </div>

                        <div class="flex items-center mt-1">

                          {{-- 値段 --}}
                          @if (!$e->is_hidden && $e->is_free && !$e->isReadBy(Auth::user()) && !$e->isBoughtBy(Auth::user()))
                            <div
                              class="mr-2 tracking-widest inline-block text-xs bg-[#E50111] dark:bg-opacity-50 dark:text-ccc text-white py-0.5 px-1.5 rounded-[5px]">
                              {{ __('無料') }}
                            </div>
                          @endif

                          @if (!$e->is_free && !$e->isBoughtBy(Auth::user()))
                            <div
                              class="mr-2 tracking-widest inline-block text-xs bg-eee dark:bg-primary dark:text-white py-0.5 px-1.5 rounded-[5px]">
                              {{ $e->price }}{{ __('エール') }}
                            </div>
                          @else
                          @endif

                          {{-- 非公開 --}}
                          @if ($e->is_hidden)
                            <div
                              class="mr-2 inline-block text-xs text-tahiti border border-tahiti py-0.5 px-1.5 rounded-[5px] whitespace-nowrap">
                              {{ __('非公開') }}
                            </div>
                          @endif


                          {{-- 閲覧回数 --}}
                          <div class="mr-2 text-666 dark:text-ddd">
                            {{ number_format($e->views) }} <span class="text-xs">{{ __('回') }}</span>
                          </div>

                          {{-- 既読 --}}
                          @auth
                            @if ($book->user->id !== Auth::user()->id)
                              @if ($e->isReadBy(Auth::user()))
                                <span class="inline-block text-xs text-666 dark:text-ddd mr-2">
                                  {{ __('既読') }}
                                </span>
                              @else
                                <span class="inline-block text-xs text-666 dark:text-ddd mr-2">
                                  {{ __('未読') }}
                                </span>
                              @endif
                            @endif
                          @endauth

                          {{-- 購入済 --}}
                          @if (!$e->is_hidden)
                            @if (!$e->is_free)
                              @auth
                                @if ($book->user->id !== Auth::user()->id && $e->isBoughtBy(Auth::user()))
                                  <span class="inline-block text-xs text-666 dark:text-ddd mr-2">
                                    {{ __('購入済') }}
                                  </span>
                                @endif
                              @endauth
                            @endif
                          @endif
                        </div>
                      </div>
                    </div>
                  </div>
                </a>

                {{-- 作者欄 --}}
                @if (Auth::id() === $book->user_id)
                  <episode-list>
                    <template #trigger>
                      <div class="lg:mr-2 p-2 rounded hover:bg-eee dark:hover:bg-dark-1">
                        <svg class="w-[20px] h-[20px] stroke-666 dark:stroke-ddd" viewBox="0 0 24 24" fill="none">
                          <path
                            d="M13.2601 3.59997L5.0501 12.29C4.7401 12.62 4.4401 13.27 4.3801 13.72L4.0101 16.96C3.8801 18.13 4.7201 18.93 5.8801 18.73L9.1001 18.18C9.5501 18.1 10.1801 17.77 10.4901 17.43L18.7001 8.73997C20.1201 7.23997 20.7601 5.52997 18.5501 3.43997C16.3501 1.36997 14.6801 2.09997 13.2601 3.59997Z"
                            stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                          <path d="M11.8899 5.05005C12.3199 7.81005 14.5599 9.92005 17.3399 10.2" stroke-width="1.5"
                            stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                          <path d="M3 22H21" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                            stroke-linejoin="round" />
                        </svg>
                      </div>
                    </template>
                    <template #header>{{ __('エピソードを更新する') }}</template>
                    <form method="POST"
                      action="{{ route('book.episode.update', ['lang' => app()->getLocale(), 'book_id' => $book->id, 'episode_id' => $e->id]) }}"
                      enctype="multipart/form-data" class="whitespace-pre-line" onsubmit="submit_btn()">
                      @csrf
                      @method('PATCH')
                      @include('books.episode.tab.1.episode_form', ['update' => true])
                      <div class="relative mt-4">
                        <button type="submit" class="submit_btn2 btn-primary lg:py-4 w-full">
                          {{ __('更新する') }}
                          <span class="load loading"></span>
                        </button>
                      </div>
                    </form>
                  </episode-list>
                @endif
              </div>
            @endforeach
          @endif
        </div>
      </div>


      {{-- 右サイドバー --}}
      <div class="mg:pl-4 lg:w-1/3">
        <div class="">
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
                  <a href="{{ route('ranking.boys', app()->getLocale()) }}"
                    class="hover:text-primary">{{ __('少年') }}</a>
                @elseif($book->genre_id === 2)
                  <a href="{{ route('ranking.youth', app()->getLocale()) }}"
                    class="hover:text-primary">{{ __('青年') }}</a>
                @elseif($book->genre_id === 3)
                  <a href="{{ route('ranking.girls', app()->getLocale()) }}"
                    class="hover:text-primary">{{ __('少女') }}</a>
                @elseif($book->genre_id === 4)
                  <a href="{{ route('ranking.woman', app()->getLocale()) }}"
                    class="hover:text-primary">{{ __('女性') }}</a>
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
      </div>
    </div>
  </div>
</div>

<div class="hidden lg:block">
  @include('atoms._footer')
</div>
@endsection
