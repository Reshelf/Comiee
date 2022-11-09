import purgecss from "@fullhuman/postcss-purgecss";
import vue from "@vitejs/plugin-vue";
import laravel from "laravel-vite-plugin";
import { defineConfig, splitVendorChunkPlugin } from "vite";
import viteCompression from "vite-plugin-compression";

export default defineConfig({
  plugins: [
    laravel({
      input: ["resources/sass/app.scss", "resources/js/app.js"],
      refresh: true,
    }),
    vue({
      template: {
        transformAssetUrls: {
          base: null,
          includeAbsolute: false,
        },
      },
    }),
    viteCompression(),
    splitVendorChunkPlugin(),
  ],
  css: {
    postcss: {
      plugins: [
        purgecss({
          content: ["dist/*.html", "dist/assets/*.js"],
          css: ["dist/assets/*.css"],
          //   safelist: [/filepond-*/],
        }),
      ],
    },
  },
  // 本番ビルド用
  resolve: {
    alias: {
      vue: "vue/dist/vue.esm-bundler",
    },
  },
});
