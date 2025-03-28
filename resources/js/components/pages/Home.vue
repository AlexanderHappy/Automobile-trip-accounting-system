<template>
<div class="ml-10 mt-10">
    Home

  <Button
      label="Submit"
      @click="test()"
  />
    {{ans}}
</div>
</template>

<script lang="ts" setup>
import Button from "primevue/button";
import {ref} from "vue";


const ans: number = ref(42);

function test(): string {
    ans.value++
    return 1;
}
</script>

