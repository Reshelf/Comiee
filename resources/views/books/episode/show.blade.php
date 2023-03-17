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
  @if (Auth::check() && ($episode->is_free || $episode->isBoughtBy(Auth::user()) || $book->user->id === Auth::user()->id))
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
              <span class="p-2 text-eee">{{ __('コメントを書く') }}</span>
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
              <textarea class="text-area"
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
@if (Auth::check() &&
        (!$episode->isBoughtBy(Auth::user()) &&
            !$episode->is_free &&
            $book->user->stripe_user_id &&
            $book->user->id !== Auth::user()->id))
  <div class="w-full lg:h-[70vh] bg-f5 dark:bg-dark flex flex-col items-center justify-center px-8">
    <div class="text-3xl mt-12 lg:mt-0 mb-6 lg:mb-8 tracking-widest dark:text-f5">
      {{ $book->title }} {{ $episode->number }}{{ __('話') }}</div>
    <div class="flex flex-col lg:flex-row">
      <div class="lg:mr-4 mb-4">
        <svg class="object-cover w-full max-h-[200px]" viewBox="0 0 560 356" fill="none">
          <title>Super Gift Icon</title>
          <g filter="url(#filter0_d_1106_3573)">
            <rect x="10" width="540" height="336" rx="25" fill="white" />
            <mask id="mask0_1106_3573" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="172" y="83"
              width="217" height="171">
              <path
                d="M206.014 92.2416C214.887 116.643 217.105 142.03 217.105 156.572C183.387 135.276 172.739 155.586 172 168.403C179.394 207.592 217.105 181.712 217.105 181.712C214.887 218.684 210.943 227.557 206.014 243.085C219.028 249.592 252.351 252.698 267.386 253.437C247.865 224.451 265.907 214.247 279.957 212.768C313.97 217.944 302.139 248.261 291.787 253.437C310.717 255.803 342.069 247.522 355.378 243.085C347.688 230.663 344.533 196.747 344.287 181.712C376.822 201.677 388.16 180.973 388.653 168.403C386.286 134.685 358.582 145.48 345.026 155.093C342.069 135.572 350.695 105.058 355.378 92.2416C337.632 82.7769 306.576 82.3825 293.266 83.3684C315.449 107.77 293.266 124.296 279.957 123.298C250.379 121.079 258.513 91.5021 268.126 83.3684C240.027 84.1078 215.133 88.7909 206.014 92.2416Z"
                fill="#D7CCBE" />
            </mask>
            <g mask="url(#mask0_1106_3573)">
              <mask id="mask1_1106_3573" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="155"
                y="69" width="251" height="251">
                <rect x="155" y="69" width="251" height="251" fill="white" />
              </mask>
              <g mask="url(#mask1_1106_3573)">
                <path d="M398.046 130.49L241.647 365.412L160.614 283.053L398.046 130.49Z" fill="#F7D60D" />
                <path d="M320.257 245.194L398.1 283.761L273.104 318.157L320.257 245.194Z" fill="#C13573" />
                <path d="M319.122 246.241L433.937 190.763L434.142 301.294L319.122 246.241Z" fill="#581EB1" />
                <path d="M318.75 247.135L400.374 122.411L452.556 181.449L318.75 247.135Z" fill="#F530D7" />
                <path d="M265.726 147.337L401.853 129.124L191.797 263.081L265.726 147.337Z" fill="#FE9353" />
                <path d="M162.411 159.514L265.39 147.988L195.067 257.855L162.411 159.514Z" fill="#07CAA3" />
                <path d="M348.729 34.4655L457.524 123.76L265.205 147.752L348.729 34.4655Z" fill="#B717FF" />
                <path d="M264.503 149.256L186.926 82.0171L325.794 66.6048L264.503 149.256Z" fill="#3156F4" />
                <path d="M265.299 149.363L129.822 164.4L162.421 59.9408L265.299 149.363Z" fill="#0287FF" />
              </g>
            </g>
          </g>
          <defs>
            <filter id="filter0_d_1106_3573" x="0" y="0" width="560" height="356"
              filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
              <feFlood flood-opacity="0" result="BackgroundImageFix" />
              <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                result="hardAlpha" />
              <feOffset dy="10" />
              <feGaussianBlur stdDeviation="5" />
              <feComposite in2="hardAlpha" operator="out" />
              <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0" />
              <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_1106_3573" />
              <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_1106_3573" result="shape" />
            </filter>
          </defs>
        </svg>

      </div>

      <div class="lg:ml-4 lg:max-w-[400px]">
        <form method="POST"
          action="{{ route('stripe.payment.create', ['lang' => app()->getLocale(), 'book_id' => $book->id, 'episode_id' => $episode->id, 'payment' => true]) }}"
          class="whitespace-pre-line" onsubmit="submit_btn()">
          @csrf
          @method('POST')

          {{-- ギフト選択 --}}
          <div class="payment-radio-box w-full flex flex-wrap justify-between">
            <input type="radio" id="option1" name="price" value="50" class="hidden">
            <label for="option1">
              <div class="box">¥ 50</div>
            </label>
            <input type="radio" id="option2" name="price" value="100" class="hidden" checked>
            <label for="option2">
              <div class="box">¥ 100</div>
            </label>
            <input type="radio" id="option3" name="price" value="250" class="hidden">
            <label for="option3">
              <div class="box">¥ 250</div>
            </label>
            <input type="radio" id="option4" name="price" value="500" class="hidden">
            <label for="option4">
              <div class="box">¥ 500</div>
            </label>
          </div>

          <div class="relative mt-2">
            <button type="submit" class="submit_btn2 btn-primary py-3 lg:py-4 w-full">
              {{ __('スーパーギフトを送ってエピソードを読む') }}
              <span class="load loading"></span>
            </button>
            <a href="{{ route('book.show', ['lang' => app()->getLocale(), 'book_id' => $book->id]) }}"
              class="inline-block text-sm mt-4 lg:hidden">{{ __('作品トップへ') }}</a>
          </div>
        </form>
      </div>
    </div>
  </div>
@endif

@if (!Auth::check())
  <div class="flex flex-col items-center justify-center m-24">
    <p class="text-base">{{ __('エピソードを読むにはログインをしてください') }}</p>
    <p class="flex items-center mt-4">
      <a href="{{ route('login') }}" class="btn-primary">{{ __('ログイン') }}</a>
      <a href="{{ route('book.show', ['lang' => app()->getLocale(), 'book_id' => $book->id]) }}"
        class="btn-border ml-4">{{ __('作品トップ') }}</a>
    </p>
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
        @include('books.atoms.main')
      </div>


      {{-- 右サイドバー --}}
      <div class="mt-8 lg:mt-0 px-6 lg:pr-0 mg:pl-4 lg:w-1/3">
        @include('books.atoms.rightSidebar')
      </div>
    </div>
  </div>
</div>

<div class="hidden lg:block">
  @include('atoms._footer')
</div>
@endsection
