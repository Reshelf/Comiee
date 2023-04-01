import type { App } from "vue";
import ar from "../../lang/ar.json";
import bn from "../../lang/bn.json";
import cn from "../../lang/cn.json";
import de from "../../lang/de.json";
import en from "../../lang/en.json";
import es from "../../lang/es.json";
import fr from "../../lang/fr.json";
import hi from "../../lang/hi.json";
import id from "../../lang/id.json";
import it from "../../lang/it.json";
import ja from "../../lang/ja.json";
import ko from "../../lang/ko.json";
import pt from "../../lang/pt.json";
import th from "../../lang/th.json";
import tw from "../../lang/tw.json";

interface Translations {
    [key: string]: Record<string, string>;
}

const translations: Translations = {
    ja,
    hi,
    ar,
    pt,
    bn,
    en,
    tw,
    cn,
    es,
    fr,
    it,
    id,
    th,
    ko,
    de,
};

const locale = document.documentElement.lang;

const t = (key: string): string => {
    return translations[locale][key] || key;
};

export default {
    install: (app: App): void => {
        app.config.globalProperties.t = t;
    },
};
