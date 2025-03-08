<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    href: {
        type: String,
        required: true,
    },
    active: {
        type: Boolean,
    },
});

const classes = computed(() =>
    props.active
        ? 'inline-flex items-center justify-center px-4 py-1 border-b-2 border-orange-500 dark:border-orange-700 text-base font-medium leading-5 text-orange-700 dark:text-orange-500 bg-orange-50 dark:bg-zinc-800 focus:outline-none focus:border-red-700 transition duration-150 ease-in-out'
        : 'inline-flex items-center justify-center px-4 py-1 border-b-2 border-transparent text-base font-medium leading-5 text-zinc-500 dark:text-zinc-400 hover:text-orange-700 dark:hover:text-orange-500 hover:border-orange-500 dark:hover:border-orange-700 hover:bg-orange-100 dark:hover:bg-zinc-800 focus:outline-none focus:text-orange-700 dark:focus:text-orange-500 focus:border-orange-500 dark:focus:border-orange-700 transition duration-150 ease-in-out',
);

</script>

<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>
