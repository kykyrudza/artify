<template>

    <div class="h-screen w-full flex items-center justify-center">
        <div class="flex flex-col text-center space-y-7 items-center">
            <div>
                <h1 class="text-5xl font-bold">
                    Velora
                </h1>
            </div>

            <div>
                <h3>
                    Simple app for you tasks!
                </h3>
            </div>

            <div class="flex flex-col items-center gap-5 lg:flex-row">

                <Link :href="route('register')" class="button">
                    Register
                </Link>

                <p>
                    or
                </p>

                <Link :href="route('login')" class="button">
                    Login
                </Link>

            </div>
        </div>
    </div>

</template>

<script>

import { Link } from "@inertiajs/inertia-vue3";
import HomeLayout from "../../Layouts/HomeLayout.vue";
export default {
    name: 'Home',
    components: {
        Link,
    },
    layout: HomeLayout,
    props: {
        auth:{
            user: Object,
            default: null
        }
    }
}

</script>

<style>
/* From Uiverse.io by cssbuttons-io */
.button {
    --color: #a6d189;
    font-family: inherit;
    display: inline-block;
    width: 8em;
    height: 2.6em;
    line-height: 2.5em;
    margin: 20px;
    position: relative;
    cursor: pointer;
    overflow: hidden;
    border: 2px solid var(--color);
    transition: color 0.5s;
    z-index: 1;
    font-size: 17px;
    border-radius: 6px;
    font-weight: 500;
    color: var(--color);
}

.button:before {
    content: '';
    position: absolute;
    z-index: -1;
    background: var(--color);
    height: 150px;
    width: 200px;
    border-radius: 50%;
}

.button:hover {
    color: #fff;
}

.button:before {
    top: 100%;
    left: 100%;
    transition: all 0.7s;
}

.button:hover:before {
    top: -30px;
    left: -30px;
}

.button:active:before {
    background: #a6d189;
    transition: background 0s;
}
</style>
