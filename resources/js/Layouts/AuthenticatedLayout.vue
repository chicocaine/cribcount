<script setup>
import { ref } from 'vue';
import Footer from '@/Components/Footer.vue';
import Navbar from '@/components/Navbar.vue';

import ScrollToTop from '@/Components/scrollToTop.vue';

const showDropdown = ref(false)
const showingNavigationDropdown = ref(false);
</script>



<template>
    <div class="min-h-screen flex flex-col bg-white dark:bg-zinc-950">
        <div>
            <Navbar />
            <!-- Page Heading -->
            <header class="bg-white shadow dark:bg-zinc-800" v-if="$slots.header">
                <div class="mx-auto max-w-7xl px-4 py-6 sm:px-5 md:px-6 lg:px-8 pt-24">
                    <slot name="header" />
                </div>

            </header>

            <!-- Page Content -->
            <main class="flex-1">
                <slot />
            </main>
            <!-- Footer Component -->
            <Footer class="w-full flex-shrink-0" />
            <ScrollToTop />
        </div>
    </div>
</template>