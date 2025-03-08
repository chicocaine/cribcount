<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import Dropdown from '@/Components/Dropdown.vue';
import NavLink from '@/Components/NavLink.vue';
import ThemeToggle from '@/Components/ThemeToggle.vue';
import { Link } from '@inertiajs/vue3';

import { ref } from 'vue';

// Dropdown visibility state
const showDropdown = ref(false);
const showingNavigationDropdown = ref(false);
</script>

<template>
  <nav class="bg-white dark:bg-zinc-950 w-full fixed left-0 z-50 shadow-md">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 justify-between">
        <!-- Left Side -->
        <div class="flex">
          <div class="flex shrink-0 items-center">
            <Link :href="route('home')">
              <ApplicationLogo class="block h-9 w-auto fill-current text-zinc-800 dark:text-zinc-200" />
            </Link>
          </div>

          <!-- Desktop Nav Links -->
          <div class="hidden sm:-my-px sm:ms-10 sm:flex">
            <NavLink :href="route('home')" :active="route().current('home')"> Home </NavLink>
            <NavLink :href="route('mortgage.calculator')" :active="route().current('mortgage.calculator')"> Calculator </NavLink>
            <NavLink :href="route('how-to-use')" :active="route().current('how-to-use')"> About Us </NavLink>
          </div>
        </div>

        <!-- Right Side -->
        <div class="hidden sm:ms-6 sm:flex">
          <div class="mr-4 self-center">
            <ThemeToggle />
          </div>

          <template v-if="$page.props.auth.user">
            <div class="relative ms-3 self-center">
              <!-- Dropdown Trigger -->
              <button @click="showDropdown = !showDropdown" class="inline-flex items-center rounded-md border border-transparent bg-white dark:bg-zinc-950 px-3 py-2 text-sm font-medium leading-4 text-zinc-500 transition duration-150 ease-in-out hover:text-zinc-700 focus:outline-none dark:text-zinc-400 dark:hover:text-zinc-300 self-center">
                {{ $page.props.auth.user.name }}
                <svg class="-me-0.5 ms-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
              </button>

              <!-- Dropdown Menu -->
              <div v-if="showDropdown" class="absolute right-0 mt-2 w-48 bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-700 rounded-md shadow-lg">
                <DropdownLink :href="route('profile.edit')" class="block px-4 py-2"> Profile </DropdownLink>
                <DropdownLink :href="route('logout')" method="post" as="button" class="block px-4 py-2"> Log Out </DropdownLink>
              </div>
            </div>
          </template>

          <template v-else>
            <div class="flex space-x-2">
              <NavLink :href="route('login')" class="!border-none !bg-transparent text-zinc-500 dark:text-zinc-400 hover:text-orange-700 dark:hover:text-orange-500 transition">
                Login
              </NavLink>
              <NavLink :href="route('register')" class="!border-none !bg-transparent text-zinc-500 dark:text-zinc-400 hover:text-orange-700 dark:hover:text-orange-500 transition">
                Register
              </NavLink>
            </div>
          </template>
        </div>
      </div>
    </div>
  </nav>
</template>

<script>
export default {
  data() {
    return {
      showDropdown: false,
    };
  },
};
</script>
