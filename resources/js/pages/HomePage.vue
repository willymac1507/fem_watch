<script lang="ts" setup>
import {Head, router} from '@inertiajs/vue3';
import {home} from '@/routes';
import {Input} from "@/components/ui/input";
import searchIcon from "@/components/SearchIcon.vue";
import {Toaster} from "@/components/ui/sonner";
import {computed, Reactive, ref, useAttrs, watch} from "vue";
import {toast} from "vue-sonner";
import TrendingSection from "@/components/TrendingSection.vue";
import RecommendedSection from "@/components/RecommendedSection.vue";
import MovieIcon from "@/components/icons/MovieIcon.vue";
import TVIcon from "@/components/icons/TVIcon.vue";
import FilteredSection from "@/components/FilteredSection.vue";
import debounce from "lodash/debounce";

interface Flash {
    success: string | null | undefined;
    error: string | null | undefined;
    warning: string | null | undefined;
}

interface Props {
    library: Array<items>;
    flash: Reactive<Flash>;
    filtered: items[];
    search?: string;
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

const attrs = useAttrs();

const props = defineProps<Props>();
const searchValue = ref(props.search ?? '')
const trending = computed(() => {
    return props.library ? props.library.filter(item => item.trending) : [];
});

const recommended = computed(() => {
    return props.library ? props.library.filter(item => !item.trending) : [];
});

const showTrending = computed(() => {
    return trending.value.length > 0 && props.filtered.length === 0;
});

const showRecommended = computed(() => {
    return !props.filtered;
})

watch(() => props.flash.success, (message) => {
    if (!message) return;
    toast.success(message);
})

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

const submit = debounce(() => {
    router.get('/home', {
        search: searchValue.value,
        preserveState: true,
    });
}, 500)
</script>


<template>
    <Head title="Home"/>

    <div id="container"
         class="max-h-[calc(100vh-64px)] my-8 flex flex-1 flex-col gap-4 overflow-x-auto rounded-xl pe-4 pb-8 pt-12"
         v-bind="attrs"
    >
        <form @submit.prevent="submit">
            <label class="flex items-center gap-2" for="search">
                <component :is="searchIcon"></component>
                <Input v-model="searchValue"
                       class="text-heading-m placeholder:text-heading-m border-0"
                       name="search"
                       placeholder="Search for movies or TV series"
                       type="text"
                       @input="submit"/>
            </label>

        </form>


        <div class="scroll-fade-y scrollbar-none overflow-y-auto h-full">
            <TrendingSection
                v-if="showTrending"
                :movieicon="MovieIcon"
                :trending="trending"
                :tvicon="TVIcon"
                class="mb-4"/>
            <RecommendedSection
                v-if="showRecommended"
                :movieicon="MovieIcon"
                :recommended="recommended"
                :tvicon="TVIcon"
            />
            <FilteredSection v-if="filtered"
                             :filter="searchValue"
                             :filtered="props.filtered"
                             :movieicon="MovieIcon"
                             :tvicon="TVIcon"/>
        </div>
        <Toaster/>

    </div>
</template>
