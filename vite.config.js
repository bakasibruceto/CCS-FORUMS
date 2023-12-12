import { defineConfig } from 'vite';
import laravel, { refreshPaths } from 'laravel-vite-plugin';

export default defineConfig({
    build: {
        outDir: 'resources',
    },
    server: {
        open: false,
    },
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/a11y-dark.css',
                'resources/js/app.js',
            ],
            refresh: [
                ...refreshPaths,
                'app/Livewire/**',
            ],
        }),
    ],
});
