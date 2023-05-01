// components.ts
import {
  ComponentOptions, ComponentPublicInstance, defineAsyncComponent, FunctionalComponent
} from 'vue';

const components = import.meta.glob("/resources/js/components/**/*.vue");

const asyncComponents = Object.fromEntries(
    Object.entries(components).map(([path, importer]) => {
        const componentName = path
            .replace(/^.+\/([^/]+)\.vue$/, "$1") // ファイル名を取得
            .replace(/^\w/, (c) => c.toUpperCase()) // 最初の文字を大文字に
            .replace(/-(\w)/g, (_, c) => (c ? c.toUpperCase() : "")); // ケバブケースをパスカルケースに変換
        return [
            componentName,
            defineAsyncComponent(() =>
                importer().then(
                    (
                        module
                    ):
                        | ComponentOptions<unknown>
                        | FunctionalComponent<unknown, {}>
                        | ComponentPublicInstance<unknown> =>
                        (module as any).default
                )
            ),
        ];
    })
);

export default asyncComponents;
