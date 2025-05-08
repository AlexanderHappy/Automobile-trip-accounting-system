<template>
    <article class="rounded-md shadow-lg overflow-hidden">
        <section class="w-full h-[2.2rem]  bg-[#ebf0f5] text-center flex items-center justify-center">
            <span>
                {{title}}
            </span>
        </section>
        <section class="h-[3rem] bg-[#f8fafc] text-center flex items-center justify-center">
            <p>
                {{ value }}
            </p>
        </section>
    </article>
</template>

<script setup lang="ts">

defineProps({
    title: {
        type: String,
        required: true,
    },
    value: {
        type: Number,
        required: true,
    }
});

</script>