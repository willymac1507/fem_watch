<script lang="ts" setup>
import {Link} from '@inertiajs/vue3';
import AppLogo from '@/components/AppLogo.vue';
import GridIcon from '@/components/GridIcon.vue';
import FilmIcon from '@/components/FilmIcon.vue';
import TvIcon from '@/components/TvIcon.vue';
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
import {dashboard} from '@/routes';
import type {NavItem} from '@/types';

const mainNavItems: NavItem[] = [
    {
        title: 'Dashboard',
        href: dashboard(),
        icon: GridIcon,
    },
    {
        title: 'Films',
        href: {method: 'get', url: '/films'},
        icon: FilmIcon,
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
        <SidebarHeader class="mt-8 mb-16">
            <SidebarMenu>
                <SidebarMenuItem>
                    <SidebarMenuButton as-child class="bg-transparent" size="lg">
                        <Link :href="dashboard()">
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
