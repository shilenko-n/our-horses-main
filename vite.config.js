import { defineConfig, loadEnv } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import path from 'path';


export default defineConfig(({ command, mode }) => {
    const env = loadEnv(mode, process.cwd(), '')

    return {
        css: {
            preprocessorOptions: {
                scss: {
                    api: 'modern',
                },
            },
        },
        plugins: [
            laravel({
                input: [
                    'resources/js/app.js',
                    'resources/scss/style.scss'
                ],
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
        resolve: {
            alias: {
                '@app': path.resolve(__dirname, 'resources/js'),
                '@scss': path.resolve(__dirname, 'resources/scss'),
                'vue': 'vue/dist/vue.esm-bundler.js'
            },
            dedupe: ['vue'], // Добавьте это, чтобы избежать дублирования Vue
        },
        build: {
            rollupOptions: {
                external: [
                    '/fonts/**', // Исключаем шрифты
                    '/img/**',   // Исключаем изображения
                ],
            },
        },
        server: {
            proxy: {
                '/img': {
                    target: env.VITE_APP_URL, // Ваш локальный сервер Laravel
                    changeOrigin: true,
                    secure: false,
                },
                '/fonts': {
                    target: env.VITE_APP_URL, // Ваш локальный сервер Laravel
                    changeOrigin: true,
                    secure: false,
                },
            },
            host: true,
            hmr: {
                host: env.VITE_EXTERNAL_IP || env.APP_URL.replace(/^https?\:\/\//i, ''),
            },
            watch: {
                ignored: [
                    '**/public/media/**', // Исключаем папку с загружаемыми файлами
                ],
            },
        },
    }
});
