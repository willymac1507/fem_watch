<script lang="ts" setup>
import {toggleBookmarked} from "@/composables/bookmarks";
import BookmarkFullIcon from "@/components/icons/BookmarkFullIcon.vue";
import BookmarkEmptyIcon from "@/components/icons/BookmarkEmptyIcon.vue";

defineProps({
    item: Object,
})
</script>

<template>
    <div v-if="item" class="absolute top-3 right-3 flex flex-col justify-top items-end">
        <button class="z-10 cursor-crosshair" @click="toggleBookmarked(item.id)">
            <component :is="item.bookmarked ? BookmarkFullIcon : BookmarkEmptyIcon"/>
        </button>

    </div>
</template>
