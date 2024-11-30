<template>

    <div class="h-full">
        <Header :auth="auth"/>
    </div>
    <div class="h-full px-10">
        <slot/>
    </div>
</template>

<script>

import {defineComponent} from "vue";
import Header from "@/Layouts/Header.vue";

export default defineComponent({
    components: {Header},
    props: {
        auth: {
            type: Object,
            required: true
        }
    }
})
</script>
