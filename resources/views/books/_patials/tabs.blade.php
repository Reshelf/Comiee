<div class="w-full flex flex-col items-start justify-center p-2 mb-4 tracking-widest">
    <h3 class="font-semibold mb-2">Starbooksを楽しもう</h3>
    <a href="{{ route('others.user_guide') }}"
        class="w-full h-full flex items-center px-3 py-2 rounded text-xs hover:text-primary" aria-current="page">
        ご利用ガイド
    </a>
    <a href="/" class="w-full h-full flex items-center px-3 py-2 rounded text-xs hover:text-primary"
        aria-current="page">
        よくあるご質問
    </a>

    @auth
        <comment-post-modal>
            <template #btn-trigger>
                <span class="w-full h-full flex items-center px-3 py-2 rounded text-xs hover:text-primary"
                    aria-current="page">
                    お問い合わせ
                </span>
            </template>
            <template #header>運営へのお問い合せ</template>
            <form method="POST" action="{{ route('others.contact', ['user' => Auth::user()]) }}">
                @csrf
                <input value="{{ Auth::id() }}" type="hidden" name="user_id" />
                <textarea class="dark:bg-dark-1 p-4 w-full h-[250px] rounded-[3px]" placeholder="お問い合せ内容を記入してください。" autocomplete="off"
                    autofocus="on" type="text" name="body" maxlength="400" required></textarea>
                <button onclick="this.disabled='disabled'; this.form.submit();" type="submit"
                    class="btn w-full">送信する</button>
            </form>
        </comment-post-modal>
    @endauth
</div>
<div class="w-full flex flex-col items-start justify-center p-2 mb-4 tracking-widest">
    <genre-search class="mb-4">
        <template #trigger>ジャンルから探す</template>
    </genre-search>
    <tag-search-modal>
        <template #trigger>タグからさがす</template>
    </tag-search-modal>
</div>
