<template>
  <div class="flex flex-col items-center text-center p-6 border border-gray-300 dark:border-gray-700 rounded-lg shadow-md">
    <component :is="logo" />
    <h3 class="text-xl font-semibold">{{ title }}</h3>
    <p class="mt-2 text-gray-600 dark:text-gray-400">{{ subtitle }}</p>
  </div>
</template>

<script>
export default {
  name: 'FeatureItem',
  props: {
    logo: {
      type: [Object, String],
      required: true
    },
    title: {
      type: String,
      required: true
    },
    subtitle: {
      type: String,
      required: true
    }
  }
}
</script>
