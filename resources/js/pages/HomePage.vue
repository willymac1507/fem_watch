<script lang="ts" setup>
import {home} from '@/routes';
import {computed, Reactive} from "vue";
import TrendingSection from "@/components/TrendingSection.vue";
import RecommendedSection from "@/components/RecommendedSection.vue";
import FilteredSection from "@/components/FilteredSection.vue";
import ContentContainer from "@/components/app/ContentContainer.vue";
import {Flash, Items} from "@/types/library"


interface Props {
    library?: Array<Items>;
    flash: Reactive<Flash>;
    filtered?: Array<Items>;
    search?: string;
}

const props = defineProps<Props>();
const searchValue = computed(() => {
    return props.search ?? ''
});
const trending = computed(() => {
    return props.library ? props.library.filter(item => item.trending) : [];
});

const recommended = computed(() => {
    return props.library ? props.library.filter(item => !item.trending) : [];
});

const showTrending = computed(() => {
    if (props.filtered) {
        return trending.value.length > 0 && props.filtered.length === 0;
    } else {
        return trending.value.length > 0;
    }

});

const showRecommended = computed(() => {
    return !props.filtered;
});

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
    <ContentContainer :search-value="searchValue" title="Home">

        <div class="scroll-fade-y scrollbar-none overflow-y-auto h-full">
            <TrendingSection
                v-if="showTrending"
                :trending="trending"
                class="mb-4"/>
            <RecommendedSection
                v-if="showRecommended"
                :recommended="recommended"
            />
            <FilteredSection v-if="filtered"
                             :filter="searchValue"
                             :filtered="filtered"
            />
        </div>

    </ContentContainer>
</template>
