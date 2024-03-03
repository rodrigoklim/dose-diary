<script setup lang="ts"></script>

<template>
  <div class="flex flex-row items-center justify-center min-h-screen">
    <div class="flex w-full items-center justify-center">
      <img alt="dosediary" src="../../assets/img/logo.png" />
    </div>
    <div class="flex bg-primary w-full min-h-screen items-center justify-center">
      <slot />
    </div>
  </div>
</template>
