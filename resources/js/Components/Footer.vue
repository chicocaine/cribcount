<template>
    <footer class="bg-zinc-100 dark:bg-zinc-950 text-white py-10">
        <div class="container mx-auto px-6 md:px-12 lg:px-24">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h2 class="text-2xl font-bold text-orange-500">Cribcount</h2>
                    <p class="text-sm mt-3 text-zinc-400">
                        Helping you make informed mortgage decisions.
                    </p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-orange-500">Quick Links</h3>
                    <ul class="mt-3 space-y-2">
                        <li><Link href="#" class="hover:text-orange-400 transition text-zinc-900 dark:text-zinc-100">Home</Link></li>
                        <li><Link href="#" class="hover:text-orange-400 transition text-zinc-900 dark:text-zinc-100">Calculator</Link></li>
                        <li><Link href="#" class="hover:text-orange-400 transition text-zinc-900 dark:text-zinc-100">About</Link></li>
                        <li><Link href="#" class="hover:text-orange-400 transition text-zinc-900 dark:text-zinc-100">Contact</Link></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-zinc-500 mt-8 pt-6 text-center text-zinc-500 text-sm">
                © 2025 Cribcount. All rights reserved.
            </div>
        </div>
    </footer>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
</script>
