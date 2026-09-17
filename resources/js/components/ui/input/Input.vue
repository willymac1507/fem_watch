<script setup lang="ts">
import type { HTMLAttributes } from "vue"
import { useVModel } from "@vueuse/core"
import { cn } from "@/lib/utils"

const props = defineProps<{
  defaultValue?: string | number
  modelValue?: string | number
  class?: HTMLAttributes["class"]
}>()

const emits = defineEmits<{
  (e: "update:modelValue", payload: string | number): void
}>()

const modelValue = useVModel(props, "modelValue", emits, {
  passive: true,
  defaultValue: props.defaultValue,
})
</script>

<template>
  <input
    v-model="modelValue"
    data-slot="input"
    :class="cn(
      'placeholder:text-app-icon-inactive placeholder:text-sm selection:bg-primary selection:text-primary-foreground selection:text-heading-s dark:bg-transparent',
                'w-full border-b border-b-app-icon-inactive p-3 caret-app-primary',
      'focus-visible:outline-none focus-visible:border-app-icon-active focus-visible:ring-0 disabled:cursor-not-allowed disabled:opacity-50',
      props.class,
    )"
  >
</template>
