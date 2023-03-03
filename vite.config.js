import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import vue from "@vitejs/plugin-vue";
// This Will Enable TreeShacking
import vuetify from "vite-plugin-vuetify";

export default defineConfig({
    server: { hmr: true },
    plugins: [
        laravel({
            input: "resources/js/app.js",
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: { base: null, includeAbsolute: false },
            },
        }),
        vuetify(),
    ],
});
