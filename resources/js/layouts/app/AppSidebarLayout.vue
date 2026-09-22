<script lang="ts" setup>
import AppContent from '../../components/app/AppContent.vue';
import AppShell from '../../components/app/AppShell.vue';
import AppSidebar from '../../components/app/AppSidebar.vue';
import {Toaster} from '@/components/ui/sonner';
import type {BreadcrumbItem} from '@/types';

type Props = {
    breadcrumbs?: BreadcrumbItem[];
};

withDefaults(defineProps<Props>(), {
    breadcrumbs: () => [],
});
</script>

<template>
    <AppShell variant="sidebar">
        <AppSidebar/>
        <AppContent class="min-w-0 overflow-x-clip" variant="sidebar">
            <slot/>
        </AppContent>
        <Toaster/>
    </AppShell>
</template>
