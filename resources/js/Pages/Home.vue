<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Home" />

    <AuthenticatedLayout>
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="overflow-hidden bg-zinc shadow-sm sm:rounded-lg dark:bg-zinc-950"
                >
                    <div class="p-6 text-zinc-900 dark:text-zinc-100">
                        <!--Hero Page-->
                        <div class="flex flex-col items-center justify-start text-center min-h-screen px-4 pt-24">
                            <h1 class="text-6xl font-bold">CRIBCOUT</h1>
                            <h1 class="text-3xl font-bold italic">MORTGAGETRACKER</h1>
                            <hr class="border-t-2 border-gray-300 my-4 w-full max-w-md">
                            <h6 class="text-lg text-zinc-100">Know when to pay, what to pay, and how much to pay.</h6>
                            <div class="flex flex-col sm:flex-row sm:space-x-4 space-y-4 sm:space-y-0 mt-6">
                                <!-- Primary Button (Calculator) -->
                                <a href="/calculator" class="px-6 py-1 text-white bg-red-500 rounded-md shadow-md hover:bg-orange-800 transition">
                                    Calculator →
                                </a>

                                <!-- Secondary Button (How to Use) -->
                                <a href="/how-to-use" class="px-6 py-1 text-white border border-white rounded-md hover:bg-white hover:text-orange-700 transition">
                                    How to Use
                                </a>
                            </div>
                        </div>

                        <!--Cards-->
                        <div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>