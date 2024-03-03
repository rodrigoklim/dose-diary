<script lang="ts" setup>
import { MenuItem, menu } from "@/Components/MenuDrawer/menu";
import { ref } from "vue";

const menuitems = ref<MenuItem[]>(menu);

const drawerOpen = ref(true);
const itemSelected = ref(null);
const childrenDrawerOpen = ref(false);

const selectMenu = (item) => {
  itemSelected.value = item;
  childrenDrawerOpen.value = true;
};

const showTooltip = ref([]);
const toggleDrawer = () => {
  drawerOpen.value = !drawerOpen.value;
};

const closeChildrenDrawer = () => {
  childrenDrawerOpen.value = false;
};
</script>

<template>
  <div class="flex">
    <div class="w-16 h-screen bg-primary p-2 flex justify-center">
      <ul>
        <li v-for="(item, index) in menuitems" :key="item.label" class="relative my-2">
          <button
            class="flex items-center p-2 rounded-md text-gray-700 hover:bg-gray-300 w-full"
            :class="itemSelected?.label === item.label && childrenDrawerOpen ? 'bg-secondary rounded-lg' : ''"
            @click="selectMenu(item)"
            @mouseenter="showTooltip[index] = true"
            @mouseleave="showTooltip[index] = false"
          >
            <span class="material-symbols-outlined text-white text-3xl">
              {{ item.icon }}
            </span>
          </button>
          <transition name="fade" mode="out-in">
            <span
              v-if="showTooltip[index] && !childrenDrawerOpen"
              class="absolute whitespace-nowrap bg-gray-600 text-white text-lg py-2 px-4 left-16 rounded-md ml-2 z-10"
              style="top: 50%; transform: translateY(-50%)"
            >
              {{ item.label }}
            </span>
          </transition>
        </li>
      </ul>
    </div>
    <div
      class="bg-white flex-1 p-5 transition-width duration-300 relative"
      :class="childrenDrawerOpen ? 'w-64' : 'w-0 opacity-0'"
    >
      <button
        class="p-2 flex items-center justify-center rounded-full bg-primary text-white absolute top-26 -right-5"
        @click="closeChildrenDrawer"
      >
        <span class="material-symbols-outlined">chevron_left</span>
      </button>
      <!-- Content for the selected menu item -->
      <div>Selected: {{ itemSelected?.label }}</div>
    </div>
  </div>
</template>

<style scoped>
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.3s ease;
}

.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}
</style>
