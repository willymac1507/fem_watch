<script lang="ts" setup>
import {Input} from "@/components/ui/input";
import {nextTick, Ref, ref} from "vue";
import searchIcon from "@/components/SearchIcon.vue";
import debounce from "lodash/debounce";
import {router} from "@inertiajs/vue3";


interface Props {
    searchValue: string;
    category?: string;
}

const props = defineProps<Props>();

let url;

switch (props.category) {
    default:
        url = '/home';
        break;
    case 'movies':
        url = '/movies';
        break;
    case 'tv':
        url = '/tv-series';
        break;
    case 'bookmarks':
        url = '/bookmarks';
        break;
}

const searchInput: Ref = ref();

const searchText: Ref = ref(props.searchValue);

const submit = debounce(() => {
    router.get(url, {
        search: searchText.value,
    }, {
        preserveState: true,
        onSuccess: async () => {
            await nextTick();
            searchInput.value?.focus()
        }
    });
}, 500)

let placeholderText: string;

switch (props.category) {
    default:
        placeholderText = 'Search for movies or TV series';
        break;
    case 'movies':
        placeholderText = 'Search for movies';
        break;
    case 'tv':
        placeholderText = 'Search for TV series';
        break;
}

</script>

<template>
    <form @submit.prevent="submit">
        <label class="flex items-center gap-2" for="search">
            <component :is="searchIcon"></component>
            <Input id="search"
                   ref="searchInput"
                   v-model="searchText"
                   :placeholder="placeholderText"
                   class="text-heading-m placeholder:text-heading-m border-0"
                   name="search"
                   type="text"
                   @input="submit"/>
        </label>

    </form>
</template>
