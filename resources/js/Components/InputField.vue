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
          'block w-full rounded-md border-zinc-300 shadow-sm focus:border-red-500 focus:ring-red-500 dark:border-zinc-700 dark:bg-zinc-900 dark:text-zinc-300 dark:focus:border-red-600 dark:focus:ring-red-600',
          { 'input-error': error }
        ]"
      />
    </slot>

    <ValidationError v-if="error" :message="error" />
  </div>
</template>

<script setup>
defineProps({
  label: String,
  modelValue: [String, Number],
  type: {
    type: String,
    default: 'text'
  },
  step: [String, Number],
  placeholder: String,
  error: String
});

defineEmits(['update:modelValue']);
</script>