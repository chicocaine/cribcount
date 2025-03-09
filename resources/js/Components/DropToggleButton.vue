<template>
    <button  class="pt-2 text-zinc-800 dark:text-zinc-200 hover:text-orange-500 dark:hover:text-orange-500 transition ease-linear duration-150 flex">
        <slot />
      <svg
        :class="{'transform rotate-180': rotate, 'transform rotate-0': !rotate}"
        class="h-4 w-4 flex items-center align-middle justify-center mt-1 ms-1 transition-transform duration-200"
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 20 20"
        fill="currentColor"
      >
        <path
        fill-rule="evenodd"
        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
        clip-rule="evenodd"
        />
      </svg>
    </button>
</template>

<script setup>
import { ref } from 'vue';

const props = defineProps({
    rotate: {
        type: Boolean,
        default: false
    }
});

</script>