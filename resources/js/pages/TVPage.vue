<script lang="ts" setup>
import {home} from '@/routes';
import {computed, Reactive} from "vue";
import FilteredSection from "@/components/FilteredSection.vue";
import ContentContainer from "@/components/app/ContentContainer.vue";
import {Flash, Items} from "@/types/library";
import TvSection from "@/components/TvSection.vue";

interface Props {
    series?: Array<Items>;
    flash: Reactive<Flash>;
    filtered?: Array<Items>;
    search?: string;
}

const props = defineProps<Props>();

const searchValue = computed(() => {
    return props.search ?? ''
});

const series = computed(() => {
    return props.series ? props.series : [];
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
    <ContentContainer :search-value="searchValue" category="tv" title="TV Series">

        <div class="scroll-fade-y scrollbar-none overflow-y-auto h-full">

            <TvSection :series="series"/>

            <FilteredSection v-if="filtered"
                             :filter="searchValue"
                             :filtered="filtered"
            />
        </div>

    </ContentContainer>
</template>
