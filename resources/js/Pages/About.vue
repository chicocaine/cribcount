<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="How-To-Use" />

    <AuthenticatedLayout>
        <div class="mx-auto max-w-screen md:pt-20 lg:pt-20 min-h">

            <section class="relative w-full h-64 pt-8">
                <!-- Background Image -->
                <img src="http://localhost/cribcount/public/images/AboutUs.jpg" alt="About Us" class="absolute inset-0 w-full h-full object-cover">
                
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
                        <div class="bg-white dark:bg-zinc-800 shadow-lg rounded-2xl p-6 text-center w-80">
                            <img src="http://localhost/cribcount/public/images/Ed.jpg" alt="Team Member" class="w-24 h-24 mx-auto rounded-full shadow-md">
                            <h3 class="mt-4 text-xl font-semibold text-zinc-900 dark:text-zinc-100">Eduard Anthony Pechayco</h3>
                            <p class="text-orange-600 font-medium">Lead Programmer</p>
                            <div class="flex justify-center gap-3 mt-4">
                            <a href="#" class="text-zinc-600 hover:text-red-600"><i class="fab fa-facebook"></i></a>
                            <a href="#" class="text-zinc-600 hover:text-red-600"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="text-zinc-600 hover:text-red-600"><i class="fab fa-linkedin"></i></a>
                            </div>
                        </div>

                        <!-- Team Member 2 -->
                        <div class="bg-white dark:bg-zinc-800 shadow-lg rounded-2xl p-6 text-center w-80">
                            <img src="http://localhost/cribcount/public/images/Rob.jpg" alt="Team Member" class="w-24 h-24 mx-auto rounded-full shadow-md">
                            <h3 class="mt-4 text-xl font-semibold text-zinc-900 dark:text-zinc-100">Robroi Neo Dingal</h3>
                            <p class="text-orange-600 font-medium">UI/UX</p>
                            <div class="flex justify-center gap-3 mt-4">
                            <a href="#" class="text-zinc-600 hover:text-red-600"><i class="fab fa-facebook"></i></a>
                            <a href="#" class="text-zinc-600 hover:text-red-600"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="text-zinc-600 hover:text-red-600"><i class="fab fa-linkedin"></i></a>
                            </div>
                        </div>
                        </div>
                    </section>

            </div>
        </div>

    </AuthenticatedLayout>
</template>