<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Home" />

    <AuthenticatedLayout>
        <div class=" SX1">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="overflow-hidden "
                >
                    <div class="p-6 text-zinc-900 dark:text-zinc-100">
                        <!--Hero Page-->
                        <div class="flex flex-col items-center justify-start text-center min-h-40vh px-4 py-24">
                            <div class="flex items-center justift-start">
                                <h1 class="text-9xl font-bold text-orange-600">
                                    C
                                </h1>
                                <div class="flex flex-col">
                                    <h1 class="text-6xl font-bold">CRIB COUNT</h1>
                                    <h1 class="text-4xl font-bold italic">MORTGAGE TRACKER</h1>
                                </div>
                            </div>
                            <hr class="border-t-2 border-gray-300 my-4 w-full max-w-md">
                            <h6 class="text-lg text-zinc-100">Know when to pay, what to pay, and how much to pay.</h6>
                            <div class="flex flex-col sm:flex-row sm:space-x-4 space-y-4 sm:space-y-0 mt-6">
                                <!-- Primary Button (Calculator) -->
                                <a 
                                    :href="route('mortgage.calculator')" 
                                    :class="{'bg-orange-600': route().current('mortgage.calculator'), 'bg-orange-600 hover:bg-orange-800': !route().current('mortgage.calculator')}"
                                    class="px-6 py-1 text-white rounded-md shadow-md transition"
                                >
                                    Calculator →
                                </a>

                                <!-- Secondary Button (How to Use) -->
                                <a href="/how-to-use" class="px-6 py-1 text-white border border-white rounded-md hover:bg-white hover:text-orange-700 transition">
                                    How to Use
                                </a>
                            </div>
                        </div>

                        <!--Cards-->
                        <div class="flex flex-col items-center justify-start text-center min-h-screen px-4 pt-24">
                            <div class="">

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>