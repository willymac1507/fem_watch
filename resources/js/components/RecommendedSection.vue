<script lang="ts" setup>
import SectionLayout from "@/components/SectionLayout.vue";
import {Items} from "@/types/library"
import ItemLayout from "@/components/ItemLayout.vue";

interface Props {
    recommended: Array<Items>;
}

defineProps<Props>();

</script>

<template>
    <SectionLayout heading="Recommended">
        <ItemLayout :items="recommended"/>
    </SectionLayout>


</template>

<style scoped>

</style>
