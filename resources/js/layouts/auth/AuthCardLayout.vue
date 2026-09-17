<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import AppLogoIcon from '@/components/AppLogoIcon.vue';
import {
    Card,
    CardContent,
    CardDescription,
    CardHeader,
    CardTitle,
} from '@/components/ui/card';
import { home } from '@/routes';

defineProps<{
    title?: string;
    description?: string;
}>();
</script>

<template>
    <div
        class="bg-app-background flex min-h-svh flex-col items-center justify-center gap-6 p-6 md:p-10"
    >
        <div class="flex w-full max-w-md flex-col gap-6">
            <Link
                :href="home()"
                class="flex items-center gap-2 self-center font-medium"
            >
                <div class="flex h-9 w-9 items-center justify-center mb-8">
                    <AppLogoIcon
                        class="size-9 fill-current text-black dark:text-white"
                    />
                </div>
            </Link>

            <div class="flex flex-col gap-6">
                <Card class="rounded-2xl">
                    <CardHeader class="px-10 pt-6 pb-0 text-left">
                        <CardTitle class="text-heading-l font-normal">{{ title }}</CardTitle>
                        <CardDescription>
                            {{ description }}
                        </CardDescription>
                    </CardHeader>
                    <CardContent class="px-10 py-2">
                        <slot />
                    </CardContent>
                </Card>
            </div>
        </div>
    </div>
</template>
