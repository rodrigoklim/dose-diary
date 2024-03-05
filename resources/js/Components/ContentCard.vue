<script lang="ts" setup>
defineProps<{
  hasHeader?: boolean;
  title?: string;
}>();

defineEmits<{
  click: () => void;
}>();
</script>

<template>
  <div class="flex flex-col w-full rounded-lg border border-gray-300 bg-white">
    <template v-if="hasHeader">
      <div class="poppins-semibold p-6 flex w-full justify-between items-center">
        <span class="text-lg">{{ title }}</span>
        <span class="text-primary cursor-pointer" @click="$emit('click')">Editar</span>
      </div>
      <div class="poppins-regular p-6 flex w-full justify-between border-t border-gray-200">
        <slot></slot>
      </div>
    </template>
    <div v-else class="p-6 flex w-full justify-between items-center">
      <slot></slot>
    </div>
  </div>
</template>

<style scoped></style>
