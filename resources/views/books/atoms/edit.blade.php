{{-- 作者だったら --}}
<div class="mt-6 px-2 w-full">
    <book-edit-modal>
        <template #trigger>作品の設定を編集する</template>
        <template #header>作品の設定を編集する</template>

        {{-- エラー文 --}}
        @include('atoms._error_card_list')
        @include('atoms.success')


        {{-- HTMLのformタグは、PUTメソッドやPATCHメソッドをサポートしていない(DELETEメソッドもサポートしていない) --}}
        <form method="POST" enctype="multipart/form-data"
            action="{{ route('book.update', ['lang' => app()->getLocale(), 'book_id' => $book->id]) }}">
            @csrf
            {{-- LaravelのBladeでPATCHメソッド等を使う場合は、formタグではmethod属性を"POST"のままとしつつ、@methodでPATCHメソッド等を指定する --}}
            @method('PATCH')
            @include('books.atoms.form', ['update' => true])
            <div class="w-full flex justify-end"><button type="submit" class="btn-primary w-full py-4">更新する</button></div>
        </form>
    </book-edit-modal>
</div>
