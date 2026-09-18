<script lang="ts" setup>
import {Link} from '@inertiajs/vue3';
import {SidebarGroup, SidebarMenu, SidebarMenuButton, SidebarMenuItem,} from '@/components/ui/sidebar';
import {useCurrentUrl} from '@/composables/useCurrentUrl';
import type {NavItem} from '@/types';

const props = defineProps<{
    items: NavItem[];
}>();
console.log(props.items)
const {isCurrentUrl} = useCurrentUrl();
</script>

<template>
    <SidebarGroup class="px-2 py-0">
        <SidebarMenu class="gap-8">
            <SidebarMenuItem v-for="item in items" :key="item.title">
                <SidebarMenuButton
                    :is-active="isCurrentUrl(item.href)"
                    :tooltip="item.title"
                    as-child
                >
                    <Link :href="item.href">
                        <component :is="item.icon"
                                   :class="isCurrentUrl(item.href) ? 'text-app-icon-active' : 'text-app-icon-inactive'"
                                   class="!size-6 hover:text-app-primary hover:bg-transparent"
                        />
                    </Link>
                </SidebarMenuButton>
            </SidebarMenuItem>
        </SidebarMenu>
    </SidebarGroup>
</template>

