// vite.config.js
import { defineConfig } from 'vite';

export default defineConfig({
    root: 'src',
    build: {
        outDir: '../dist',
        emptyOutDir: true,
        manifest: true, // Pastikan opsi manifest diaktifkan
    },
    server: {
        proxy: {
            '/': 'http://localhost:8000',
        },
    },
});
