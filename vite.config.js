import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';

export default defineConfig({
    plugins: [
        laravel({
            input: 'resources/js/app.jsx',
            refresh: true,
        }),
        react(),
    ],
    build: {
        outDir: 'dist', // Asegúrate de que esto esté configurado correctamente
        rollupOptions: {
            input: {
                main: 'resources/js/app.jsx', // Asegúrate de que esta ruta sea correcta
            },
        },
    },
});
