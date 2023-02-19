{{-- 作者だったら --}}
<div class="mt-6 px-2 w-full">
  <book-edit-modal>
    <template #trigger>{{ __('作品の設定を編集する') }}</template>
    <template #header>{{ __('作品の設定を編集する') }}</template>

    @include('atoms._error_card_list')
    @include('atoms.success')


    <form method="POST" enctype="multipart/form-data"
      action="{{ route('book.update', ['lang' => app()->getLocale(), 'book_id' => $book->id]) }}" onsubmit="submit_btn()">
      @csrf
      @method('PATCH')
      @include('books.atoms.form', ['update' => true, 'create_book_modal_count' => 15])
      <div class="w-full flex justify-end relative">
        <button type="submit" class="submit_btn3 btn-primary w-full lg:py-4">
          {{ __('更新する') }}
          <span class="load loading"></span></button>
      </div>
    </form>
  </book-edit-modal>
</div>
