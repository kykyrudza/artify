
<template>
    <div class="flex justify-center items-center h-screen w-full">
        <div class="dark:bg-zinc-800 w-96 select-none transition-theme">
        <div class="w-full max-w-md rounded-lg shadow-xl p-6">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-2xl font-bold  dark:text-gray-200 ">Login</h2>
                <ThemeToggle />
            </div>
            <form class="flex flex-col" @submit.prevent="submitForm">

                <input
                    placeholder="Email address"
                    v-model="form.email"
                    id="email"
                    name="email"
                    class="dark:bg-zinc-700 dark:text-gray-200 border-0 rounded-md p-2 mb-4 dark:focus:bg-zinc-600 ring-zinc-200 ring-1 dark:ring-zinc-600 focus:outline-none focus:ring-1 focus:ring-yellow-500 transition ease-in-out duration-150"
                    type="email">

                <input
                    placeholder="Password"
                    v-model="form.password"
                    id="password"
                    name="password"
                    class="dark:bg-zinc-700 dark:text-gray-200 border-0 rounded-md p-2 mb-4 dark:focus:bg-zinc-600 ring-zinc-200 ring-1 dark:ring-zinc-600 focus:outline-none focus:ring-1 focus:ring-yellow-500 transition ease-in-out duration-150"
                    type="password">

                <p class="dark:text-white mt-4">
                    Don't have an account?
                    <Link class="text-sm text-[#a6d189] hover:underline mt-4" :href="route('register')">
                        Signup
                    </Link>
                </p>

                <button class="border-[#a6d189] text-[#a6d189] py-2 mt-2 rounded-lg active:bg-[#a6d189] active:text-black active:dark:text-white border-2 w-full" type="submit">
                    Login
                </button>
            </form>
        </div>
    </div>
    </div>
</template>

<script>
import ThemeToggle from '../../Layouts/ThemeToggle.vue';
import { Link } from '@inertiajs/inertia-vue3';
import {Inertia} from "@inertiajs/inertia";
import HomeLayout from "../../Layouts/HomeLayout.vue";
export default {
    name: "Login",
    components: {
        ThemeToggle,
        Link
    },
    layout: HomeLayout,
    props: {
        errors: {
            type: Object,
            default: () => ({})
        },
        form: {
            type: Object,
            default: () => ({ email: '', password: '' })
        },
    },
    methods: {
        submitForm() {
            Inertia.post(route('login.post'), this.form);
        }
    }
}
</script>
