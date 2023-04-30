import vue from "@vitejs/plugin-vue";
import laravel from "laravel-vite-plugin";
import { defineConfig } from "vite";
import Checker from "vite-plugin-checker";
import viteCompression from "vite-plugin-compression";

export default defineConfig({
    build: {
        rollupOptions: {
            output: {
                manualChunks(id) {
                    if (id.includes("node_modules")) {
                        return "vendor";
                    }
                },
            },
        },
        chunkSizeWarningLimit: 1000, // 1000 KB (1 MB)
    },
    plugins: [
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
        laravel({
            input: [
                "resources/sass/app.scss",
                "resources/js/app.ts",
                "resources/js/common/atoms/common.ts",
            ],
            refresh: true,
        }),
        viteCompression(),
        Checker({ typescript: true }), // tsの型チェック
    ],
});
