<script lang="ts" setup>
import {home} from '@/routes';
import {computed, Reactive} from "vue";
import FilteredSection from "@/components/FilteredSection.vue";
import ContentContainer from "@/components/app/ContentContainer.vue";
import {Flash, Items} from "@/types/library";
import MoviesSection from "@/components/MoviesSection.vue";

interface Props {
    movies?: Array<Items>;
    flash: Reactive<Flash>;
    filtered?: Array<Items>;
    search?: string;
}

const props = defineProps<Props>();

const searchValue = computed(() => {
    return props.search ?? ''
});

const movies = computed(() => {
    return props.movies ? props.movies : [];
})

console.log(searchValue.value);

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

</script>


<template>
    <ContentContainer :search-value="searchValue" category="movies" title="Movies">

        <div class="scroll-fade-y scrollbar-none overflow-y-auto h-full">

            <MoviesSection :movies="movies"/>

            <FilteredSection v-if="filtered"
                             :filter="searchValue"
                             :filtered="filtered"
            />
        </div>

    </ContentContainer>
</template>
