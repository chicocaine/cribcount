<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
import Navbar from '@/components/Navbar.vue';
</script>

<template>
    <Navbar />
    <div
        class="flex min-h-screen flex-col items-center justify-center bg-zinc-300 dark:bg-zinc-900 px-4 sm:px-6 lg:px-8"
    >
        <!-- Back Button -->
        <div class="w-full max-w-xs sm:max-w-md md:max-w-lg lg:max-w-xl xl:max-w-2xl">
            <Link 
                href="/public" 
                class="inline-flex items-center gap-2 text-zinc-700 dark:text-zinc-300 hover:text-orange-700 dark:hover:text-orange-500 transition mb-4 sm:mb-6"
            >
                <!-- Back Icon -->
                <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
                </svg>
                Back to Home
            </Link>
        </div>

        <!-- Logo -->
        <div class="mb-6">
            <Link href="/">
                <ApplicationLogo class="h-16 w-16 sm:h-20 sm:w-20 fill-current text-gray-500" />
            </Link>
        </div>

        <!-- Main Card Container -->
        <div
            class="w-full max-w-xs sm:max-w-md md:max-w-lg lg:max-w-xl xl:max-w-2xl bg-white dark:bg-zinc-800 p-6 sm:p-8 rounded-lg shadow-lg"
        >
            <slot />
        </div>
    </div>
</template>

