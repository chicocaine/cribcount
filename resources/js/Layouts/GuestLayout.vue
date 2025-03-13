<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div
            class="flex min-h-screen flex-col items-center bg-zinc-300 pt-6 px-4 sm:px-6 md:px-8 sm:justify-center sm:pt-0 dark:bg-zinc-900"
        >
        <div>
            <Link :href="route('home')">
                <ApplicationLogo class="h-20 w-20 fill-current text-gray-500" />
            </Link>
        </div>

        <div
            class="mt-6 w-full overflow-hidden bg-zinc-100 px-6 py-4 shadow-md sm:max-w-md sm:rounded-lg dark:bg-zinc-800"
        >
            <slot />
        </div>
    </div>
</template>
