
<template>
    <div class="w-full gap-5 flex">
        <div class="w-1/2">
            <pre>{{user}}</pre>
        </div>
        <div class="w-1/2">
            <pre>{{tasks}}</pre>
        </div>
    </div>


</template>

<script>
export default {
    name: "Dashboard",
    props:{
        user: Object,
        tasks: Object
    }
}
</script>
