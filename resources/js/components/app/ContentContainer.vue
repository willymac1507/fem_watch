<script lang="ts" setup>

import {Head} from "@inertiajs/vue3";
import SearchForm from "@/components/SearchForm.vue";
import {useAttrs} from "vue";

interface Props {
    title: string;
    searchValue: string;
    category?: string;
}


defineProps<Props>();
const attrs = useAttrs();

</script>

<template>
    <Head title="Home"/>

    <div id="container"
         class="max-h-[calc(100vh-64px)] my-8 flex flex-1 flex-col gap-4 overflow-x-auto rounded-xl pe-4 pb-8 pt-12"
         v-bind="attrs"
    >
        <SearchForm :category="category" :search-value="searchValue"/>
        <slot/>
    </div>
</template>

<style scoped>

</style>
