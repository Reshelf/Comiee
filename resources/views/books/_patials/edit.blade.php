{{-- 作者だったら --}}
<div class="mt-6 px-2 w-full">
    <book-edit-modal>
        <template #trigger>作品内容を更新する</template>
        <template #header>作品内容の更新</template>
        @include('_patials._error_card_list')
        {{-- HTMLのformタグは、PUTメソッドやPATCHメソッドをサポートしていない(DELETEメソッドもサポートしていない) --}}
        <form method="POST" enctype="multipart/form-data" action="{{ route('book.update', ['book_id' => $book->id]) }}">
            @csrf
            {{-- LaravelのBladeでPATCHメソッド等を使う場合は、formタグではmethod属性を"POST"のままとしつつ、@methodでPATCHメソッド等を指定する --}}
            @method('PATCH')
            @include('books._patials.form')
            <div class="w-full flex justify-end"><button onclick="this.disabled='disabled'; this.form.submit();"
                    type="submit" class="btn">更新する</button></div>
        </form>
    </book-edit-modal>
</div>
