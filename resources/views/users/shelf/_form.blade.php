<div class="w-full flex">
    <div class="md:w-1/5 flex flex-col md:pr-12">
        <h4 class="text-xs my-2 py-4 border-b border-ccc">{{ __('特徴') }}</h4>
        <label class="light-checkbox mt-4">
            <input type="checkbox" name="feature" value="完結作品のみ" @if ($feature === '完結作品のみ') checked @endif
                class="light-checkbox-Input">
            <span class="light-checkbox-DummyInput">
                <svg width="10" height="8" class="stroke-white" viewBox="0 0 10 8" fill="none">
                    <path d="M0.75 3.99998L3.58 6.82998L9.25 1.16998" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </span>
            <span class="light-checkbox-LabelText">{{ __('完結作品のみ') }}</span>
        </label>
    </div>
</div>

<button type="submit" class="btn-border mt-6">{{ __('絞り込む') }}</button>
