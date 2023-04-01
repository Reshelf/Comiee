import type { App } from "vue";

export default {
    install(app: App) {
        app.config.globalProperties.isEmpty = function (
            value: unknown
        ): boolean {
            return value === undefined || value === null;
        };
    },
};
