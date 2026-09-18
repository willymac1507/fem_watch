<script lang="ts" setup>
import {Head} from '@inertiajs/vue3';
import {home} from '@/routes';
import {Input} from "@/components/ui/input";
import searchIcon from "@/components/SearchIcon.vue";

interface Props {
    library: Object;
}

const props = defineProps<Props>();


defineOptions({
    layout: {
        breadcrumbs: [
            {
                title: 'Home',
                href: home(),
            },
        ],
    },
});

function submit() {
    alert('submit');
}
</script>

<template>
    <Head title="Home"/>

    <div
        class="m-8 bg-app-card flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-4 pt-12"
    >
        <form action="/search/all" method="post" @submit.prevent="submit">
            <label class="flex items-center gap-2" for="search">
                <component :is="searchIcon"></component>
                <Input :change="submit"
                       class="text-heading-m placeholder:text-heading-m border-0"
                       name="search"
                       placeholder="Search for movies or TV series"
                       type="text"/>
            </label>

        </form>

        <div class="w-full max-w-screen bg-app-icon-inactive size-fit">
            <h2 class="text-heading-l">Trending</h2>
            <div class="w-full h-4/5 flex flex-row gap-4 overflow-x-scroll">
                <div v-for="item in library" class="h-full grow">
                    <img :src="item.thumb_trending_large" alt="" class="h-full"/>
                </div>
            </div>
        </div>
        <!--        <div class="grid auto-rows-min gap-4 md:grid-cols-3">-->
        <!--            <div-->
        <!--                class="border-sidebar-border/70 dark:border-sidebar-border relative aspect-video overflow-hidden rounded-xl border"-->
        <!--            >-->
        <!--                <PlaceholderPattern/>-->
        <!--            </div>-->
        <!--            <div-->
        <!--                class="border-sidebar-border/70 dark:border-sidebar-border relative aspect-video overflow-hidden rounded-xl border"-->
        <!--            >-->
        <!--                <PlaceholderPattern/>-->
        <!--            </div>-->
        <!--            <div-->
        <!--                class="border-sidebar-border/70 dark:border-sidebar-border relative aspect-video overflow-hidden rounded-xl border"-->
        <!--            >-->
        <!--                <PlaceholderPattern/>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--        <div-->
        <!--            class="border-sidebar-border/70 dark:border-sidebar-border relative min-h-[100vh] flex-1 rounded-xl border md:min-h-min"-->
        <!--        >-->
        <!--            <PlaceholderPattern/>-->
        <!--        </div>-->
    </div>
</template>
