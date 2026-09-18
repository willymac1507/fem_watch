<script lang="ts" setup>
import {usePage} from '@inertiajs/vue3';
import AppLogoIcon from '@/components/AppLogoIcon.vue';

const name = usePage().props.name;
</script>

<template>
    <div
        class="bg-transparent text-sidebar-primary-foreground flex aspect-square size-8 items-center justify-center rounded-md"
    >
        <AppLogoIcon class="size-5 fill-current text-white dark:text-black"/>
    </div>
</template>
