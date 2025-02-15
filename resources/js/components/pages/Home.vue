<template>
<div class="ml-10 mt-10">
    <Button label="Click" @click="test()"/>
</div>
</template>

<script setup>
import Button from "primevue/button";
import store from "../../store.js";

function test() {
    store.dispatch("test/indexTest");
}
</script>

<style scoped>

</style>
