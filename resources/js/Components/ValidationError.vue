<template>
  <div v-if="message" class="text-red-500 dark:text-red-400 text-sm mt-1">
    {{ message }}
  </div>
</template>

<script setup>
  defineProps({
    message: String
  });
</script>