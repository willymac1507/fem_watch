<script lang="ts" setup>
import {Link} from '@inertiajs/vue3';
import AppLogo from '@/components/AppLogo.vue';
import GridIcon from '@/components/GridIcon.vue';
import MovieIcon from './MovieIcon.vue';
import TvIcon from './TVIcon.vue';
import BookmarkIcon from '@/components/BookmarkIcon.vue';
import NavMain from '@/components/NavMain.vue';
import NavUser from '@/components/NavUser.vue';
import {
    Sidebar,
    SidebarContent,
    SidebarFooter,
    SidebarHeader,
    SidebarMenu,
    SidebarMenuButton,
    SidebarMenuItem,
} from '@/components/ui/sidebar';
import {home} from '@/routes';
import type {NavItem} from '@/types';

const mainNavItems: NavItem[] = [
    {
        title: 'Home',
        href: home(),
        icon: GridIcon,
    },
    {
        title: 'Films',
        href: {method: 'get', url: '/films'},
        icon: MovieIcon,
    },
    {
        title: 'TV',
        href: {method: 'get', url: '/tv'},
        icon: TvIcon,
    },
    {
        title: 'Bookmarks',
        href: {method: 'get', url: '/bookmarks'},
        icon: BookmarkIcon,
    },
];

</script>

<template>
    <Sidebar collapsible="none" variant="floating">
        <SidebarHeader class="mt-8 mb-14">
            <SidebarMenu>
                <SidebarMenuItem>
                    <SidebarMenuButton as-child class="bg-transparent" size="lg">
                        <Link :href="home()">
                            <AppLogo/>
                        </Link>
                    </SidebarMenuButton>
                </SidebarMenuItem>
            </SidebarMenu>
        </SidebarHeader>

        <SidebarContent>
            <NavMain :items="mainNavItems"/>
        </SidebarContent>

        <SidebarFooter>
            <NavUser/>
        </SidebarFooter>
    </Sidebar>
    <slot/>
</template>
