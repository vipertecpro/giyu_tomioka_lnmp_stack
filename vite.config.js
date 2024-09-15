import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/css/client.css', 'resources/js/app.js', 'resources/js/client.js'],
            refresh: true,
        }),
    ],
    server: {
        host: '127.0.0.1',
        watch: {
            usePolling: true,
        },
    },
    resolve : {
        alias: {
            '$': 'jQuery',
        },
    },
});
