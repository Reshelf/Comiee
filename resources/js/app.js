import { createApp } from "vue/dist/vue.esm-bundler";
import "./common/bootstrap";
import components from "./common/components";
import "./common/theme";

const app = createApp({
  components,
});
app.mount("#app");
