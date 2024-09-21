import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';
export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/css/client.css', 'resources/js/app.js', 'resources/js/client.js'],
            refresh: true,
        }),
    ],
    resolve : {
        alias: {
            '$': 'jQuery',
        },
    },
});
