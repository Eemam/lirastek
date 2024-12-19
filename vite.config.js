import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/js/app.js', 'resources/css/app.css'],
            refresh: true,
        }),
    ],
    build: {
        manifest: true,
        outDir: 'public/build', // Ensure the build directory is set to public/build
        emptyOutDir: true, // Ensures old build files are cleared
        assetsDir: '', // Keep asset directory structure flat (optional)
    },
    base: '/build/', // Ensures asset URLs begin with /build/
});
