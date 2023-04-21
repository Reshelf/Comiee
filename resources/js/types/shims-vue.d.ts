declare module "*.vue" {
    import { defineComponent } from "vue";
    const component: ReturnType<typeof defineComponent>;
    export default component;
}

// ビルドモジュールの型定義
declare module "vue/dist/vue.esm-bundler" {
    export * from "vue";
}
