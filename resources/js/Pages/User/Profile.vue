<template>
    <div class="max-w-4xl mx-auto mt-20 p-6">
        <h1 class="text-2xl font-bold mb-4">Профиль пользователя {{ form.name }}</h1>

        <form @submit.prevent="updateProfile" class="space-y-6">
            <!-- Имя -->
            <div>
                <label for="name" class="block text-md font-medium dark:text-gray-300 text-gray-700">Имя</label>
                <input
                    type="text"
                    id="name"
                    v-model="form.name"
                    class="w-full dark:bg-zinc-700 dark:text-gray-200 border-0 rounded-md p-2 mb-4 dark:focus:bg-zinc-600 ring-zinc-200 ring-1 dark:ring-zinc-600 focus:outline-none transition ease-in-out duration-150"
                />
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-md font-medium dark:text-gray-300 text-gray-700">Email</label>
                <input
                    type="email"
                    id="email"
                    v-model="form.email"
                    class="w-full dark:bg-zinc-700 dark:text-gray-200 border-0 rounded-md p-2 mb-4 dark:focus:bg-zinc-600 ring-zinc-200 ring-1 dark:ring-zinc-600 focus:outline-none transition ease-in-out duration-150"
                />
            </div>

            <!-- Пароль -->
            <div>
                <label for="password" class="block text-md font-medium dark:text-gray-300 text-gray-700">Пароль</label>
                <input
                    type="password"
                    id="password"
                    v-model="form.password"
                    placeholder="Оставьте пустым, если не хотите менять"
                    class="w-full dark:bg-zinc-700 dark:text-gray-200 border-0 rounded-md p-2 mb-4 dark:focus:bg-zinc-600 ring-zinc-200 ring-1 dark:ring-zinc-600 focus:outline-none transition ease-in-out duration-150"
                />
            </div>

            <div>
                <button
                    type="submit"
                    class="border-[#a6d189] text-[#a6d189] py-2 mt-2 rounded-lg active:bg-[#a6d189] active:text-black active:dark:text-white border-2 w-full"
                >
                    Сохранить изменения
                </button>
            </div>
        </form>
    </div>
</template>

<script>
import { useForm } from '@inertiajs/vue3';
import { Inertia } from "@inertiajs/inertia";

export default {
    name: 'Profile',
    props: {
        user: {
            type: Object,
            required: true,
        },
    },
    setup(props) {
        const form = useForm({
            id: props.user.id,
            name: props.user.name,
            email: props.user.email,
            password: '',
        });

        const updateProfile = () => {
            console.log("Form data:", form);
            Inertia.post(route('user.update'), form, {
                onSuccess: () => {
                    console.log('User updated');
                },
                onError: (err) => {
                    console.log('Error:', err);
                },
            });
        };

        return {form, updateProfile};
    },
};
</script>
