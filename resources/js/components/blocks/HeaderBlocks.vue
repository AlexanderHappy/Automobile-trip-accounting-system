<template>
    <header class="grid grid-cols-3 gap-5 px-10 py-2">
        <BlockStats :title="EnumHeaderBlocks.TOTAL_TRIPS" :value="store.getters['autoTrips/GET_TOTAL_TRIPS']"/>
        <BlockStats :title="EnumHeaderBlocks.TOTAL_VOLUME" :value="store.getters['autoTrips/GET_TOTAL_VOLUME']"/>
        <BlockStats :title="EnumHeaderBlocks.TOTAL_CONSUMPTION" :value="store.getters['autoTrips/GET_TOTAL_CONSUMPTION']"/>
    </header>
</template>

<script setup lang="ts">
import BlockStats from "@/components/blocks/BlockStats.vue";
import store from "@/store.ts";
import EnumHeaderBlocks from "@/langs/en/HeaderBlocks.ts";
</script>
