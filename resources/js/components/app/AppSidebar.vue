<script lang="ts" setup>
import {Link} from '@inertiajs/vue3';
import AppLogo from '@/components/app/AppLogo.vue';
import NavMain from '@/components/nav/NavMain.vue';
import NavUser from '@/components/nav/NavUser.vue';
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
import HomeNavIcon from "../icons/HomeNavIcon.vue";
import MovieNavIcon from "../icons/MovieNavIcon.vue";
import TvNavIcon from "../icons/TvNavIcon.vue";
import BookmarkNavIcon from "../icons/BookmarkNavIcon.vue";

const mainNavItems: NavItem[] = [
    {
        title: 'Home',
        href: home(),
        icon: HomeNavIcon,
    },
    {
        title: 'Films',
        href: {method: 'get', url: '/films'},
        icon: MovieNavIcon,
    },
    {
        title: 'TV',
        href: {method: 'get', url: '/tv'},
        icon: TvNavIcon,
    },
    {
        title: 'Bookmarks',
        href: {method: 'get', url: '/bookmarks'},
        icon: BookmarkNavIcon,
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
