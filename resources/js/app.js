import { createApp } from "vue/dist/vue.esm-bundler";
import "./common/bootstrap";
import GlobalMethods from "./common/globalMethods";
import "./common/theme";

import components from "./common/components";
import i18n from "./common/i18n";

const app = createApp({
    components,
});

// コンポーネント間のインポート
Object.keys(components).forEach((componentName) => {
    app.component(componentName, components[componentName]);
});

app.use(i18n);
GlobalMethods.install(app);
app.mount("#app");
