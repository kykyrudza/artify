
<template>
    <div class="flex justify-center items-center h-screen w-full">
        <div class="dark:bg-zinc-800 w-96 select-none transition-theme">
            <div class="w-full max-w-md rounded-lg shadow-xl p-6">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-2xl font-bold  dark:text-gray-200 ">Sign Up</h2>
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
                    <div class="pb-3 flex items-center text-sm text-gray-800 before:flex-1 transition-theme before:border-t before:border-zinc-200 before:me-3 after:flex-1 after:border-t after:border-zinc-200 after:ms-3 dark:text-white dark:before:border-neutral-600 dark:after:border-neutral-600">
                        or
                    </div>
                    <div class="flex justify-center items-center w-full">
                        <div class="w-full">
                            <button
                                class="flex mb-2 items-center h-10 justify-center p-2 bg-white dark:bg-zinc-700 hover:bg-zinc-200 focus:ring-yellow-500 focus:ring-offset-yellow-200 dark:text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-xl focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg"
                            >
                                <svg
                                    viewBox="0 0 24 24"
                                    height="25"
                                    width="25"
                                    y="0px"
                                    x="0px"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        d="M12,5c1.6167603,0,3.1012573,0.5535278,4.2863159,1.4740601l3.637146-3.4699707 C17.8087769,1.1399536,15.0406494,0,12,0C7.392395,0,3.3966675,2.5999146,1.3858032,6.4098511l4.0444336,3.1929321 C6.4099731,6.9193726,8.977478,5,12,5z"
                                        fill="#F44336"
                                    ></path>
                                    <path
                                        d="M23.8960571,13.5018311C23.9585571,13.0101929,24,12.508667,24,12 c0-0.8578491-0.093689-1.6931763-0.2647705-2.5H12v5h6.4862061c-0.5247192,1.3637695-1.4589844,2.5177612-2.6481934,3.319458 l4.0594482,3.204834C22.0493774,19.135437,23.5219727,16.4903564,23.8960571,13.5018311z"
                                        fill="#2196F3"
                                    ></path>
                                    <path
                                        d="M5,12c0-0.8434448,0.1568604-1.6483765,0.4302368-2.3972168L1.3858032,6.4098511 C0.5043335,8.0800171,0,9.9801636,0,12c0,1.9972534,0.4950562,3.8763428,1.3582153,5.532959l4.0495605-3.1970215 C5.1484375,13.6044312,5,12.8204346,5,12z"
                                        fill="#FFC107"
                                    ></path>
                                    <path
                                        d="M12,19c-3.0455322,0-5.6295776-1.9484863-6.5922241-4.6640625L1.3582153,17.532959 C3.3592529,21.3734741,7.369812,24,12,24c3.027771,0,5.7887573-1.1248169,7.8974609-2.975708l-4.0594482-3.204834 C14.7412109,18.5588989,13.4284058,19,12,19z"
                                        fill="#00B060"
                                    ></path>

                                </svg>
                                <span class="ml-2">Sign up with Google</span>
                            </button>
                            <button
                                class="flex mb-2 items-center h-10 justify-center p-2 bg-white dark:bg-zinc-700 hover:bg-zinc-200 focus:ring-yellow-500 focus:ring-offset-yellow-200 dark:text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-xl focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg"
                            >
                                <svg
                                    viewBox="0 0 30 30"
                                    height="30"
                                    width="30"
                                    y="0px"
                                    x="0px"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        d="M25.565,9.785c-0.123,0.077-3.051,1.702-3.051,5.305c0.138,4.109,3.695,5.55,3.756,5.55 c-0.061,0.077-0.537,1.963-1.947,3.94C23.204,26.283,21.962,28,20.076,28c-1.794,0-2.438-1.135-4.508-1.135 c-2.223,0-2.852,1.135-4.554,1.135c-1.886,0-3.22-1.809-4.4-3.496c-1.533-2.208-2.836-5.673-2.882-9 c-0.031-1.763,0.307-3.496,1.165-4.968c1.211-2.055,3.373-3.45,5.734-3.496c1.809-0.061,3.419,1.242,4.523,1.242 c1.058,0,3.036-1.242,5.274-1.242C21.394,7.041,23.97,7.332,25.565,9.785z M15.001,6.688c-0.322-1.61,0.567-3.22,1.395-4.247 c1.058-1.242,2.729-2.085,4.17-2.085c0.092,1.61-0.491,3.189-1.533,4.339C18.098,5.937,16.488,6.872,15.001,6.688z"
                                    ></path>
                                </svg>
                                <span class="ml-2">Sign up with Apple</span>
                            </button>
                        </div>
                    </div>
                    <p class="dark:text-white mt-4">
                        Already have an account?
                        <Link class="text-sm text-yellow-500 -200 hover:underline mt-4" :href="route('login')">
                            Login
                        </Link>
                    </p>
                    <button class="bg-gradient-to-r from-yellow-500 to-yellow-500 text-white font-bold py-2 px-4 rounded-md mt-4 hover:bg-yellow-700 hover:to-yellow-600 transition ease-in-out duration-150" type="submit">
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
export default {
    name: "Register",
    components: {
        Link
    },
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
