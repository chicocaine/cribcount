<script setup>
import CalculatorLogo from '@/Components/CalculatorLogo.vue';
import CalendarLogo from '@/Components/CalendarLogo.vue';
import CheckLogo from '@/Components/CheckLogo.vue';
import CloudLogo from '@/Components/CloudLogo.vue';
import DetailsLogo from '@/Components/DetailsLogo.vue';
import DotLogo from '@/Components/DotLogo.vue';
import FeatureCard from '@/Components/FeatureCard.vue';
import GraphLogo from '@/Components/GraphLogo.vue';
import HowItWorksCard from '@/Components/How-It-Works-Card.vue';
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
                        <FeatureCard 
                            :logo="CalculatorLogo" 
                            title="Calculator" 
                            subtitle="Of course, we also have a calculator" 
                        />

                        <FeatureCard 
                            :logo="CalendarLogo" 
                            title="Amortization Schedule" 
                            subtitle="So that you can keep track of your payments" 
                        />

                        <FeatureCard 
                            :logo="GraphLogo" 
                            title="Graphs" 
                            subtitle="Now you can view your spending visually!" 
                        />

                        <FeatureCard 
                            :logo="CloudLogo" 
                            title="Save and Load" 
                            subtitle="Tired of re-entering your data?" 
                        />
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
                    <HowItWorksCard 
                        :logo="DetailsLogo" 
                        title="Enter Mortgage Details" 
                        description="Provide the mortgage amount, loan term, interest rate, and down payment."
                    />
                    <!-- Step 2 -->
                    <HowItWorksCard 
                        :logo="DotLogo" 
                        title="Get Instant Calculations" 
                        description="See your monthly payment breakdown and total mortgage cost in real-time."
                    />

                    <!-- Step 3 -->
                    <HowItWorksCard 
                        :logo="CheckLogo" 
                        title="Review Amortization Schedule" 
                        description="View a detailed breakdown of your loan payments over time."
                    />
                </div>
            </div>
            
            <!-- Last Call to Action Section-->
             <div class="flex flex-col items-center text-center bg-zinc-100 dark:bg-zinc-950 py-16 px-6">
                <h2 class="text-3xl md:text-4xl font-bold text-zinc-900 dark:text-white">
                    Ready to Take Control of Your Mortgage?
                </h2>
                <p class="text-zinc-600 dark:text-zinc-300 mt-4 max-w-2xl">
                    Get a clear breakdown of your payments and stay ahead of your finances. Start calculating now and make informed decisions with confidence!
                </p>
                <a 
                    :href="route('mortgage.calculator')"  
                    class="px-6 py-1.5 mt-6 bg-orange-600 hover:bg-orange-500 text-white text-lg rounded-md shadow-md transition duration-150 ease-in-out"
                >
                    Calculate Now →
                </a>
            </div>

        </div>
    </AuthenticatedLayout>
</template>