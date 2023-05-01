import './common/theme';

import { createPinia } from 'pinia';
import { App, createApp } from 'vue/dist/vue.esm-bundler';

import components from './common/components';
import GlobalMethods from './common/globalMethods';
import i18n from './common/i18n';
import { useUserStore } from './stores/user';

function createVueApp() {
    const app = createApp({});

    // Register all components
    for (const [name, component] of Object.entries(components)) {
        app.component(name, component);
    }

    // Piniaのインスタンスを作成し、Vueアプリにインストールします。
    const pinia = createPinia();
    app.use(pinia);

    app.use(i18n);
    GlobalMethods.install(app);

    return app;
}

function mountVueApp(app: App<Element>) {
    const appElement = document.getElementById("app");

    if (appElement) {
        app.mount("#app");
        appElement.style.display = "block";
    } else {
        console.error("App element not found.");
    }
}

function configureGlobalSettings() {
    window.csrf_token = "{{ csrf_token() }}";

    // ページ遷移後はスクロール位置をトップにする
    window.addEventListener("load", () => window.scrollTo(0, 0));
}

const app = createVueApp();
configureGlobalSettings();
mountVueApp(app);

// CSRFトークンの取得
const csrfTokenMeta = document.querySelector('meta[name="csrf-token"]');
if (csrfTokenMeta) {
    const csrfToken = csrfTokenMeta.getAttribute("content");
    // CSRFトークンをAxiosなどで使用する場合、ここで設定します。
}

// ユーザーデータの取得
const userStore = useUserStore();
if (window.userData) {
    userStore.loginUser(window.userData);
}
