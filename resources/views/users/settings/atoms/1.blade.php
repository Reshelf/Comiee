<template #1>
    <form method="POST"
        action="{{ route('users.settings.update', [
            'lang' => app()->getLocale(),
            'name' => $user->name,
            'username' => $user->username,
        ]) }}"
        enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <h3 class="mb-8 mt-4 text-lg font-semibold">
            {{ __('フォロー') }}</h3>
        <label class="light-checkbox mt-8">
            <input type="checkbox" name="m1" value="m1" @if ($user->m_notice_1 === 1) checked @endif
                class="light-checkbox-Input">
            <span class="light-checkbox-DummyInput">
                <svg width="10" height="8" class="stroke-white" viewBox="0 0 10 8" fill="none">
                    <path d="M0.75 3.99998L3.58 6.82998L9.25 1.16998" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </span>
            <span class="light-checkbox-LabelText">{{ __('あなたがフォローしている作者が作品を投稿したときに通知をします') }}</span>
        </label>

        <label class="light-checkbox mt-8">
            <input type="checkbox" name="m2" value="m2" @if ($user->m_notice_2 === 1) checked @endif
                class="light-checkbox-Input">
            <span class="light-checkbox-DummyInput">
                <svg width="10" height="8" class="stroke-white" viewBox="0 0 10 8" fill="none">
                    <path d="M0.75 3.99998L3.58 6.82998L9.25 1.16998" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </span>
            <span class="light-checkbox-LabelText">{{ __('あなたがユーザーにフォローされたときに通知をします') }}</span>
        </label>

        <h3 class="my-8 text-lg font-semibold">{{ __('お気に入り') }}</h3>
        <label class="light-checkbox">
            <input type="checkbox" name="m3" value="m3" @if ($user->m_notice_3 === 1) checked @endif
                class="light-checkbox-Input">
            <span class="light-checkbox-DummyInput">
                <svg width="10" height="8" class="stroke-white" viewBox="0 0 10 8" fill="none">
                    <path d="M0.75 3.99998L3.58 6.82998L9.25 1.16998" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </span>
            <span class="light-checkbox-LabelText">{{ __('あなたの作品がお気に入りに登録されたら通知をします') }}</span>
        </label>
        <label class="light-checkbox mt-8">
            <input type="checkbox" name="m4" value="m4" @if ($user->m_notice_4 === 1) checked @endif
                class="light-checkbox-Input">
            <span class="light-checkbox-DummyInput">
                <svg width="10" height="8" class="stroke-white" viewBox="0 0 10 8" fill="none">
                    <path d="M0.75 3.99998L3.58 6.82998L9.25 1.16998" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </span>
            <span class="light-checkbox-LabelText">{{ __('あなたのお気に入り作品の新着エピソードが公開されたときに通知をします') }}</span>
        </label>

        <h3 class="my-8 text-lg font-semibold">{{ __('購入') }}</h3>

        <label class="light-checkbox mt-8">
            <input type="checkbox" name="m5" value="m5" @if ($user->m_notice_5 === 1) checked @endif
                class="light-checkbox-Input">
            <span class="light-checkbox-DummyInput">
                <svg width="10" height="8" class="stroke-white" viewBox="0 0 10 8" fill="none">
                    <path d="M0.75 3.99998L3.58 6.82998L9.25 1.16998" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </span>
            <span class="light-checkbox-LabelText">{{ __('あなたの作品エピソードが購入されたときに通知をします') }}</span>
        </label>

        <h3 class="my-8 text-lg font-semibold">NEWS</h3>

        <label class="light-checkbox mt-8">
            <input type="checkbox" name="m6" value="m6" @if ($user->m_notice_6 === 1) checked @endif
                class="light-checkbox-Input">
            <span class="light-checkbox-DummyInput">
                <svg width="10" height="8" class="stroke-white" viewBox="0 0 10 8" fill="none">
                    <path d="M0.75 3.99998L3.58 6.82998L9.25 1.16998" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </span>
            <span class="light-checkbox-LabelText">{{ __('Starbooksからのニュースやお得な情報を受け取ります') }}</span>
        </label>

        <button type="submit" class="btn mt-12">{{ __('更新する') }}</button>
    </form>
</template>
