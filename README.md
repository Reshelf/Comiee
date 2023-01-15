## 🚀 Features

-   🎪 [**Interactive docs & demos**](https://vueuse.org)
-   🕶 **Seamless migration**: Works for **both** Vue 3 and 2
-   ⚡ **Fully tree shakeable**: Only take what you want, [bundle size](https://vueuse.org/export-size)
-   🦾 **Type Strong**: Written in [TypeScript](https://www.typescriptlang.org/), with [TS Docs](https://github.com/microsoft/tsdoc)
-   🔋 **SSR Friendly**
-   🌎 **No bundler required**: Usable via CDN
-   🔩 **Flexible**: Configurable event filters and targets
-   🔌 **Optional [Add-ons](https://vueuse.org/add-ons)**: Router, Firebase, RxJS, etc.

## 🦄 Usage

```ts
import { useLocalStorage, useMouse, usePreferredDark } from "@vueuse/core";

export default {
    setup() {
        // tracks mouse position
        const { x, y } = useMouse();

        // is user prefers dark theme
        const isDark = usePreferredDark();

        // persist state in localStorage
        const store = useLocalStorage("my-storage", {
            name: "Apple",
            color: "red",
        });

        return { x, y, isDark, store };
    },
};
```

Refer to [functions list](https://vueuse.org/functions) or [documentations](https://vueuse.org/) for more details.

## 📦 Install

> 🎩 From v4.0, it works for Vue 2 & 3 **within a single package** by the power of [vue-demi](https://github.com/vueuse/vue-demi)!

```bash
npm i @vueuse/core
```

[Add ons](https://vueuse.org/add-ons.html) | [Nuxt Module](https://vueuse.org/guide/index.html#nuxt)

> From v6.0, VueUse requires `vue` >= v3.2 or `@vue/composition-api` >= v1.1

###### Demos

-   [Vite + Vue 3](https://github.com/vueuse/vueuse-vite-starter)
-   [Nuxt 3 + Vue 3](https://github.com/antfu/vitesse-nuxt3)
-   [Webpack + Vue 3](https://github.com/vueuse/vueuse-vue3-example)
-   [Nuxt 2 + Vue 2](https://github.com/antfu/vitesse-nuxt-bridge)
-   [Vue CLI + Vue 2](https://github.com/vueuse/vueuse-vue2-example)

### CDN

```html
<script src="https://unpkg.com/@vueuse/shared"></script>
<script src="https://unpkg.com/@vueuse/core"></script>
```

It will be exposed to global as `window.VueUse`

## 🪴 Project Activity

![Alt](https://repobeats.axiom.co/api/embed/a406ba7461a6a087dbdb14d4395046c948d44c51.svg "Repobeats analytics image")

## 🧱 Contribute

See the [**Contributing Guide**](https://vueuse.org/contributing)

## 🌸 Thanks

This project is heavily inspired by the following awesome projects.

-   [streamich/react-use](https://github.com/streamich/react-use)
-   [u3u/vue-hooks](https://github.com/u3u/vue-hooks)
-   [logaretm/vue-use-web](https://github.com/logaretm/vue-use-web)
-   [kripod/react-hooks](https://github.com/kripod/react-hooks)

And thanks to [all the contributors on GitHub](https://github.com/vueuse/vueuse/graphs/contributors)!

## 👨‍🚀 Contributors

### Financial Contributors on Open Collective

<a href="https://opencollective.com/vueuse"><img src="https://opencollective.com/vueuse/individuals.svg?width=890"></a>

## 📄 License

[MIT License](https://github.com/vueuse/vueuse/blob/main/LICENSE) © 2019-PRESENT [Anthony Fu](https://github.com/antfu)
