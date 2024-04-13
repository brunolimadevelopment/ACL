import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/sass/app.scss", "resources/js/app.js"],
            refresh: true,
            output: {
                sass: "public/css/app.css",
                js: "public/js/app.js",
            },
        }),
    ],
});
