import './bootstrap'

import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/inertia-vue3'
import { InertiaProgress } from '@inertiajs/progress';
import { importPageComponent } from '@/scripts/vite/import-page-component'

import 'element-plus/dist/index.css'
import Maska from 'maska'
import { createPinia } from 'pinia';

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';
createInertiaApp({
    title: (title) => `${title} - ${appName}`,
	resolve: (name) => importPageComponent(name, import.meta.glob('@/views/pages/**/*.vue')),
	setup({ el, app, props, plugin }) {
		createApp({ render: () => h(app, props) })
			.use(plugin)
            .use(Maska)
            .use(createPinia())
            .mixin({ methods: { route } })
			.mount(el)
	},
})

InertiaProgress.init({ color: '#4B5563' });
