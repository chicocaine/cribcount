<template>
  <div class="space-y-1">
    <label v-if="label" class="block text-sm font-medium text-zinc-700 dark:text-zinc-300">
      {{ label }}
    </label>
    
    <div class="grid grid-cols-2 gap-4">
      <div>
        <input
          type="number"
          :value="amount"
          @input="$emit('update:amount', $event.target.value)"
          @blur="$emit('format:amount')"
          @focus="$emit('focus:amount')"
          :step="stepAmount"
          placeholder="Amount"
          :class="[
            'block w-full rounded-md border-zinc-300 shadow-sm focus:border-red-500 focus:ring-red-500 dark:border-zinc-700 dark:bg-zinc-900 dark:text-zinc-300 dark:focus:border-red-600 dark:focus:ring-red-600',
            { 'input-error': error }
          ]"
          :min="min"
        />
      </div>
      <div>
        <input
          type="number"
          :value="percent"
          @input="$emit('update:percent', $event.target.value)"
          @blur="$emit('format:percent')"
          @focus="$emit('focus:percent')"
          :step="stepPercent"
          placeholder="Percentage"
          :class="[
            'block w-full rounded-md border-zinc-300 shadow-sm focus:border-red-500 focus:ring-red-500 dark:border-zinc-700 dark:bg-zinc-900 dark:text-zinc-300 dark:focus:border-red-600 dark:focus:ring-red-600',
            { 'input-error': error }
          ]"
          :min="min"
        />
      </div>
    </div>

    <ValidationError v-if="error" :message="error" />
  </div>
</template>

<script setup>
import ValidationError from './ValidationError.vue';

defineProps({
  label: String,
  amount: [String, Number],
  percent: [String, Number],
  stepAmount: {
    type: [String, Number],
    default: 1000
  },
  stepPercent: {
    type: [String, Number],
    default: 1
  },
  error: String,
  min: Number
});

defineEmits([
  'update:amount',
  'update:percent',
  'format:amount',
  'format:percent',
  'focus:amount',
  'focus:percent'
]);
</script>