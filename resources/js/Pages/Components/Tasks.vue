
<template>

    <div class="flex w-full justify-center md:justify-end mt-12 mb-5">
        <input
            v-model="searchQuery"
            type="text"
            class="mt-12 w-full dark:bg-[#232634] border dark:border-none dark:text-white focus:border-gray-400 outline-none text-[#181926] rounded-md py-2 px-4"
            placeholder="Search tasks..."
        />
    </div>
    <div v-auto-animate class=" grid pb-14 grid-cols-1 sm:grid-cols-2 gap-12 lg:grid-cols-3 w-full">
        <div v-for="(task, index) in filteredTasks" :key="index" class="task-card bg-[#eff1f5] dark:bg-[#232634] mx-auto my-6 p-4 rounded-md shadow-md cursor-pointer relative duration-300 max-h-64 h-full w-full max-w-[120rem]"
        >
            <div class="h-3/5">
                <div class="relative">
                    <h1 class="absolute right-0 left-0 -top-10 size-9 bg-[#a6d189] text-[#1e2030] font-bold outline outline-8 outline-[#dce0e8] dark:outline-[#292c3c] rounded-full grid place-items-center">{{ task.id }}</h1>
                </div>

                <h3 class="text-lg my-3 font-bold text-[#179299] dark:text-[#81c8be]">
                    {{ task.nameTask }}
                </h3>
                <p class="text-sm text-[#303446] dark:text-gray-300 mb-4">
                    <strong class="pr-1">Description:</strong> {{ task.descriptionTask }}
                </p>
            </div>
            <div class="h-2/5 flex justify-between items-center">
                <div class="flex items-center justify-center">
                    <div class="block">
                        <p class="text-sm text-[#303446] dark:text-gray-300">
                            <strong>Due Date:</strong> {{ task.dueDateTask }}
                        </p>
                        <p class="text-sm text-[#303446] dark:text-gray-300">
                            <strong>Completed:</strong> {{ task.completedTask ? "Yes" : "No" }}
                        </p>
                    </div>
                </div>
                <div class="flex justify-end items-end ">
                    <Link
                        v-if="!task.completedTask"
                        :href="route('task.completed', task.id)"
                        method="post"
                        as="button"
                        :data="{id: task.id}">
                        <i
                            class="text-xl flex items-center justify-center size-12 rounded-md duration-300 hover:opacity-50 dark:bg-[#292c3c] bg-[#dce0e8] ri-check-line" />
                    </Link>
                    <div v-else class="flex items-center justify-center gap-x-3">
                        <Link
                            :href="route('task.delete', task.id)"
                            method="post"
                            as="button"
                            :data="{id: task.id}">
                            <i class="text-xl flex items-center text-white justify-center size-12 rounded-md duration-300 hover:opacity-50 dark:bg-red-700 bg-red-600 ri-delete-bin-5-line"></i>
                        </Link>
                        <Link
                            :href="route('task.completed', task.id)"
                            method="post"
                            as="button"
                            :data="{id: task.id}">
                            <i class="text-xl flex items-center justify-center size-12 rounded-md duration-300 hover:opacity-60 dark:bg-[#292c3c] bg-[#dce0e8] ri-close-large-line"></i>
                        </Link>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
import {Link} from "@inertiajs/vue3";
import {id} from "postcss-selector-parser";

export default {
    name: "Tasks" ,
    components: {Link},
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
        filteredTasks() {
            const query = this.searchQuery.toLowerCase();
            return this.tasks.filter((task) =>
                task.nameTask.toLowerCase().includes(query)
            );
        },
    }
}
</script>
