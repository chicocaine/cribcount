<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Mortgage Calculator" />

    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-zinc-800 dark:text-zinc-200"
            >
                Mortgage Calculator
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="overflow-hidden bg-zinc shadow-sm sm:rounded-lg dark:bg-zinc-800"
                >
                    <div class="p-6 text-zinc-900 dark:text-zinc-100">
                        Calculator Stuff...
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>