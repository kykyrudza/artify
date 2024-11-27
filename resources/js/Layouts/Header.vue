<template>
    <header
        v-if="showHeader"
        class="fixed top-0 z-50 shadow-md w-full h-16 bg-[#eff1f5] dark:bg-[#232634]"
        auth="">
        <div class="flex justify-between items-center size-full">
            <h1 class="px-5">{{ auth.user ? auth.user.name : 'Гость' }}</h1>
        </div>
        <div class="fixed bottom-5 left-5 z-50 scale-125 rounded-md size-10 text-white dark:text-[#181926] dark:bg-white bg-[#414559]">
            <ThemeToggle />
        </div>
    </header>
</template>

<script>
import ThemeToggle from './ThemeToggle.vue';

export default {
    name: 'Header',
    props: {
        auth: {
            type: Object,
            required: true,
        },
        showHeader: {
            type: Boolean,
            default: true,
        },
    },
    components: {
        ThemeToggle,
    },
};
</script>
