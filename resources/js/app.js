// laravel default
// import './bootstrap';

// settings for interia.js and vue.js
import "normalize.css/normalize.css";
import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import dayjs, { ja } from "dayjs";
import Layout from '@/Pages/Layout.vue'

createInertiaApp({
  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
    let page = pages[`./Pages/${name}.vue`]
    page.default.layout = page.default.layout || Layout
    return page
  },
  setup({ el, App, props, plugin }) {
    const app = createApp({ render: () => h(App, props) });
    dayjs.locale(ja);
    app.provide('dayjs', dayjs)
    app.config.globalProperties.route = route;
    app.use(plugin);
    app.mount(el);
  },
})
