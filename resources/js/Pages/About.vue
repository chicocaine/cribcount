<script setup>
import AboutCard from '@/Components/AboutCard.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

const bgImage = 'images/AboutUs.jpg';
const edImage = 'images/Ed.jpg';
const robImage = 'images/Rob.jpg';
</script>

<template>
    <Head title="How-To-Use">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    </Head>

    <AuthenticatedLayout>
        <div class="mx-auto max-w-screen md:pt-20 lg:pt-20 min-h">

            <section class="relative w-full h-64 pt-8">
                <!-- Background Image -->
                <img :src="bgImage" alt="About Us" class="absolute inset-0 w-full h-full object-cover">
                
                <!-- Overlay -->
                <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                <h1 class="text-white text-3xl sm:text-4xl font-bold">About Us</h1>
                </div>
            </section>


            <!-- Meet the team-->
            <div class="text-zinc-900 dark:text-zinc-100">
                <section class="py-16 bg-gray-50 dark:bg-zinc-900">
                    <div class="max-w-5xl mx-auto text-center">
                        <span class="px-4 py-1 text-sm font-semibold uppercase bg-red-100 text-red-600 rounded-full">Our Team</span>
                        <h2 class="mt-4 text-4xl font-bold text-zinc-900 dark:text-zinc-100">Team Members</h2>
                        <p class="mt-2 text-zinc-600 dark:text-zinc-400">
                            Meet the overworked students behind our website.
                        </p>
                    </div>

                    <div class="mt-10 flex flex-wrap justify-center gap-6">
                            
                        <!-- Team Member 1 -->
                        <AboutCard :image="edImage" name="Eduard Anthony Pechayco" subtitle="Least Overwork Programmer" />
                        <!-- Team Member 2 -->
                        <AboutCard :image="robImage" name="Robroi Neo Dingal" subtitle="UI/UX design" />
                        
                    </div>    
                </section>
            </div>
        </div>
    </AuthenticatedLayout>
</template>