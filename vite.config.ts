import { defineConfig } from 'vite'
import tailwindcss from 'tailwindcss'
import autoprefixer from 'autoprefixer'
import laravel from 'vite-plugin-laravel'
import vue from '@vitejs/plugin-vue'
import inertia from './resources/scripts/vite/inertia-layout'
import Components from 'unplugin-vue-components/vite'
import {
    ElementPlusResolver,
} from 'unplugin-vue-components/resolvers'



export default defineConfig({
    server: {
        host: '0.0.0.0'
    },
    plugins: [
        inertia(),
        vue(),
        Components({
            dirs: ['resources/components'],
            resolvers: [
                ElementPlusResolver(),
                (componentName) => {
                    // where `componentName` is always CapitalCase
                    if (componentName.startsWith('Sys'))
                    return { name: componentName, from: 'sys' }
                },
            ]
        }),
        laravel({
            postcss: [
                tailwindcss(),
                autoprefixer(),
            ],
        }),
    ],
})
