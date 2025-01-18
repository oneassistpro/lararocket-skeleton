import vue from '@vitejs/plugin-vue'
import autoprefixer from 'autoprefixer'
import laravel from 'laravel-vite-plugin'
import tailwindcss from 'tailwindcss'
import { defineConfig } from 'vite'

export default defineConfig({
    css: {
        postcss: {
            plugins: [tailwindcss(), autoprefixer()],
        },
    },
    plugins: [
        laravel({
            input: 'resources/js/app.ts',
            ssr: 'resources/js/ssr.ts',
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
})
