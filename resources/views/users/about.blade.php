@extends('app')

@section('title', $user->name)

@include('users.atoms.meta')

@section('content')
  @include('atoms._nav', ['tab' => 4])

  <div class="mx-4 lg:mx-0">
    @include('atoms._error_card_list')
    @include('atoms.success')
  </div>

  <div class="bg-white dark:bg-dark">
    @include('users.atoms.user', [
        'work' => false,
        'about' => true,
    ])
  </div>
  <div class="flex max-w-6xl w-full mx-auto mt-4 px-6 md:px-0 justify-center mb-8">
    <div class="w-full md:mx-12">
      <div class="w-full flex flex-col lg:flex-row py-4 lg:p-8">
        {{-- 左側 --}}
        <div class="w-full lg:w-3/4 lg:pr-20">
          <div class="pb-4 mb-8 border-b border-[#dadce0] dark:border-dark-1">
            <h3 class="font-semibold lg:text-[16px] dark:text-ddd">{{ __('説明') }}</h3>
            <div class="py-4">
              @empty($user->body)
                {{ __('自己紹介はありません。') }}
              @else
                {{ $user->body }}
              @endempty
            </div>
          </div>
          <div class="pb-4 mb-8 border-b border-[#dadce0] dark:border-dark-1">
            <h3 class="font-semibold lg:text-[16px] dark:text-ddd">{{ __('リンク') }}</h3>
            <div class="p-6 flex flex-col lg:flex-row flex-wrap w-full tracking-widest">
              @empty(!$user->website)
                <div class="lg:w-1/3 mb-8">
                  <a href="{{ $user->website }}" target="_blank" rel="noopener noreferrer"
                    class="dark:hover:text-ddd hover:text-primary">{{ __('ウェブサイト') }}</a>
                </div>
              @endempty
              @empty(!$user->twitter)
                <div class="lg:w-1/3 mb-8">
                  <a href="{{ $user->twitter }}" target="_blank" rel="noopener noreferrer"
                    class="dark:hover:text-ddd hover:text-[#1C9BEF]">{{ __('Twitter') }}</a>
                </div>
              @endempty
              @empty(!$user->youtube)
                <div class="lg:w-1/3 mb-8">
                  <a href="{{ $user->youtube }}" target="_blank" rel="noopener noreferrer"
                    class="dark:hover:text-ddd hover:text-[#FF0000]">{{ __('Youtube') }}</a>
                </div>
              @endempty
              @empty(!$user->instagram)
                <div class="lg:w-1/3">
                  <a href="{{ $user->instagram }}" target="_blank" rel="noopener noreferrer"
                    class="dark:hover:text-ddd hover:text-[#E23764]">{{ __('Instagram') }}</a>
                </div>
              @endempty
            </div>
          </div>
        </div>
        {{-- 右側 --}}
        <div class="w-full lg:w-1/4">
          <h3 class="font-semibold lg:text-[16px] dark:text-ddd">{{ __('統計情報') }}</h3>
          <div class="py-4">{{ $user->created_at->format('Y/m/d') }}{{ __('に登録') }}</div>
        </div>
      </div>
      <div class=""></div>
    </div>
  </div>

  @include('atoms._footer')
@endsection
