import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import autoAnimate from '@formkit/auto-animate';
import Layout from './Layouts/Layout.vue';

// Создаем кастомную директиву для AutoAnimate
const autoAnimateDirective = {
    mounted(el) {
        autoAnimate(el); // Применяем анимацию при монтировании элемента
    },
};

// Инициализация Inertia приложения
createInertiaApp({
    resolve: async name => {
        const path = `./Pages/${name}.vue`;
        const page = (await import(`${path}`)).default;
        page.layout = page.layout || Layout; // Установка глобального макета
        return page;
    },
    setup({ el, App, props }) {
        // Создаем Vue приложение
        const app = createApp({ render: () => h(App, props) });

        // Добавляем глобальный метод маршрутизации
        app.mixin({ methods: { route: window.route } });

        // Регистрируем кастомную директиву
        app.directive('auto-animate', autoAnimateDirective);

        // Монтируем приложение
        app.mount(el);
    },
}).then(() => {
    console.log('Inertia приложение успешно запущено!');
});
