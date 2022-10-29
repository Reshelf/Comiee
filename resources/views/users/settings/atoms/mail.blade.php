<template #1>
    <h2 class="text-xl font-semibold">メール通知設定</h2>
    <form method="POST" action="" class="px-8">
        @csrf
        @method('POST')

        <h3 class="my-8 text-lg font-semibold">フォロー</h3>
        <label class="light-checkbox mt-8">
            <input type="checkbox" name="feature" value="完結作品のみ" class="light-checkbox-Input">
            <span class="light-checkbox-DummyInput">
                <svg width="10" height="8" class="stroke-white" viewBox="0 0 10 8" fill="none">
                    <path d="M0.75 3.99998L3.58 6.82998L9.25 1.16998" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </span>
            <span class="light-checkbox-LabelText">あなたがフォローしている作者が作品を投稿したときに通知をします</span>
        </label>
        <label class="light-checkbox mt-8">
            <input type="checkbox" name="feature" value="完結作品のみ" class="light-checkbox-Input">
            <span class="light-checkbox-DummyInput">
                <svg width="10" height="8" class="stroke-white" viewBox="0 0 10 8" fill="none">
                    <path d="M0.75 3.99998L3.58 6.82998L9.25 1.16998" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </span>
            <span class="light-checkbox-LabelText">あなたがユーザーにフォローされたときに通知をします</span>
        </label>

        <h3 class="my-8 text-lg font-semibold">お気に入り</h3>
        <label class="light-checkbox">
            <input type="checkbox" name="feature" value="完結作品のみ" class="light-checkbox-Input">
            <span class="light-checkbox-DummyInput">
                <svg width="10" height="8" class="stroke-white" viewBox="0 0 10 8" fill="none">
                    <path d="M0.75 3.99998L3.58 6.82998L9.25 1.16998" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </span>
            <span class="light-checkbox-LabelText">あなたの作品がお気に入りに登録されたら通知をします</span>
        </label>
        <label class="light-checkbox mt-8">
            <input type="checkbox" name="feature" value="完結作品のみ" class="light-checkbox-Input">
            <span class="light-checkbox-DummyInput">
                <svg width="10" height="8" class="stroke-white" viewBox="0 0 10 8" fill="none">
                    <path d="M0.75 3.99998L3.58 6.82998L9.25 1.16998" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </span>
            <span class="light-checkbox-LabelText">あなたのお気に入り作品の新着エピソードが公開されたときに通知をします</span>
        </label>

        <h3 class="my-8 text-lg font-semibold">購入</h3>

        <label class="light-checkbox mt-8">
            <input type="checkbox" name="feature" value="完結作品のみ" class="light-checkbox-Input">
            <span class="light-checkbox-DummyInput">
                <svg width="10" height="8" class="stroke-white" viewBox="0 0 10 8" fill="none">
                    <path d="M0.75 3.99998L3.58 6.82998L9.25 1.16998" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </span>
            <span class="light-checkbox-LabelText">あなたの作品エピソードが購入されたときに通知をします</span>
        </label>

        <h3 class="my-8 text-lg font-semibold">NEWS</h3>

        <label class="light-checkbox mt-8">
            <input type="checkbox" name="feature" value="完結作品のみ" class="light-checkbox-Input">
            <span class="light-checkbox-DummyInput">
                <svg width="10" height="8" class="stroke-white" viewBox="0 0 10 8" fill="none">
                    <path d="M0.75 3.99998L3.58 6.82998L9.25 1.16998" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </span>
            <span class="light-checkbox-LabelText">Starbooksからのニュースやお得な情報を受け取ります</span>
        </label>

        <button onclick="this.disabled='disabled'; this.form.submit();" type="submit"
            class="btn mt-12">更新する</button>
    </form>
</template>
