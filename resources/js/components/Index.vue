<template>
    <component :is="layout">
        <router-view />
    </component>
</template>
<script lang="ts" setup>
import {computed} from "vue"
import {useRoute} from "vue-router"
import {useStore} from "vuex";

// eslint-disable-next-line @typescript-eslint/typedef
const route = useRoute()
// eslint-disable-next-line @typescript-eslint/typedef,@typescript-eslint/no-unused-vars
const store = useStore();

// eslint-disable-next-line @typescript-eslint/typedef
const layout = computed(() => {
    return route.meta.layout
})
</script>
