import { createApp } from "vue";
import "./common/bootstrap";
import components from "./common/components";
import "./common/theme";

const app = createApp({
    components,
});

app.mount("#app");
