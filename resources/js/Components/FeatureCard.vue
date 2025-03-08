<template>
  <div class="flex flex-col items-center md:items-start text-center md:text-left">
    <component :is="logo" />
    <h1 class="text-lg md:text-xl font-bold mt-4">{{ title }}</h1>
    <h2 class="text-gray-600 text-sm md:text-base mt-1">{{ subtitle }}</h2>
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
