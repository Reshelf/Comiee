@auth
  <div class="flex items-center h-full mr-8">
    <create-modal>
      {{-- エラー文 --}}
      @include('atoms._error_card_list')
      @include('atoms.success')


      <form method="POST" action="{{ route('book.store') }}" enctype="multipart/form-data" onsubmit="submit_btn()">
        @include('books.atoms.form', ['update' => false, 'create_book_modal_count' => 12])
        <div class="w-full relative">
          <button type="submit" class="submit_btn btn-primary w-full py-4">
            {{ __('投稿する') }}
            <span class="load loading"></span>
          </button>
        </div>
      </form>
    </create-modal>
  </div>

  @include('atoms.nav.user_modal')
@endauth
