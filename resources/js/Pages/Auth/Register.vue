
<template>
    <div class="flex justify-center items-center h-screen w-full">
        <div class="dark:bg-zinc-800 w-96 select-none transition-theme">
            <div class="w-full max-w-md rounded-lg shadow-xl p-6">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-2xl font-bold dark:text-gray-200">Sign Up</h2>
                    <ThemeToggle />
                </div>
                <form class="flex flex-col" @submit.prevent="submitForm">
                    <input
                        placeholder="Name"
                        v-model="form.name"
                        id="firstName"
                        name="firstName"
                        class="w-full dark:bg-zinc-700 dark:text-gray-200 border-0 rounded-md p-2 mb-4 dark:focus:bg-zinc-600 ring-zinc-200 ring-1 dark:ring-zinc-600 focus:outline-none focus:ring-1 focus:ring-yellow-500 transition ease-in-out duration-150"
                        type="text"
                    />
                    <input
                        placeholder="Email"
                        v-model="form.email"
                        id="email"
                        name="email"
                        class="dark:bg-zinc-700 dark:text-gray-200 border-0 rounded-md p-2 mb-4 dark:focus:bg-zinc-600 ring-zinc-200 ring-1 dark:ring-zinc-600 focus:outline-none focus:ring-1 focus:ring-yellow-500 transition ease-in-out duration-150"
                        type="email"
                    />
                    <input
                        placeholder="Password"
                        v-model="form.password"
                        id="password"
                        name="password"
                        class="dark:bg-zinc-700 dark:text-gray-200 border-0 rounded-md p-2 mb-4 dark:focus:bg-zinc-600 ring-zinc-200 ring-1 dark:ring-zinc-600 focus:outline-none focus:ring-1 focus:ring-yellow-500 transition ease-in-out duration-150"
                        type="password"
                    />
                    <input
                        placeholder="Confirm Password"
                        v-model="form.password_confirmation"
                        id="password_confirmation"
                        name="password_confirmation"
                        class="dark:bg-zinc-700 dark:text-gray-200 border-0 rounded-md p-2 mb-4 dark:focus:bg-zinc-600 ring-zinc-200 ring-1 dark:ring-zinc-600 focus:outline-none focus:ring-1 focus:ring-yellow-500 transition ease-in-out duration-150"
                        type="password"
                    />
                    <p class="dark:text-white mt-4">
                        Already have an account?
                        <Link class="text-sm text-[#a6d189] hover:underline mt-4" :href="route('login')">
                            Login
                        </Link>
                    </p>
                    <button class="border-[#a6d189] text-[#a6d189] py-2 mt-2 rounded-lg active:bg-[#a6d189] active:text-black active:dark:text-white border-2 w-full" type="submit">
                        Sign Up
                    </button>
                </form>
            </div>
        </div>
    </div>

</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';
import { Inertia } from '@inertiajs/inertia';
import ThemeToggle from '../../Layouts/ThemeToggle.vue';
import HomeLayout from "../../Layouts/HomeLayout.vue";
export default {
    name: "Register",
    components: {
        Link,
        ThemeToggle
    },
    layout: HomeLayout,
    props: {
        errors: {
            type: Object,
            default: () => ({})
        },
        form: {
            type: Object,
            default: () => ({name: '', email: '', password: '', password_confirmation: ''})
        },
    },
    methods: {
        submitForm() {
            Inertia.post(route('register.post'), this.form);
        }
    }
}
</script>
