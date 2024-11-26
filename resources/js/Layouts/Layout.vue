<template>
    <div>
        <Header :auth="auth"/>
        <slot />
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
