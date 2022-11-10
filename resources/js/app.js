import { createApp } from "vue/dist/vue.esm-bundler";
import components from "./common/components";

import "./common/bootstrap";
import "./common/theme";

const app = createApp({
  components,
});
app.mount("#app");
