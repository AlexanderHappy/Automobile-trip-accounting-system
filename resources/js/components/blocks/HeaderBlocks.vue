<template>
    <header class="grid grid-cols-3 gap-5 px-10 py-2">
        <BlockStats :title="'Total number of trips'" :value="store.getters['autoTrips/GET_TOTAL_TRIPS']"/>
        <BlockStats :title="'Total volume'" :value="store.getters['autoTrips/GET_TOTAL_VOLUME']"/>
        <BlockStats :title="'Total consumption'" :value="store.getters['autoTrips/GET_TOTAL_CONSUMPTION']"/>
    </header>
</template>

<script setup lang="ts">
import BlockStats from "@/components/blocks/BlockStats.vue";
import store from "@/store.ts";
</script>
