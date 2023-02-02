<div class="max-w-6xl mx-auto">
  <div class="relative z-auto">
    @empty($user->thumbnail)
      <img src="/img/bg.svg" alt="" class="dark:hidden h-[100px] lg:h-[250px] rounded-b flex w-full object-cover">
      <img src="/img/bg-dark.svg" alt="" class="hidden dark:flex h-[100px] lg:h-[250px] rounded w-full object-cover">
    @else
      <thumbnail-zoom :thumbnail='@json($user->thumbnail)'>
        <template #thumbnail>
          <img class="profile-img" src="{{ $user->thumbnail }}" alt="profile_thumbnail">
        </template>
      </thumbnail-zoom>
    @endempty
    @if (Auth::id() === $user->id)
      <edit-user-modal>
        <template #trigger>
          <div class="hidden md:block btn-sub dark:bg-dark bg-white dark:bg-opacity-80 dark:text-ddd">
            {{ __('プロフィールを編集') }}</div>
          <div
            class="block md:hidden bg-white dark:bg-dark dark:bg-opacity-80 dark:stroke-ddd stroke-333 p-2 rounded-full">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
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
        <template #header>{{ __('プロフィールの更新') }}</template>
        <form method="POST"
          action="{{ route('users.update', ['lang' => app()->getLocale(), 'username' => $user->username]) }}"
          enctype="multipart/form-data" onsubmit="submit_btn()">
          @csrf
          @method('PATCH')
          @include('users.atoms.form')
          <div class="relative">
            <button type="submit" class="submit_btn2 btn-primary w-full py-4">
              {{ __('更新する') }}
              <span class="load loading"></span>
            </button>
          </div>
        </form>
      </edit-user-modal>
    @endif
  </div>
  <div
    class="flex flex-col lg:items-center md:flex-row mx-6 md:mx-12 pb-4 border-b dark:border-b-2 border-ccc dark:border-dark-1">
    <div class="flex justify-between items-center">
      <div class="text-dark z-10 -mt-12 md:-mt-8">
        @empty($user->avatar)
          <svg class="avatar" viewBox="0 0 42 42" fill="none">
            <rect width="42" height="42" rx="21" class="dark:fill-dark-1 fill-eee" />
            <path class="stroke-white dark:stroke-ccc"
              d="M21 21C23.7614 21 26 18.7614 26 16C26 13.2386 23.7614 11 21 11C18.2386 11 16 13.2386 16 16C16 18.7614 18.2386 21 21 21Z"
              stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M29.5901 31C29.5901 27.13 25.7402 24 21.0002 24C16.2602 24 12.4102 27.13 12.4102 31"
              class="stroke-white dark:stroke-ccc" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
        @else
          <img src="{{ $user->avatar }}" alt="avatar" class="avatar">
        @endempty
      </div>
      <div class="block lg:hidden">
        {{-- SNSシェア --}}
        <div class="lg:mt-4 flex items-center">
          @include('atoms.sns', ['sns_title' => $user->name . __('のプロフィール')])
        </div>
      </div>
    </div>
    <div class="w-full md:px-6 flex justify-between md:mt-2">
      <div class="w-full flex flex-col">
        <div class="flex items-center justify-start">
          <h3 class="font-semibold pr-2 tracking-widest text-2xl md:text-[30px] dark:text-ddd">
            {{ $user->name }}</h3>
          <div class="h-full flex items-center text-primary dark:text-white">
            <svg class="h-5 w-5 md:h-7 md:w-7" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd"
                d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                clip-rule="evenodd" />
            </svg>
          </div>
        </div>

        <div class="text-left mt-1 lg:text-[15px] text-t-color-3">
          <span>@</span>{{ $user->username }}
        </div>

        @isset($user->body)
          <div class="my-2 md:hidden">
            {{ $user->body }}
          </div>
        @endisset

        <div class="flex justify-start items-center text-sm pt-2">
          <a href="{{ route('users.followings', ['lang' => app()->getLocale(), 'username' => $user->username]) }}"
            class="">
            <span class="font-semibold lg:text-lg">{{ number_format($user->count_followings) }}</span>
            <span class="text-t-color-3 pl-1 text-xs lg:text-[14px]">{{ __('フォロー') }}</span>
          </a>
          <a href="{{ route('users.followers', ['lang' => app()->getLocale(), 'username' => $user->username]) }}"
            class="ml-2">
            <span class="font-semibold lg:text-lg">{{ number_format($user->count_followers) }}</span>
            <span class="text-t-color-3 pl-1 text-xs lg:text-[14px]">{{ __('フォロワー') }}</span>
          </a>
          @if (Auth::id() !== $user->id)
            <follow-button class="ml-auto block md:hidden" :initial-is-followed-by='@json($user->isFollowedBy(Auth::user()))'
              :authorized='@json(Auth::check())'
              endpoint="{{ route('users.follow', ['lang' => app()->getLocale(), 'username' => $user->username]) }}">
            </follow-button>
          @endif
        </div>
      </div>
      @if (Auth::id() !== $user->id)
        <follow-button class="ml-auto hidden md:block" :initial-is-followed-by='@json($user->isFollowedBy(Auth::user()))'
          :authorized='@json(Auth::check())'
          endpoint="{{ route('users.follow', ['lang' => app()->getLocale(), 'username' => $user->username]) }}">
        </follow-button>
      @endif
    </div>
  </div>

  <div class="bg-white dark:bg-dark w-full lg:z-20">
    <div class="max-w-8xl mx-4 md:mx-12 flex justify-between">
      <div class="relative flex items-center">
        <a href="{{ route('users.show', ['lang' => app()->getLocale(), 'username' => $user->username]) }}"
          class="{{ $mypage ? 'border-primary text-primary dark:text-ddd font-bold' : 'border-transparent hover:text-primary dark:hover:text-light hover:font-semibold  dark:border-dark' }} py-3 px-3 lg:px-6 border-b-2 tracking-widest">{{ __('投稿作品') }}</a>
        @if (Auth::id() === $user->id)
          <a href="{{ route('users.settings', ['lang' => app()->getLocale(), 'username' => $user->username]) }}"
            class="{{ $settings ? 'border-primary text-primary dark:text-ddd font-bold' : 'border-transparent hover:text-primary dark:hover:text-light hover:font-semibold  dark:border-dark' }} py-3 px-3 lg:px-6 border-b-2 tracking-widest">{{ __('本棚') }}</a>
          <a href="{{ route('users.settings', ['lang' => app()->getLocale(), 'username' => $user->username]) }}"
            class="{{ $settings ? 'border-primary text-primary dark:text-ddd font-bold' : 'border-transparent hover:text-primary dark:hover:text-light hover:font-semibold  dark:border-dark' }} py-3 px-3 lg:px-6 border-b-2 tracking-widest">{{ __('設定') }}</a>
        @endif
        <a href="{{ route('users.show', ['lang' => app()->getLocale(), 'username' => $user->username]) }}"
          class="{{ !$mypage ? 'border-primary text-primary dark:text-ddd font-bold' : 'border-transparent hover:text-primary dark:hover:text-light hover:font-semibold  dark:border-dark' }} py-3 px-3 lg:px-6 border-b-2 tracking-widest">{{ __('概要') }}</a>
      </div>

      <div class="hidden lg:block">
        {{-- SNSシェア --}}
        <div class="lg:mt-4 flex items-center">
          @include('atoms.sns', ['sns_title' => $user->name . __('のプロフィール')])
        </div>
      </div>
    </div>
  </div>
</div>
