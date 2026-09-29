<script lang="ts" setup>

interface Props {
    heading: string;
}

defineProps<Props>();

</script>

<template>
    <div class="flex flex-col w-full max-w-screen">
        <h2 class="text-heading-l">{{ heading }}</h2>
        <slot/>
    </div>
</template>

<style scoped>

</style>

