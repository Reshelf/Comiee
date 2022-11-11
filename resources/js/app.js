import { createApp } from "vue/dist/vue.esm-bundler";
import "./common/bootstrap";
import "./common/theme";

import components from "./common/components";
const app = createApp({
  components,
});
app.mount("#app");
