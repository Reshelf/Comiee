import { createApp } from "vue/dist/vue.esm-bundler";
import "./common/bootstrap";
import "./common/theme";

import components from "./common/components";
import i18n from "./common/i18n";

const app = createApp({
    components,
});

app.use(i18n);
app.mount("#app");
