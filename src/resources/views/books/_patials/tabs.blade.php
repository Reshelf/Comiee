<div class="w-full flex flex-col items-start justify-center p-2 mb-4">
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
<div class="w-full flex flex-col items-start justify-center p-2 mb-4">
    <h3 class="mb-4 hover:text-primary cursor-pointer">ジャンルからさがす</h3>
    <tag-search-modal>
        <template #trigger>タグからさがす</template>
    </tag-search-modal>
    {{-- <a href="/" class="w-full h-full flex items-center px-3 py-2 rounded text-xs hover:text-primary"
        aria-current="page">
        恋愛
    </a>
    <a href="/" class="w-full h-full flex items-center px-3 py-2 rounded text-xs hover:text-primary"
        aria-current="page">
        ヒューマンドラマ
    </a>
    <a href="/" class="w-full h-full flex items-center px-3 py-2 rounded text-xs hover:text-primary"
        aria-current="page">
        ギャグ・コメディー
    </a>
    <a href="/" class="w-full h-full flex items-center px-3 py-2 rounded text-xs hover:text-primary"
        aria-current="page">
        職業・ビジネス
    </a>
    <a href="/" class="w-full h-full flex items-center px-3 py-2 rounded text-xs hover:text-primary"
        aria-current="page">
        サスペンス・ヒストリー
    </a>
    <a href="/" class="w-full h-full flex items-center px-3 py-2 rounded text-xs hover:text-primary"
        aria-current="page">
        歴史・時代劇
    </a>
    <a href="/" class="w-full h-full flex items-center px-3 py-2 rounded text-xs hover:text-primary"
        aria-current="page">
        スポーツ
    </a>
    <a href="/" class="w-full h-full flex items-center px-3 py-2 rounded text-xs hover:text-primary"
        aria-current="page">
        動物・ペット
    </a>
    <a href="/" class="w-full h-full flex items-center px-3 py-2 rounded text-xs hover:text-primary"
        aria-current="page">
        アドベンチャー
    </a>
    <a href="/" class="w-full h-full flex items-center px-3 py-2 rounded text-xs hover:text-primary"
        aria-current="page">
        ホラー
    </a>
    <a href="/" class="w-full h-full flex items-center px-3 py-2 rounded text-xs hover:text-primary"
        aria-current="page">
        SF・ファンタジー
    </a>
    <a href="/" class="w-full h-full flex items-center px-3 py-2 rounded text-xs hover:text-primary"
        aria-current="page">
        グルメ
    </a>
    <a href="/" class="w-full h-full flex items-center px-3 py-2 rounded text-xs hover:text-primary"
        aria-current="page">
        医療・病院系
    </a>
    <a href="/" class="w-full h-full flex items-center px-3 py-2 rounded text-xs hover:text-primary"
        aria-current="page">
        裏社会・アングラ
    </a>
    <a href="/" class="w-full h-full flex items-center px-3 py-2 rounded text-xs hover:text-primary"
        aria-current="page">
        ヤンキー・極道・任侠
    </a>
    <a href="/" class="w-full h-full flex items-center px-3 py-2 rounded text-xs hover:text-primary"
        aria-current="page">
        青春・学園
    </a>
    <a href="/" class="w-full h-full flex items-center px-3 py-2 rounded text-xs hover:text-primary"
        aria-current="page">
        格闘・アクション
    </a>
    <a href="/" class="w-full h-full flex items-center px-3 py-2 rounded text-xs hover:text-primary"
        aria-current="page">
        子育て・夫婦・姑
    </a>
    <a href="/" class="w-full h-full flex items-center px-3 py-2 rounded text-xs hover:text-primary"
        aria-current="page">
        エッセイ
    </a>
    <a href="/" class="w-full h-full flex items-center px-3 py-2 rounded text-xs hover:text-primary"
        aria-current="page">
        雑誌
    </a> --}}
</div>
