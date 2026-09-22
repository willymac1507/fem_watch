<script lang="ts" setup>

import {Link} from "@inertiajs/vue3";
import movieIcon from "@/components/icons/MovieIcon.vue";
import tvIcon from "@/components/icons/TVIcon.vue";
import ToggleBookmark from "./ToggleBookmark.vue";

interface Props {
    trending: Array<items>;
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
const movieicon = movieIcon;
const tvicon = tvIcon;

</script>

<template>
    <div class="flex flex-col w-full max-w-screen h-1/4">
        <h2 class="text-heading-l">Trending</h2>
        <div class="w-full overflow-hidden flex-1 min-h-0">
            <div class="scroll-fade-x scrollbar-none overflow-x-auto h-full">
                <div class="flex w-max h-full gap-8 p-1.5">
                    <div
                        v-for="item in trending"
                        :key="item.id"
                        class="h-full shrink-0 relative">
                        <Link :href="'/library/item/' + item.id">
                            <img :src="item.thumb_trending_large" alt=""
                                 class="rounded-lg block h-full w-auto">
                            <div class="hidden absolute inset-3 lg:flex flex-col justify-end shrink">
                                <div class="text-body-m opacity-60 flex flex-row gap-2 align-middle">
                                    <div class="with-bullet">{{ item.year }}</div>
                                    <div class="my-auto h-3 w-3">
                                        <component :is="item.category === 'Movie' ? movieicon : tvicon"
                                        />
                                    </div>

                                    <div class="with-bullet">{{ item.category }}</div>
                                    <div>{{ item.rating }}</div>
                                </div>
                                <div class="text-heading-m">
                                    {{ item.title }}
                                </div>
                            </div>
                        </Link>
                        <ToggleBookmark
                            :item="item"/>
                    </div>
                </div>

            </div>

        </div>
    </div>
</template>
