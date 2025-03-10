<template>
  <div class="space-y-1">
    <label v-if="label" class="block text-sm font-medium text-zinc-700 dark:text-zinc-300">
      {{ label }}
    </label>
    
    <select
      :value="modelValue"
      @change="$emit('update:modelValue', $event.target.value)"
      :class="[
        'block w-full rounded-md border-zinc-300 shadow-sm focus:border-orange-500 focus:ring-orange-500 dark:border-zinc-700 dark:bg-zinc-900 dark:text-zinc-300 dark:focus:border-orange-600 dark:focus:ring-orange-600',
        { 'input-error': error }
      ]"
    >
      <slot></slot>
    </select>

    <ValidationError v-if="error" :message="error" />
  </div>
</template>

<script setup>
defineProps({
  label: String,
  modelValue: [String, Number],
  error: String
});

defineEmits(['update:modelValue']);
</script>