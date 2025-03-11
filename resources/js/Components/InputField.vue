<template>
  <div class="space-y-1">
    <label v-if="label" class="block text-sm font-medium text-zinc-700 dark:text-zinc-300">
      {{ label }}
    </label>
    
    <slot>
      <input
        :type="type"
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
        :step="step"
        :placeholder="placeholder"
        :class="[
          'block w-full rounded-md border-zinc-300 shadow-sm focus:border-orange-500 focus:ring-orange-500 dark:border-zinc-700 dark:bg-zinc-900 dark:text-zinc-300 dark:focus:border-orange-600 dark:focus:ring-orange-600',
          { 'input-error': error }
        ]"
        :min="min"
      />
    </slot>

    <ValidationError v-if="error" :message="error" />
  </div>
</template>

<script setup>
import ValidationError from '@/Components/ValidationError.vue';

defineProps({
  label: String,
  modelValue: [String, Number],
  type: {
    type: String,
    default: 'text'
  },
  step: [String, Number],
  placeholder: String,
  error: String,
  min: Number
});

defineEmits(['update:modelValue']);
</script>