@php
    $a = __('ダークモードにする');
    $b = __('ライトモードにする');
@endphp

<template #4>

    <div class="">
        <h3 class="text-base font-semibold">{{ __('表示言語') }}</h3>
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
        <h3 class="text-base font-semibold">{{ __('外観') }}</h3>
        <div class="mt-4">
            <theme-toggle :one='@json($a)' :two='@json($b)'></theme-toggle>
        </div>
    </div>
</template>
