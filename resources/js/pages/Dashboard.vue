<script lang="ts" setup>
import {Head, Link, router, usePage} from '@inertiajs/vue3';
import {home} from '@/routes';
import {Input} from "@/components/ui/input";
import searchIcon from "@/components/SearchIcon.vue";
import movieIcon from "@/components/MovieIcon.vue";
import tvIcon from "@/components/TVIcon.vue";
import BookmarkEmptyIcon from "@/components/BookmarkEmptyIcon.vue";
import BookmarkFullIcon from "@/components/BookmarkFullIcon.vue";
import {Toaster} from "@/components/ui/sonner";
import {computed, Reactive, useAttrs, watch} from "vue";
import {toast} from "vue-sonner";

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
const page = usePage();

const movieicon = movieIcon;
const tvicon = tvIcon;
const props = defineProps<Props>();
const trending = computed(() => {
    return props.library.filter(item => item.trending);
});

watch(() => props.flash.success, (message) => {
    if (!message) return;
    toast.success(message);
    props.flash.success = null;
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

function toggleBookmarked(id: number) {
    router.post('/library/toggle-bookmark', {id: id});
}
</script>


<template>
    <Head title="Home"/>

    <div class="my-8 flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl pe-4 pt-12"
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
                                    <div class="text-body-m flex flex-row gap-2">
                                        <div>{{ item.year }}</div>
                                        <component :is="item.category === 'Movie' ? movieicon : tvicon"
                                                   class="text-xs"/>
                                        <div>{{ item.category }}</div>
                                        <div>{{ item.rating }}</div>
                                    </div>
                                    <div class="text-heading-m">
                                        {{ item.title }}
                                    </div>
                                </div>
                            </Link>
                            <div class="absolute top-3 right-3 flex flex-col justify-top items-end">
                                <button class="z-10 cursor-crosshair" @click="toggleBookmarked(item.id)">
                                    <component :is="item.bookmarked ? BookmarkFullIcon : BookmarkEmptyIcon"/>
                                </button>

                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <Toaster/>
        <!--        <div class="grid auto-rows-min gap-4 md:grid-cols-3">-->
        <!--            <div-->
        <!--                class="border-sidebar-border/70 dark:border-sidebar-border relative aspect-video overflow-hidden rounded-xl border"-->
        <!--            >-->
        <!--                <PlaceholderPattern/>-->
        <!--            </div>-->
        <!--            <div-->
        <!--                class="border-sidebar-border/70 dark:border-sidebar-border relative aspect-video overflow-hidden rounded-xl border"-->
        <!--            >-->
        <!--                <PlaceholderPattern/>-->
        <!--            </div>-->
        <!--            <div-->
        <!--                class="border-sidebar-border/70 dark:border-sidebar-border relative aspect-video overflow-hidden rounded-xl border"-->
        <!--            >-->
        <!--                <PlaceholderPattern/>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--        <div-->
        <!--            class="border-sidebar-border/70 dark:border-sidebar-border relative min-h-[100vh] flex-1 rounded-xl border md:min-h-min"-->
        <!--        >-->
        <!--            <PlaceholderPattern/>-->
        <!--        </div>-->
    </div>
</template>
