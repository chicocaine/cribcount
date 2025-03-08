<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Home" />
    <!-- TODO BEUTIFY THIS SHIT -->
    <AuthenticatedLayout>
        <div class="SX1">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8 lg:pt-16">
                <div
                    class="overflow-hidden "
                >
                    <div class="p-6 text-zinc-900 dark:text-zinc-100">
                        <div class="flex flex-col items-center justify-start text-center min-h-40vh px-4 py-24 text-zinc-900 dark:text-zinc-100">

                            <div class="flex items-center justify-start pb-4 gap-4">
                                <div class="flex items-start">
                                    <div class="flex items-center">
                                        <h1 class="text-[min(15vw,100px)] sm:text-7xl md:text-9xl font-bold text-orange-600 leading-none">
                                            C
                                        </h1>
                                        <div class="flex flex-col">
                                            <h1 class="text-[min(6vw,40px)] sm:text-5xl md:text-6xl font-bold leading-tight">
                                                CRIB COUNT
                                            </h1>
                                            <h1 class="text-[min(4vw,28px)] sm:text-3xl md:text-4xl italic leading-tight">
                                                MORTGAGE TRACKER
                                            </h1>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <hr class="border-t-2 border-gray-300 dark:border-gray-700 my-4 w-full max-w-4xl mx-auto pb-2">
                            <h6 class="text-base sm:text-lg md:text-xl text-zinc-900 dark:text-zinc-100 text-center px-2 sm:px-4">
                                Know when to pay, what to pay, and how much to pay.
                            </h6>

                            <!-- Button Container -->
                            <div class="flex flex-col sm:flex-row sm:justify-center sm:space-x-4 space-y-4 sm:space-y-0 mt-6">
                                <!-- Primary Button (Calculator) -->
                                <Link 
                                    :href="route('mortgage.calculator')" 
                                    :class="{
                                        'bg-orange-600 dark:bg-orange-700 text-white': route().current('mortgage.calculator'), 
                                        'bg-orange-600 dark:bg-orange-600 hover:bg-orange-400 dark:hover:bg-orange-500 border-orange-600 hover:border-orange-400 dark:border-orange-600 text-white': !route().current('mortgage.calculator')
                                    }"
                                    class="px-6 py-2 rounded-md shadow-md transition text-center sm:w-auto w-full border"
                                >
                                    Calculator →
                                </Link>

                                <!-- Secondary Button (How to Use) -->
                                <Link
                                    :href="route('how-to-use')" 
                                    class="px-6 py-2 border rounded-md transition text-center sm:w-auto w-full 
                                        -900 text-zinc-900 hover:bg-zinc-900 hover:text-white 
                                        dark:border-white dark:text-white dark:hover:bg-zinc-200 dark:hover:text-zinc-950"
                                >
                                    About
                                </Link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Cards -->
            <div class="flex flex-col items-center justify-start text-center bg-zinc-90 min-w-screen text-zinc-900 dark:text-zinc-100">

                <div class="bg-zinc-100 dark:bg-zinc-900 w-full flex flex-col items-center flex-grow pb-24">


                    <!-- Heading -->
                    <div class="pt-24">
                        <h6 class="text-orange-600 dark:text-orange-600 text-lg md:text-xl">
                            Cribcount's Features
                        </h6>
                        <h1 class="text-2xl md:text-4xl font-bold text-gray-900 dark:text-white">
                            We do more than calculations
                        </h1>
                    </div>


                    <!-- Feature Cards -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 pt-24 mx-auto w-full max-w-7xl px-6 md:px-16">
                        <div class="flex flex-col items-center md:items-start text-center md:text-left">
                            <svg width="53" height="53" viewBox="0 0 53 53" fill="none" xmlns="http://www.w3.org/2000/svg">==
                            <path d="M23.4 40H28.6C35.1 40 37.7001 37.4 37.7001 30.9V23.1C37.7001 16.6 35.1 14 28.6 14H23.4C16.9 14 14.3 16.6 14.3 23.1V30.9C14.3 37.4 16.9 40 23.4 40Z" stroke="#FF7161" stroke-width="1.95" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M31.85 21.254V22.554C31.85 23.62 30.979 24.504 29.9 24.504H22.1C21.034 24.504 20.15 23.633 20.15 22.554V21.254C20.15 20.188 21.021 19.304 22.1 19.304H29.9C30.979 19.304 31.85 20.175 31.85 21.254Z" stroke="#FF7161" stroke-width="1.95" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M20.977 29.6H20.992" stroke="#FF7161" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M25.9938 29.6H26.0088" stroke="#FF7161" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M31.0107 29.6H31.0257" stroke="#FF7161" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M20.977 34.15H20.992" stroke="#FF7161" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M25.9938 34.15H26.0088" stroke="#FF7161" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M31.0107 34.15H31.0257" stroke="#FF7161" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round"/>
                            <circle cx="26.5" cy="26.5" r="26" stroke="#FF7161"/>
                            </svg>

                            <h1 class="text-lg md:text-xl font-bold">Calculator</h1>
                            <h2 class="text-gray-600 text-sm md:text-base">Of course, we also have a calculator</h2>
                        </div>

                        <div class="flex flex-col items-center md:items-start text-center md:text-left">
                            <svg width="53" height="53" viewBox="0 0 53 53" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="26.5" cy="26.5" r="26" stroke="#FF7161"/>
                            <path d="M21.6 14.3999V17.9999" stroke="#FF7161" stroke-width="1.8" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M31.2 14.3999V17.9999" stroke="#FF7161" stroke-width="1.8" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M16.2 22.908H36.6" stroke="#FF7161" stroke-width="1.8" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M38.4 34.8C38.4 35.7 38.148 36.552 37.704 37.272C36.876 38.664 35.352 39.6 33.6 39.6C32.388 39.6 31.2841 39.156 30.4441 38.4C30.0721 38.088 29.7481 37.704 29.4961 37.272C29.0521 36.552 28.8 35.7 28.8 34.8C28.8 32.148 30.948 30 33.6 30C35.04 30 36.324 30.636 37.2 31.632C37.944 32.484 38.4 33.588 38.4 34.8Z" stroke="#FF7161" stroke-width="1.8" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M31.728 34.8L32.916 35.988L35.472 33.624" stroke="#FF7161" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M37.2 22.2V31.6319C36.324 30.6359 35.04 30 33.6 30C30.948 30 28.8 32.148 28.8 34.8C28.8 35.7 29.052 36.5519 29.496 37.2719C29.748 37.7039 30.072 38.088 30.444 38.4H21.6C17.4 38.4 15.6 36 15.6 32.4V22.2C15.6 18.6 17.4 16.2 21.6 16.2H31.2C35.4 16.2 37.2 18.6 37.2 22.2Z" stroke="#FF7161" stroke-width="1.8" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M26.3946 28.4398H26.4054" stroke="#FF7161" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M21.9532 28.4398H21.964" stroke="#FF7161" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M21.9532 32.0399H21.964" stroke="#FF7161" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <h1 class="text-lg md:text-xl font-bold">Amortization Schedule</h1>
                            <h2 class="text-gray-600 text-sm md:text-base">So that you can keep track of your payments</h2>
                        </div>

                        <div class="flex flex-col items-center md:items-start text-center md:text-left">
                             <svg width="53" height="53" viewBox="0 0 53 53" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="26.5" cy="26.5" r="26" stroke="#FF7161"/>
                                <path d="M22.8 39H30C36 39 38.4 36.6 38.4 30.6V23.4C38.4 17.4 36 15 30 15H22.8C16.8 15 14.4 17.4 14.4 23.4V30.6C14.4 36.6 16.8 39 22.8 39Z" stroke="#FF7161" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M30.6 34.8C31.92 34.8 33 33.72 33 32.4V21.6C33 20.28 31.92 19.2 30.6 19.2C29.28 19.2 28.2 20.28 28.2 21.6V32.4C28.2 33.72 29.268 34.8 30.6 34.8Z" stroke="#FF7161" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M22.2 34.8C23.52 34.8 24.6 33.72 24.6 32.4V28.2C24.6 26.88 23.52 25.8 22.2 25.8C20.88 25.8 19.8 26.88 19.8 28.2V32.4C19.8 33.72 20.868 34.8 22.2 34.8Z" stroke="#FF7161" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <h1 class="text-lg md:text-xl font-bold">Graphs</h1>
                            <h2 class="text-gray-600 text-sm md:text-base">Now you can view your spending visually!</h2>
                        </div>

                        <div class="flex flex-col items-center md:items-start text-center md:text-left">
                            <svg width="53" height="53" viewBox="0 0 53 53" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="26.5" cy="26.5" r="26" stroke="#FF7161"/>
                            <path d="M18.648 25.3438C13.032 25.7398 13.032 33.9118 18.648 34.3078H20.952" stroke="#FF7161" stroke-width="1.8" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M18.708 25.3438C14.856 14.6278 31.104 10.3438 32.964 21.5998C38.16 22.2598 40.26 29.1838 36.324 32.6278C35.124 33.7198 33.576 34.3198 31.956 34.3078H31.848" stroke="#FF7161" stroke-width="1.8" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M32.4 31.8359C32.4 32.7239 32.208 33.5639 31.848 34.3079C31.752 34.5239 31.644 34.7279 31.524 34.9199C30.492 36.6599 28.584 37.8359 26.4 37.8359C24.216 37.8359 22.308 36.6599 21.276 34.9199C21.156 34.7279 21.048 34.5239 20.952 34.3079C20.592 33.5639 20.4 32.7239 20.4 31.8359C20.4 28.5239 23.088 25.8359 26.4 25.8359C29.712 25.8359 32.4 28.5239 32.4 31.8359Z" stroke="#FF7161" stroke-width="1.8" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M24.528 31.8362L25.716 33.0242L28.272 30.6602" stroke="#FF7161" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>

                            <h1 class="text-lg md:text-xl font-bold">Save and Load</h1>
                            <h2 class="text-gray-600 text-sm md:text-base">Tired of re-entering your data?</h2>
                        </div>
                    </div>
                </div>
            </div>

            <!-- How It Works Section -->
            <div class="bg-white dark:bg-zinc-950 text-zinc-900 dark:text-white py-28 px-6 md:px-16">
                <div class="max-w-7xl mx-auto text-center">
                <h6 class="text-orange-600 text-lg md:text-xl">How It Works</h6>
                <h1 class="text-3xl md:text-4xl font-bold text-zinc-900 dark:text-zinc-100">
                    Easily calculate your mortgage payments in just a few steps.
                </h1>
                </div>
                <!-- Steps Container -->
                <div class="mt-12 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-7xl mx-auto">
                    <!-- Step 1 -->
                    <div class="flex flex-col items-center text-center p-6 border border-gray-300 dark:border-gray-700 rounded-lg shadow-md">
                        <svg class="w-12 h-12 text-orange-600 mb-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"/>
                        </svg>
                        <h3 class="text-xl font-semibold">Enter Mortgage Details</h3>
                        <p class="mt-2 text-gray-600 dark:text-gray-400">
                            Provide the mortgage amount, loan term, interest rate, and down payment.
                        </p>
                    </div>

                    <!-- Step 2 -->
                    <div class="flex flex-col items-center text-center p-6 border border-gray-300 dark:border-gray-700 rounded-lg shadow-md">
                        <svg class="w-12 h-12 text-orange-600 mb-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.38 0-2.5 1.12-2.5 2.5S10.62 13 12 13s2.5-1.12 2.5-2.5S13.38 8 12 8z"/>
                        </svg>
                        <h3 class="text-xl font-semibold">Get Instant Calculations</h3>
                        <p class="mt-2 text-gray-600 dark:text-gray-400">
                            See your monthly payment breakdown and total mortgage cost in real-time.
                        </p>
                    </div>

                    <!-- Step 3 -->
                    <div class="flex flex-col items-center text-center p-6 border border-gray-300 dark:border-gray-700 rounded-lg shadow-md">
                        <svg class="w-12 h-12 text-orange-600 mb-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        <h3 class="text-xl font-semibold">Review Amortization Schedule</h3>
                        <p class="mt-2 text-gray-600 dark:text-gray-400">
                            View a detailed breakdown of your loan payments over time.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Last Call to Action Section-->
        </div>
    </AuthenticatedLayout>
</template>