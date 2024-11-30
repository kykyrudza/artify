<template>
    <div class="max-w-4xl mt-20 mx-auto select-none transition-theme">
        <h1 class="text-2xl dark:text-gray-200 font-bold mb-5 text-center">Создать задачу</h1>

        <form @submit.prevent="submitForm">
            <!-- Название задачи -->
            <div class="mb-4">
                <label for="nameTask" class="text-md dark:text-gray-200">
                    Название задачи
                </label>
                <input
                    type="text"
                    id="nameTask"
                    v-model="form.nameTask"
                    class="w-full dark:bg-zinc-700 dark:text-gray-200 border-0 rounded-md p-2 mb-4 dark:focus:bg-zinc-600 ring-zinc-200 ring-1 dark:ring-zinc-600 focus:outline-none  transition ease-in-out duration-150"
                    placeholder="Введите название задачи"
                    required
                />
                <span v-if="errors.nameTask" class="text-red-600 text-sm">{{ errors.nameTask }}</span>
            </div>

            <!-- Описание задачи -->
            <div class="mb-4">
                <label
                    for="descriptionTask"
                    class="text-md dark:text-gray-200"
                >
                    Описание задачи

                </label>
                <textarea
                    id="descriptionTask"
                    v-model="form.descriptionTask"
                    class="w-full dark:bg-zinc-700 dark:text-gray-200 border-0 rounded-md p-2 mb-4 dark:focus:bg-zinc-600 ring-zinc-200 ring-1 dark:ring-zinc-600 focus:outline-none  transition ease-in-out duration-150"
                    placeholder="Введите описание задачи"
                    rows="4"
                    required
                ></textarea>
                <span v-if="errors.descriptionTask" class="text-red-600 text-sm">
          {{ errors.descriptionTask }}
        </span>
            </div>

            <!-- Дата выполнения задачи -->
            <div class="mb-4">
                <label for="dueDateTask" class="text-md dark:text-gray-200">
                    Срок выполнения
                </label>
                <input
                    type="date"
                    id="dueDateTask"
                    v-model="form.dueDateTask"
                    class="w-full dark:bg-zinc-700 dark:text-gray-200 border-0 rounded-md p-2 mb-4 dark:focus:bg-zinc-600 ring-zinc-200 ring-1 dark:ring-zinc-600 focus:outline-none  transition ease-in-out duration-150"
                    required
                />
                <span v-if="errors.dueDateTask" class="text-red-600 text-sm">
          {{ errors.dueDateTask }}
        </span>
            </div>

            <!-- Кнопка отправки -->
            <div class="flex justify-end">
                <button
                    type="submit"
                    class="border-[#a6d189] text-[#a6d189] py-2 mt-2 rounded-lg active:bg-[#a6d189] active:text-black active:dark:text-white border-2 w-full"
                >
                    Создать задачу
                </button>
            </div>
        </form>
    </div>
</template>

<script>
import { Inertia } from "@inertiajs/inertia";
import { reactive } from "vue";

export default {
    name: "CreateTask",
    setup() {
        const form = reactive({
            nameTask: "",
            descriptionTask: "",
            dueDateTask: "",
        });

        const errors = reactive({});

        const submitForm = () => {
            Inertia.post(route('task.store'), form, {
                onError: (err) => {
                    Object.assign(errors, err); // Для правильной обработки ошибок
                },
            });
        };

        return {
            form,
            errors,
            submitForm,
        };
    },
};

</script>
