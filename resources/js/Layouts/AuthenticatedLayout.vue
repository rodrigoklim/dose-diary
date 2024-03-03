<script setup lang="ts">
import MenuDrawer from "@/Components/MenuDrawer/MenuDrawer.vue";
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
import { Link } from "@inertiajs/vue3";
</script>

<template>
  <div>
    <div class="min-h-screen bg-gray-100">
      <nav class="bg-white border-b border-gray-400">
        <div class="p-2 flex flex-row justify-between w-full">
          <Link :href="route('dashboard')">
            <img src="../../assets/img/logo_dashboard.png" alt="dose-diary" style="height: 60px; width: auto" />
          </Link>
          <div class="sm:flex sm:items-center sm:ms-6">
            <div class="ms-3 relative">
              <Dropdown align="right" width="48">
                <template #trigger>
                  <span class="inline-flex rounded-md">
                    <button
                      type="button"
                      class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150"
                    >
                      <span v-if="$page.props.auth.user.name">
                        {{ $page.props.auth.user.name }}
                      </span>
                      <span v-else class="material-symbols-outlined text-primary"> account_circle </span>
                      <svg
                        class="ms-2 -me-0.5 h-4 w-4 fill-primary"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                      >
                        <path
                          fill-rule="evenodd"
                          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                          clip-rule="evenodd"
                        />
                      </svg>
                    </button>
                  </span>
                </template>

                <template #content>
                  <DropdownLink :href="route('profile.edit')">
                    <Link class="flex flex-row items-center" href="/my-account">
                      <span class="material-symbols-outlined">person</span> <span class="ml-4">Minha Conta</span>
                    </Link>
                  </DropdownLink>
                  <DropdownLink :href="route('logout')" method="post" as="button">
                    <div class="flex flex-row">
                      <span class="material-symbols-outlined">logout</span> <span class="ml-4">Logout</span>
                    </div>
                  </DropdownLink>
                </template>
              </Dropdown>
            </div>
          </div>
        </div>
      </nav>

      <div class="flex flex-row">
        <menu-drawer />
        <div class="flex flex-col w-full">
          <!-- Page Heading -->
          <header v-if="$slots.header">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
              <slot name="header" />
            </div>
          </header>

          <!-- Page Content -->
          <main>
            <slot />
          </main>
        </div>
      </div>
    </div>
  </div>
</template>
