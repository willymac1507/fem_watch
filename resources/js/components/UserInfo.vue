<script lang="ts" setup>
import {computed} from 'vue';
import {Avatar, AvatarFallback, AvatarImage} from '@/components/ui/avatar';
import {useInitials} from '@/composables/useInitials';
import type {User} from '@/types';

type Props = {
    user: User;
    showEmail?: boolean;
};

const props = withDefaults(defineProps<Props>(), {
    showEmail: false,
});

const {getInitials} = useInitials();

// Compute whether we should show the avatar image
const showAvatar = computed(
    () => props.user.avatar && props.user.avatar !== '',
);
</script>

<template>
    <Avatar class="h-8 w-8 overflow-hidden rounded-lg">
        <AvatarImage v-if="showAvatar" :alt="user.name" :src="user.avatar!"/>
        <AvatarFallback class="rounded-full text-black dark:text-white">
            {{ getInitials(user.name) }}
        </AvatarFallback>
    </Avatar>
</template>
