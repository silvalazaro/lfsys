import { defineConfig } from 'vitest/config'
import Vue from '@vitejs/plugin-vue'
import inertia from './resources/scripts/vite/inertia-layout'
import Inspect from 'vite-plugin-inspect'
import tsconfigPaths from 'vite-tsconfig-paths'

export default defineConfig({
    plugins: [
        tsconfigPaths(),
        Vue(),
        inertia(),
        Inspect(),
    ],
    test: {
        include: ['tests/Vue/**/*.{test,spec}.{js,mjs,cjs,ts,mts,cts,jsx,tsx}'],
        setupFiles: ['tests/Vue/mocks/server']
    }
})
