<book-edit-modal>
    <template #trigger>ログイン</template>
    <template #header>ログイン</template>

    <form method="POST" action="{{ route('login') }}" class="dark:bg-dark-1">
        @csrf

        <div class="w-full mb-3">
            <input
                class="w-full text-[15px] px-2 py-3 rounded-[3px] border border-l-0 border-r-0 border-t-0 border-b-ccc dark:border-b-dark dark:bg-dark-2"
                type="text" name="email" required placeholder="メールアドレス">
        </div>
        <div class="w-full mb-6">
            <input
                class="w-full text-[15px] px-2 py-3 rounded-[3px] border border-l-0 border-r-0 border-t-0 border-b-ccc dark:border-b-dark dark:bg-dark-2"
                type="password" name="password" required placeholder="パスワード">
        </div>
        <input type="hidden" name="remember" value="on">
        <button type="submit" class="btn-primary px-6 py-4 w-full mb-4">ログイン</button>
    </form>
    <div class="w-full flex justify-between">
        <a href="{{ route('password.request') }}" class="cursor-pointer text-xs">パスワードを忘れた方</a>
        <a href="/register" class="text-xs cursor-pointer">または新規登録</a>
    </div>
</book-edit-modal>
