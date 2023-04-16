import { Translations, Translation } from "@/types/translations";

import { App } from "vue";
import cn from "../../lang/cn.json";
import de from "../../lang/de.json";
import en from "../../lang/en.json";
import es from "../../lang/es.json";
import fr from "../../lang/fr.json";
import id from "../../lang/id.json";
import it from "../../lang/it.json";
import ja from "../../lang/ja.json";
import ko from "../../lang/ko.json";
import th from "../../lang/th.json";
import tw from "../../lang/tw.json";
import hi from "../../lang/hi.json";
import ar from "../../lang/ar.json";
import pt from "../../lang/pt.json";
import bn from "../../lang/bn.json";

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
    const translation: Translation = translations[locale] || {};
    return translation[key] || key;
};

// グローバルミックスイン機能を使う
export default {
    install: (app: App): void => {
        app.config.globalProperties.t = t;
    },
};
