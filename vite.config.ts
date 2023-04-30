import { resolve } from 'path';
import { defineConfig } from 'vite';
import Checker from 'vite-plugin-checker';
import viteCompression from 'vite-plugin-compression';

import vue from '@vitejs/plugin-vue';

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
        viteCompression(),
        Checker({ typescript: true }), // tsの型チェック
    ],
    resolve: {
        alias: {
            "@": resolve(__dirname, "resources/js"),
        },
    },
    optimizeDeps: {
        include: ["path/to/your/entry/point"],
    },
});
