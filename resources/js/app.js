import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import autoAnimate from '@formkit/auto-animate';
import Layout from './Layouts/Layout.vue';

// Создаем кастомную директиву для AutoAnimate
const autoAnimateDirective = {
    mounted(el) {
        autoAnimate(el);
    },
};
createInertiaApp({
    resolve: async name => {
        const path = `./Pages/${name}.vue`;
        const page = (await import(`${path}`)).default;
        page.layout = page.layout || Layout;
        return page;
    },
    setup({ el, App, props }) {
        const app = createApp({ render: () => h(App, props) });

        app.mixin({ methods: { route: window.route } });

        app.directive('auto-animate', autoAnimateDirective);

        app.mount(el);
    },
}).then(() => {
    console.log('Inertia приложение успешно запущено!');
});
