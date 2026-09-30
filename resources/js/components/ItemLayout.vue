<script lang="ts" setup>
import ToggleBookmark from "@/components/ToggleBookmark.vue"
import {Items} from "@/types/library"
import {Link} from "@inertiajs/vue3";
import movieicon from "@/components/icons/MovieIcon.vue";
import tvicon from "@/components/icons/TVIcon.vue";

interface Props {
    items: Array<Items>;
}

defineProps<Props>();

</script>

<template>
    <div class="gap-6 w-full grid grid-cols-4 mt-2">
        <div v-for="item in items" :key="item.id"
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
</template>
