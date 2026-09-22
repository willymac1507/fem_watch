<script lang="ts" setup>
import type {HTMLAttributes} from 'vue';

defineOptions({
    inheritAttrs: false,
});

type Props = {
    className?: HTMLAttributes['class'];
};

defineProps<Props>();
</script>

<template>
    <svg height="14" width="12" xmlns="http://www.w3.org/2000/svg">
        <path d="m10.518.75.399 12.214-5.084-4.24-4.535 4.426L.75 1.036l9.768-.285Z" fill="none" stroke="currentColor"
              stroke-width="1.5"/>
    </svg>
</template>

<style scoped>

</style>
