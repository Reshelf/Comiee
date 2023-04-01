import { App, Component, createApp } from "vue";
import "./common/bootstrap";
import GlobalMethods from "./common/globalMethods";
import "./common/theme";

import components from "./common/components";
import i18n from "./common/i18n";

interface AppComponent {
    [key: string]: Component;
}

const app: App<Element> = createApp({
    components: components as AppComponent,
});

app.use(i18n);
GlobalMethods.install(app);
app.mount("#app");
