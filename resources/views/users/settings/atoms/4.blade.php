<template #4>
    <h2 class="text-xl font-semibold">サイトの表示設定</h2>

    <div class="my-8">
        <h3 class="text-base font-semibold">表示言語</h3>
        <div class="mt-4">
            <div class="mb-4">
                @if (App::getLocale() == 'ja')
                    日本語
                @else
                    English
                @endif
            </div>
            <a href="{{ locale_change_url() }}" class="inline-block btn-border px-2">
                @if (app()->getLocale() == 'ja')
                    英語に変える
                @else
                    Change to Japanese
                @endif
            </a>
        </div>
    </div>

    <div class="my-8">
        <h3 class="text-base font-semibold">外観</h3>
        <div class="mt-4">
            <theme-toggle></theme-toggle>
        </div>
    </div>
</template>
