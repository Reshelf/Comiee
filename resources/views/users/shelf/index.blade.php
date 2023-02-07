@extends('app')

@section('title', __('本棚'))

@section('content')
  @include('atoms._nav', ['tab' => 3])

  <div class="mx-4 lg:mx-0">
    @include('atoms._error_card_list')
    @include('atoms.success')
  </div>

  <div class="flex max-w-6xl w-full mx-auto px-6 md:px-0 justify-center mb-8">
    <div class="w-full lg:mt-4 mx-12">
      <div class="w-full lg:my-4 flex">
        <div class="setting-tab">

          @include('users.shelf._tabs', ['type' => $type])

          <div class="tabContents">
            {{-- ランキング --}}
            <div class="w-full flex flex-col mb-4">
              <div class="w-full max-w-8xl mx-auto mb-4">
                <div class="w-full flex flex-col">
                  @include('search.atoms._term_tabs', [
                      'ranking' => false,
                      'todays_new' => false,
                      'like' => true,
                      'following' => false,
                  ])

                  {{-- フィルター --}}
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
