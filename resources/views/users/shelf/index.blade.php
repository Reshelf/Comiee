@extends('app')

@section('title', __('本棚'))

@section('content')
  @include('atoms._nav', ['tab' => 3])

  <div class="mx-4 lg:mx-0">
    @include('atoms._error_card_list')
    @include('atoms.success')
  </div>

  <div class="flex max-w-6xl w-full mx-auto px-6 md:px-0 justify-center mb-8">
    <div class="w-full lg:mt-4 lg:mx-12">
      <h3 class="text-2xl font-semibold py-4 block lg:hidden">{{ __('本棚') }}</h3>
      <div class="w-full lg:my-4 flex">
        <div class="setting-tab">
          <ul class="tabMenu scroll-none sticky top-0 lg:h-[300px]">
            <h3 class="text-2xl font-semibold py-4 lg:pt-0 hidden lg:block">{{ __('本棚') }}</h3>
            <a href="{{ route('user.shelf.like', ['lang' => app()->getLocale()]) }}"
              class="{{ $type === 'like' ? 'font-bold text-primary' : '' }} ">{{ __('お気に入り') }}</a>
            <a href="{{ route('user.shelf.view', ['lang' => app()->getLocale()]) }}"
              class="{{ $type === 'view_history' ? 'font-bold text-primary' : '' }} ">{{ __('閲覧履歴') }}</a>
            <a href="{{ route('user.shelf.purchase', ['lang' => app()->getLocale()]) }}"
              class="{{ $type === 'purchase_history' ? 'font-bold text-primary' : '' }} ">{{ __('購入履歴') }}</a>
          </ul>

          <div class="tabContents">
            {{-- ランキング --}}
            <div class="w-full flex flex-col mb-4">
              <div class="w-full max-w-8xl mx-auto mb-4">
                <div class="w-full flex flex-col">
                  @if ($type == 'like')
                    @isset($books)
                      <div class="inline-block border-b border-ddd dark:border-dark-1 pb-2">
                        @include('search.atoms._filter')
                        <form class="acd-content" method="POST" action="{{ route('like.search', app()->getLocale()) }}">
                          @csrf
                          @include('users.shelf._form', [
                              'feature' => $feature,
                          ])
                        </form>
                      </div>
                    @endisset
                  @endif
                </div>
              </div>

              @include('search.atoms._content')
            </div>

            <div class="w-full flex justify-center mt-8">{{ $books->appends(Request::except('page'))->links() }}</div>

          </div>
        </div>
      </div>
    </div>
  </div>
  @include('atoms._footer')
@endsection
