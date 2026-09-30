<script lang="ts" setup>
import SectionLayout from "@/components/SectionLayout.vue";
import ItemLayout from "@/components/ItemLayout.vue";
import {Items} from "@/types/library";

interface Props {
    series: Array<Items>;
}


defineProps<Props>();
</script>

<template>
    <SectionLayout heading="TV Series">
        <ItemLayout :items="series"/>
    </SectionLayout>

</template>

