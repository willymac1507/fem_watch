<script lang="ts" setup>
import {Head} from '@inertiajs/vue3';
import {home} from '@/routes';
import {Input} from "@/components/ui/input";
import searchIcon from "@/components/SearchIcon.vue";
import {Toaster} from "@/components/ui/sonner";
import {computed, Reactive, useAttrs, watch} from "vue";
import {toast} from "vue-sonner";
import TrendingSection from "@/components/TrendingSection.vue";
import RecommendedSection from "../components/RecommendedSection.vue";

interface Flash {
    success: string | null | undefined;
    error: string | null | undefined;
    warning: string | null | undefined;
}

interface Props {
    library: Array<items>;
    flash: Reactive<Flash>;
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

const trending = computed(() => {
    return props.library.filter(item => item.trending);
});

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

function submit() {
    alert('submit');
}
</script>


<template>
    <Head title="Home"/>

    <div class="my-8 flex flex-1 flex-col gap-4 overflow-x-auto rounded-xl pe-4 pb-8 pt-12"
         v-bind="attrs"
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

        <TrendingSection :trending="trending" class="mb-4"/>
        <RecommendedSection/>
        <Toaster/>
    </div>
</template>
