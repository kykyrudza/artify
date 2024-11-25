
<template>
    <div class=" mt-40 flex flex-col">
        <!-- Поле поиска -->
        <div class="flex justify-center md:justify-end mx-20">
            <div>
                <input
                    v-model="searchQuery"
                    type="text"
                    class="mt-12 dark:bg-[#232634] border dark:border-none dark:text-white focus:border-gray-400 outline-none text-[#181926] rounded-md py-2 px-4"
                    placeholder="Search tasks..."
                />
            </div>
        </div>

        <!-- Карточки задач -->
        <div v-auto-animate class=" grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 w-full max-h-56 mt-12">
            <div
                v-for="(task, index) in filteredTasks"
                :key="index"
                class="task-card
                  bg-[#eff1f5] dark:bg-[#232634] mx-auto my-6 p-4 rounded-md shadow-md cursor-pointer
                 duration-300 w-[90%] hover:scale-110"
            >
                <div class="relative">
                    <h1 class="absolute right-0 left-0 -top-10 size-9 bg-[#a6d189] text-[#1e2030] font-bold outline outline-8 outline-[#dce0e8] dark:outline-[#292c3c] rounded-full grid place-items-center">{{ task.id }}</h1>
                </div>

                <h3 class="text-lg my-3 font-bold text-[#179299] dark:text-[#81c8be]">{{ task.nameTask }}</h3>
                <p class="text-sm text-[#303446] dark:text-gray-300 mb-4">
                    <strong class="pr-1">Description:</strong> {{ task.descriptionTask }}
                </p>
                <p class="text-sm text-[#303446] dark:text-gray-300">
                    <strong>Due Date:</strong> {{ task.dueDateTask }}
                </p>
                <p class="text-sm text-[#303446] dark:text-gray-300">
                    <strong>Completed:</strong> {{ task.completedTask ? "Yes" : "No" }}
                </p>
                <p class="text-xs text-[#232634] dark:text-gray-400">
                    Created: {{ task.created_at }} | Updated: {{ task.updated_at }}
                </p>
                <div class="">
                    <div class="mt-5 gap-3 flex justify-end items-end ">
                        <button class="size-12 rounded-md duration-300 hover:opacity-50 dark:bg-[#292c3c] bg-[#dce0e8]">
                            <i class="text-xl ri-check-line"></i>
                        </button>
                        <button class="size-12 rounded-md duration-300 hover:opacity-50 dark:bg-[#292c3c] bg-[#dce0e8]">
                            <i class="ri-close-large-line"></i>
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>


<script>

import {id} from "postcss-selector-parser";
export default {
    name: "Dashboard",
    methods: {id},
    props:{
        user: Object,
        tasks: Array,
    },
    data(){
        return {
            searchQuery: "",

        }
    },
    computed: {
        // Фильтрация задач на основе введенного текста
        filteredTasks() {
            const query = this.searchQuery.toLowerCase(); // Приведение строки поиска к нижнему регистру
            return this.tasks.filter((task) =>
                task.nameTask.toLowerCase().includes(query) // Проверяем, содержит ли название задачи строку поиска
            );
        },
    }
}
</script>

