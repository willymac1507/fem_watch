<script lang="ts" setup>
import SectionLayout from "@/components/SectionLayout.vue";

interface Props {
    movies: Array<items>;
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
    <SectionLayout heading="Movies">
        <div v-for="movie in movies" :key="movie.id">
            <h2>{{ movie.title }}</h2>
        </div>
    </SectionLayout>

</template>

<style scoped>

</style>
