<template>
    <header class="fixed top-0 z-50 px-10 shadow-md w-full h-16 bg-[#eff1f5] dark:bg-[#232634]">
        <div class="flex justify-between items-center h-full ">
            <h1
                v-if="isMenuOpen || windowWidth >= 1024"
                class="text-xl font-bold lg:static absolute left-1/2 transform lg:transform-none -translate-x-1/2 lg:-translate-x-0"
            >
                Velora
            </h1>

            <button
                @click="toggleMenu"
                class="lg:hidden text-2xl focus:outline-none z-50 relative"
                aria-label="Toggle menu"
            >
                <svg
                    v-if="!isMenuOpen"
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-6 w-6 transition-transform duration-300 ease-in-out"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2"
                >
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <svg
                    v-else
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-6 w-6 transition-transform duration-300 ease-in-out"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2"
                >
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <Link
                :href="route('user.profile', auth.user.name)"
                v-if="!isMenuOpen && windowWidth < 1024"
                class="text-xl font-bold absolute left-1/2 transform -translate-x-1/2"
            >
                {{ auth.user.name }}
            </Link>

            <nav
                :class="[
          'lg:flex lg:flex-row lg:items-center lg:space-x-5 absolute lg:static top-16 left-0 w-full lg:w-auto bg-[#eff1f5] dark:bg-[#232634] lg:bg-transparent transition-transform duration-300 ease-in-out',
          isMenuOpen ? 'translate-y-0 opacity-100' : '-translate-y-full opacity-0'
        ]"
                class="flex flex-col items-center lg:flex lg:translate-y-0 lg:opacity-100 lg:space-y-0 space-y-5 p-5 lg:p-0"
            >
                <Link :href="route('dashboard')" class="px-5">Dashboard</Link>
                <Link :href="route('task.create')" class="px-5">Create Task</Link>
                <Link :href="route('task.complete')" class="px-5">Completed Task</Link>
                <Link :href="route('user.profile', auth.user.name)" class="px-5">{{ auth.user.name }}</Link>
            </nav>
        </div>
    </header>

    <div class="fixed bottom-5 left-5 z-50 scale-125 rounded-md size-10 text-white dark:text-[#181926] dark:bg-white bg-[#414559]">
        <ThemeToggle />
    </div>
</template>

<script>
import ThemeToggle from './ThemeToggle.vue';
import { Link } from "@inertiajs/vue3";

export default {
    name: 'Header',
    props: {
        auth: {
            type: Object,
            required: true,
        },
    },
    components: {
        ThemeToggle,
        Link
    },
    data() {
        return {
            isMenuOpen: false,
            windowWidth: window.innerWidth,
        };
    },
    methods: {
        toggleMenu() {
            this.isMenuOpen = !this.isMenuOpen;
        },
        updateWindowWidth() {
            this.windowWidth = window.innerWidth;
            // Автоматическое закрытие меню при изменении размера окна на большие экраны
            if (this.windowWidth >= 1024) {
                this.isMenuOpen = false;
            }
        },
    },
    mounted() {
        window.addEventListener('resize', this.updateWindowWidth);
    },
    beforeDestroy() {
        window.removeEventListener('resize', this.updateWindowWidth);
    },
};
</script>

<style scoped>
/* Плавное скрытие/появление меню */
nav {
    transition: transform 0.3s ease-in-out, opacity 0.3s ease-in-out;
}

/* Анимация иконки меню */
button svg {
    transition: transform 0.3s ease-in-out;
}
</style>
