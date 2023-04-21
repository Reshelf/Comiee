import { t } from "../common/i18n";
declare module "@vue/runtime-core" {
    interface ComponentCustomProperties {
        t: typeof t;
    }
}
