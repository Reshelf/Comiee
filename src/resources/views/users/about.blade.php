@extends('app')

@section('title', $user->name)

@section('content')
    @include('_patials._nav')
    <div class="">
        @include('users._patials.user')
    </div>
    <div class="flex max-w-lg w-full mx-auto px-8 md:px-0 justify-center">
        <div class="py-8 w-full">
            @include('users._patials.tabs', [
                'hasBooks' => false,
                'hasLikes' => false,
                'about' => true,
            ])

            <div class="bg-white dark:bg-dark-2 rounded p-6">

                {{-- 自己紹介 --}}
                <div class="">
                    <p class="text-gray text-xs font-semibold mb-2 flex items-center">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        <span class="pl-2">About</span>
                    </p>
                    <div class="card-body p-0">
                        @if (!empty($user->body))
                            {!! nl2br(e(Markdown::parse($user->body))) !!}
                        @endif
                    </div>
                </div>

                {{-- リンク --}}
                <div class="">
                    <p class="text-gray text-xs font-semibold mb-1 flex items-center">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                        </svg>
                        <span class="pl-2">Link</span>
                    </p>
                    <a class="text-sm leading-2 flex items-center text-primary"
                        href="{{ $user->website }}">{{ $user->website }}</a>
                </div>

            </div>
        </div>
    </div>
@endsection
