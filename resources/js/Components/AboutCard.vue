<template>
  <div class="bg-white dark:bg-zinc-800 shadow-lg rounded-2xl p-6 text-center w-80">
    <img :src="cardImage" alt="Team Member" class="w-24 h-24 mx-auto rounded-full shadow-md">
    <h3 class="mt-4 text-xl font-semibold text-zinc-900 dark:text-zinc-100">{{ name }}</h3>
    <p class="text-orange-600 font-medium">{{ subtitle }}</p>
    <div class="flex justify-center gap-3 mt-4">
      <a href="#" class="text-zinc-600 hover:text-red-600">
        <i class="fab fa-facebook"></i>
      </a>
      <a href="#" class="text-zinc-600 hover:text-red-600">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="#" class="text-zinc-600 hover:text-red-600">
        <i class="fab fa-linkedin"></i>
      </a>
    </div>
  </div>
</template>

<script setup>
import { computed } from 'vue';

const props = defineProps({
  image: {
    type: [Object, String],
    required: true
  },
  name: {
    type: String,
    required: true
  },
  subtitle: {
    type: String,
    required: true
  }
});

const cardImage = computed(() => {
  if (typeof props.image === 'object' && props.image !== null && 'url' in props.image) {
    return props.image.url;
  }
  return props.image;
});
</script>
