import vue from "@vitejs/plugin-vue";
import laravel from "laravel-vite-plugin";
import { defineConfig, splitVendorChunkPlugin } from "vite";

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
    splitVendorChunkPlugin(),
  ],
  // 本番ビルド用
  resolve: {
    alias: {
      vue: "vue/dist/vue.esm-bundler",
    },
  },
});
