<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="How-To-Use" />

    <AuthenticatedLayout>
        <div class="mx-auto max-w-screen lg:pt-16 min-h">
            <div class="text-zinc-900 dark:text-zinc-100">
                <section class="bg-white dark:bg-zinc-950 text-zinc-900 dark:text-zinc-100 py-16">
                    <div class="max-w-6xl mx-auto text-center">
                        <h1 class="text-4xl font-bold sm:text-5xl">About Us</h1>
                        <p class="mt-4 text-lg text-zinc-600 dark:text-zinc-400 max-w-2xl mx-auto">
                            Helping you track and manage your mortgage with ease. PLACEHOLDER
                        </p>
                    </div>
                </section>

                <!-- Team Section -->
                <section class="bg-white dark:bg-zinc-950 py-16 px-6">
                    <div class="max-w-6xl mx-auto text-center">
                        <h2 class="text-3xl font-semibold sm:text-4xl">Meet the Team</h2>
                        <div class="flex flex-wrap justify-center gap-24 mt-8">
                            <div class="text-center">
                                <div class="w-24 h-24 mx-auto bg-zinc-200 dark:bg-zinc-800 rounded-full"></div>
                                <h3 class="mt-4 text-xl font-medium">John Doe</h3>
                                <p class="text-zinc-600 dark:text-zinc-400">Founder & CEO</p>
                            </div>
                            <div class="text-center">
                                <div class="w-24 h-24 mx-auto bg-zinc-200 dark:bg-zinc-800 rounded-full"></div>
                                <h3 class="mt-4 text-xl font-medium">Jane Smith</h3>
                                <p class="text-zinc-600 dark:text-zinc-400">Lead Developer</p>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>

    </AuthenticatedLayout>
</template>