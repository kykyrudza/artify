
<template>
    <Tasks :tasks="tasks" :user="user"/>
</template>

<script>
import Tasks from "../Components/Tasks.vue";
export default {
    name: "Dashboard",
    props:{
        user: Object,
        tasks: Array,
    },
    components: {
        Tasks
    }
}
</script>

