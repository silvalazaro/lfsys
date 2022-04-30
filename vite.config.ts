import path from 'path'
import { defineConfig } from 'vite'
import tailwindcss from 'tailwindcss'
import autoprefixer from 'autoprefixer'
import laravel from 'vite-plugin-laravel'
import vue from '@vitejs/plugin-vue'
import inertia from './resources/scripts/vite/inertia-layout'
import Components from 'unplugin-vue-components/vite'
import Icons from 'unplugin-icons/vite'
import IconsResolver from 'unplugin-icons/resolver'
import AutoImport from 'unplugin-auto-import/vite'
import Inspect from 'vite-plugin-inspect'

import { ElementPlusResolver } from 'unplugin-vue-components/resolvers'

export default defineConfig({
    server: {
        host: '0.0.0.0'
    },
    plugins: [
        inertia(),
        vue(),
        AutoImport({
            resolvers: [
                ElementPlusResolver(),
                IconsResolver({
                    prefix: 'icon',
                }),
            ],
        }),
        Components({
            dirs: ['resources/components'],
            resolvers: [
                ElementPlusResolver(),
                IconsResolver({
                    prefix: false,
                    enabledCollections: ['ep'],
                }),
                (componentName) => {
                    // where `componentName` is always CapitalCase
                    if (componentName.startsWith('Sys'))
                        return { name: componentName, from: 'sys' }
                },
            ]
        }),
        Icons({
            autoInstall: true,
          }),
        laravel({
            postcss: [
                tailwindcss(),
                autoprefixer()
            ],
        }),
        Inspect()
    ],
})
