<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="How-To-Use" />

    <AuthenticatedLayout>
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8 lg:pt-16 min-h-screen">
            <div class="p-6 text-zinc-900 dark:text-zinc-100">
                <div class="flex flex-col items-center justify-start text-center min-h-[40vh] px-4 py-24 text-zinc-900 dark:text-zinc-100">
                    Fixed Content
                </div>
            </div>
        </div>

    </AuthenticatedLayout>
</template>