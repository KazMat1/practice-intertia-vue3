// laravel default
// import './bootstrap';

// settings for interia.js and vue.js
import "normalize.css/normalize.css";
import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'

createInertiaApp({
  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
    return pages[`./Pages/${name}.vue`]
  },
  setup({ el, App, props, plugin }) {
    const app = createApp({ render: () => h(App, props) });
    app.config.globalProperties.route = route;
    app.use(plugin);
    app.mount(el);
  },
})
