// コンポーネントの自動インポート
import { defineAsyncComponent } from 'vue';

import components from '@/types/vite-plugin-auto-import';

const asyncComponents = Object.fromEntries(
    Object.entries(components).map(([key, value]) => [
        key,
        defineAsyncComponent(() => import(/* @vite-ignore */ `${value}`)),
    ])
);

export default asyncComponents;
