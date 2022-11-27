<div class="max-w-6xl mx-auto">
    <div class="relative z-auto">
        @empty($user->thumbnail)
            <img src="/img/bg.svg" alt=""
                class="dark:hidden h-[250px] lg:h-[300px] rounded-b flex w-full object-cover">
            <img src="/img/bg-dark.svg" alt=""
                class="hidden dark:flex h-[250px] lg:h-[300px] rounded w-full object-cover">
        @else
            <thumbnail-zoom :thumbnail='@json($user->thumbnail)'>
                <template #thumbnail>
                    <img class="profile-img" src="{{ $user->thumbnail }}" alt="profile_thumbnail">
                </template>
            </thumbnail-zoom>
        @endempty
        @if (Auth::id() === $user->id)
            <edit-user-modal>
                <template #trigger>プロフィールを編集</template>
                <template #header>プロフィールの更新</template>
                <form method="POST" action="{{ route('users.update', ['username' => $user->username]) }}"
                    enctype="multipart/form-data">
                    @csrf
                    {{-- LaravelのBladeでPATCHメソッド等を使う場合は、formタグではmethod属性を"POST"のままとしつつ、@methodでPATCHメソッド等を指定する --}}
                    @method('PATCH')
                    @include('users.atoms.form')
                    <button type="submit" class="btn-primary w-full py-4">更新する</button>
                </form>
            </edit-user-modal>
        @endif
    </div>
    <div
        class="flex flex-col items-center md:flex-row mx-6 md:mx-12 pb-4 border-b dark:border-b-2 border-ccc dark:border-dark-1">
        <div class="text-dark z-10 -mt-20 md:-mt-8">
            @empty($user->avatar)
                <svg class="avatar" viewBox="0 0 42 42" fill="none">
                    <rect width="42" height="42" rx="21" class="dark:fill-dark-1 fill-eee" />
                    <path class="stroke-white dark:stroke-ccc"
                        d="M21 21C23.7614 21 26 18.7614 26 16C26 13.2386 23.7614 11 21 11C18.2386 11 16 13.2386 16 16C16 18.7614 18.2386 21 21 21Z"
                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M29.5901 31C29.5901 27.13 25.7402 24 21.0002 24C16.2602 24 12.4102 27.13 12.4102 31"
                        class="stroke-white dark:stroke-ccc" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            @else
                <img src="{{ $user->avatar }}" alt="avatar" class="avatar">
            @endempty
        </div>
        <div class="w-full md:px-6 flex justify-between md:mt-4">
            <div class="w-full flex flex-col">
                <div class="flex items-center justify-center md:justify-start">
                    <h3 class="font-semibold pr-2 tracking-widest" style="font-size: 32px;">{{ $user->name }}</h3>
                    <div class="h-full flex items-center text-primary">
                        <svg class="h-7 w-7" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
                <div class="-mt-1 text-[13px] text-center md:text-left md:text-lg text-t-color-3">
                    <span>@</span>{{ $user->username }}
                </div>

                <div class="flex justify-center md:justify-start items-center text-sm pt-4 md:pt-2">
                    <a href="{{ route('users.followings', ['username' => $user->username]) }}" class="">
                        <span class="font-semibold text-lg">{{ number_format($user->count_followings) }}</span>
                        <span class="text-t-color-3 pl-1">フォロー</span>
                    </a>
                    {{-- <follow-modal :auth-user='@json(Auth::user())' :authorized='@json(Auth::check())'
            :initial-is-followed-by='@json($user->isFollowedBy(Auth::user()))'
            endpoint="{{ route('users.followings', ['username' => $user->username]) }}">
          </follow-modal> --}}
                    {{-- フォロワー --}}
                    <a href="{{ route('users.followers', ['username' => $user->username]) }}" class="ml-2">
                        <span class="font-semibold text-lg">{{ number_format($user->count_followers) }}</span>
                        <span class="text-t-color-3 pl-1">フォロワー</span>
                    </a>
                    @if (Auth::id() !== $user->id)
                        <follow-button class="ml-auto block md:hidden"
                            :initial-is-followed-by='@json($user->isFollowedBy(Auth::user()))'
                            :authorized='@json(Auth::check())'
                            endpoint="{{ route('users.follow', ['username' => $user->username]) }}">
                        </follow-button>
                    @endif
                </div>
            </div>
            @if (Auth::id() !== $user->id)
                <follow-button class="ml-auto hidden md:block" :initial-is-followed-by='@json($user->isFollowedBy(Auth::user()))'
                    :authorized='@json(Auth::check())'
                    endpoint="{{ route('users.follow', ['username' => $user->username]) }}">
                </follow-button>
            @endif
        </div>
    </div>

    <div class="bg-white dark:bg-dark w-full lg:z-20">
        <div class="max-w-8xl mx-4 md:mx-12 flex justify-between">
            <div class="relative flex items-center">
                @if ($mypage)
                    <a href="{{ route('users.show', ['username' => $user->username]) }}"
                        class="{{ $mypage ? 'border-primary text-primary font-bold' : 'border-transparent hover:text-primary hover:font-semibold  dark:border-dark' }} py-3 px-6 border-b-2 text-xs lg:text-[14px]">投稿作品</a>
                    @if (Auth::id() === $user->id)
                        <a href="{{ route('users.settings', ['username' => $user->username]) }}"
                            class="{{ $settings ? 'border-primary text-primary font-bold' : 'border-transparent hover:text-primary hover:font-semibold  dark:border-dark' }} py-3 px-6 border-b-2 text-xs lg:text-[14px]">設定</a>
                    @endif
                @else
                    @if (Auth::id() === $user->id)
                        <a href="{{ route('users.settings', ['username' => $user->username]) }}"
                            class="{{ $settings ? 'border-primary text-primary font-bold' : 'border-transparent hover:text-primary hover:font-semibold  dark:border-dark' }} py-3 px-6 border-b-2 text-xs lg:text-[14px]">設定</a>
                    @endif
                    <a href="{{ route('users.show', ['username' => $user->username]) }}"
                        class="{{ $mypage ? 'border-primary text-primary font-bold' : 'border-transparent hover:text-primary hover:font-semibold  dark:border-dark' }} py-3 px-6 border-b-2 text-xs lg:text-[14px]">投稿作品</a>
                @endif

            </div>

            {{-- SNSシェア --}}
            <div class="lg:mt-4 flex items-center">
                @include('atoms.sns', ['sns_title' => $user->name . 'のプロフィール'])
            </div>
        </div>
    </div>
</div>
