import axios from "axios";
import { App, createApp } from "vue/dist/vue.esm-bundler";
import GlobalMethods from "./common/globalMethods";
import "./common/theme";

import _ from "lodash";
import components from "./common/components";
import i18n from "./common/i18n";

function createVueApp() {
    const app = createApp({
        components,
    });

    app.provide("axios", axios);
    app.provide("_", _);
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
