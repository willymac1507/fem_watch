<script lang="ts" setup>
import {Link} from "@inertiajs/vue3";
import ToggleBookmark from "@/components/ToggleBookmark.vue";
import tvicon from "@/components/icons/TVIcon.vue";
import movieicon from "@/components/icons/MovieIcon.vue";
import SectionLayout from "@/components/SectionLayout.vue";

interface Props {
    recommended: Array<items>;
}

interface items {
    id: number;
    title: string;
    thumb_trending_large: string;
    thumb_trending_small: string;
    thumb_large: string;
    thumb_small: string;
    thumb_medium: string;
    year: number;
    category: string;
    rating: string;
    bookmarked: boolean;
    trending: boolean;
}

defineProps<Props>();

</script>

<template>
    <SectionLayout heading="Recommended">
        <div class="gap-6 w-full grid grid-cols-4 mt-2">
            <div v-for="item in recommended" :key="item.id"
                 class="relative flex flex-col gap-1">
                <div></div>
                <Link :href="'/library/item/' + item.id">
                    <img :src="item.thumb_medium" alt="" class="rounded-lg"/>
                    <div class="mt-2 opacity-60 text-body-s flex flex-row gap-1.5 align-middle">
                        <div class="with-bullet">{{ item.year }}</div>
                        <div class="my-auto h-3 w-3">
                            <component :is="item.category === 'Movie' ? movieicon : tvicon"
                            />
                        </div>
                        <div class="with-bullet">{{ item.category }}</div>
                        <div>{{ item.rating }}</div>
                    </div>
                    <div class="text-body-l">{{ item.title }}</div>
                </Link>
                <ToggleBookmark :item="item"/>
            </div>
        </div>
    </SectionLayout>


</template>

<style scoped>

</style>
