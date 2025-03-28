<template>
    <component :is="layout">
        <router-view />
    </component>
</template>
<script lang="ts" setup>
import {computed} from "vue"
import {useRoute} from "vue-router"
import {useStore} from "vuex";
import type {State} from "@/store.ts";

const route = useRoute()
const store = useStore();

const layout = computed(() => {
    return route.meta.layout
})
</script>
