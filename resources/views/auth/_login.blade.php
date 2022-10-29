<book-edit-modal>
    <template #trigger>ログイン</template>
    <template #header>ログイン</template>

    {{-- エラー文 --}}
    @include('atoms._error_card_list')

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="w-full mb-3">
            <div class="w-full mb-1 text-xs">メールアドレス</div>
            <input class="w-full p-2 rounded-[3px] border border-ccc dark:border-dark dark:bg-dark-2" type="text"
                name="email" required>
        </div>
        <div class="w-full mb-3">
            <div class="w-full mb-1 text-xs">パスワード</div>
            <input class="w-full p-2 rounded-[3px] border border-ccc dark:border-dark dark:bg-dark-2" type="password"
                name="password" required>
        </div>
        <input type="hidden" name="remember" value="on">
        <button type="submit" class=" bg-primary text-white font-semibold rounded px-6 py-4 w-full mb-4">ログイン</button>
    </form>
    <div class="w-full flex justify-between">
        <a href="{{ route('password.request') }}" class="cursor-pointer text-xs">パスワードを忘れた方</a>
        <a href="/register" class="text-xs cursor-pointer">または新規登録</a>
    </div>
</book-edit-modal>
