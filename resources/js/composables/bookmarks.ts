import {router} from "@inertiajs/vue3";

export function toggleBookmarked(id: number) {
    router.post('/library/toggle-bookmark', {id: id});
}
