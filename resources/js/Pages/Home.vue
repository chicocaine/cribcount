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
                            <div class="flex items-center justift-start pb-4 gap-4">
                                <div class="flex items-start">
                                    <div class="flex items-center">
                                        <h1 class="text-[15vw] md:text-9xl font-bold text-orange-600 leading-none">C</h1>
                                        <div class="flex flex-col">
                                            <h1 class="text-[6vw] sm:text-5xl md:text-6xl font-bold leading-tight">CRIB COUNT</h1>
                                            <h1 class="text-[4vw] sm:text-3xl md:text-4xl italic leading-tight">MORTGAGE TRACKER</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="border-t-2 border-gray-300 my-4 w-full max-w-4xl mx-auto pb-2">
                            <h6 class="text-lg text-zinc-100 text-center px-4">
                                Know when to pay, what to pay, and how much to pay.
                            </h6>

                            <!-- Button Container -->
                            <div class="flex flex-col sm:flex-row sm:justify-center sm:space-x-4 space-y-4 sm:space-y-0 mt-6">
                                <!-- Primary Button (Calculator) -->
                                <a 
                                    :href="route('mortgage.calculator')" 
                                    :class="{'bg-orange-600': route().current('mortgage.calculator'), 'bg-orange-600 hover:bg-orange-800': !route().current('mortgage.calculator')}"
                                    class="px-6 py-2 text-white rounded-md shadow-md transition text-center sm:w-auto w-full"
                                >
                                    Calculator →
                                </a>

                                <!-- Secondary Button (How to Use) -->
                                <a href="/how-to-use" class="px-6 py-2 text-white border border-white rounded-md hover:bg-white hover:text-orange-700 transition text-center sm:w-auto w-full">
                                    How to Use
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Cards -->
            <div class="flex flex-col items-center justify-start text-center min-h-[80vh] md:min-h-screen pt-24 pb-12 md:pb-6 bg-zinc-90 min-w-screen text-zinc-900 dark:text-zinc-100">

                <div class="bg-zinc-900 min-h-screen md:min-h-[80vh] w-full flex flex-col items-center flex-grow">

                    <!-- Heading -->
                    <div class="pt-24">
                        <h6 class="text-orange-600 text-lg md:text-xl">Cribcount's Features</h6>
                        <h1 class="text-3xl md:text-4xl font-bold">We do more than calculations</h1>
                    </div>

                    <!-- Feature Cards -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 pt-24 mx-auto w-full max-w-7xl px-6 md:px-16">
                        <div class="flex flex-col items-center md:items-start text-center md:text-left">
                            <svg width="53" height="53" viewBox="0 0 53 53" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="26.5" cy="26.5" r="26" stroke="#FF7161"/>
                            </svg>
                            <h1 class="text-lg md:text-xl font-bold">Calculator</h1>
                            <h2 class="text-gray-600 text-sm md:text-base">Of course, we also have a calculator</h2>
                        </div>

                        <div class="flex flex-col items-center md:items-start text-center md:text-left">
                            <svg width="53" height="53" viewBox="0 0 53 53" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="26.5" cy="26.5" r="26" stroke="#FF7161"/>
                            </svg>
                            <h1 class="text-lg md:text-xl font-bold">Amortization Schedule</h1>
                            <h2 class="text-gray-600 text-sm md:text-base">So that you can keep track of your payments</h2>
                        </div>

                        <div class="flex flex-col items-center md:items-start text-center md:text-left">
                            <svg width="53" height="53" viewBox="0 0 53 53" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="26.5" cy="26.5" r="26" stroke="#FF7161"/>
                            </svg>
                            <h1 class="text-lg md:text-xl font-bold">Graphs</h1>
                            <h2 class="text-gray-600 text-sm md:text-base">Now you can view your spending visually!</h2>
                        </div>

                        <div class="flex flex-col items-center md:items-start text-center md:text-left">
                            <svg width="53" height="53" viewBox="0 0 53 53" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="26.5" cy="26.5" r="26" stroke="#FF7161"/>
                            </svg>
                            <h1 class="text-lg md:text-xl font-bold">Save and Load</h1>
                            <h2 class="text-gray-600 text-sm md:text-base">Tired of re-entering your data?</h2>
                        </div>
                    </div>

                    <!-- Button -->
                    <div class="pt-24 pb-6 md:pb-2 text-center flex-grow">
                        <a 
                            :href="route('mortgage.calculator')" 
                            :class="{
                                'bg-zinc-900 border-orange-600': route().current('mortgage.calculator'), 
                                'bg-zinc-900 hover:bg-orange-800 border-orange-600': !route().current('mortgage.calculator')
                            }"
                            class="px-6 py-2 text-white border rounded-md hover:bg-zinc-850 hover:text-orange-700 transition dark:text-white shadow-md"
                        >
                            Calculator →
                        </a>
                    </div>
                </div>
            </div>



            <!--How To Use-->
            <div class="flex flex-col items-center justify-start text-center min-h-screen pt-24 bg-zinc-90 min-w-screen text-zinc-900 dark:text-zinc-100">
                
            </div>
        </div>
    </AuthenticatedLayout>
</template>