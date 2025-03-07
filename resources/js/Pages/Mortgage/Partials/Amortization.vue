<template>
  <div v-if="schedule.length" class="space-y-4 min-w-full">
    <h3 class="text-lg font-medium text-zinc-900 dark:text-zinc-100">
      Amortization Schedule
    </h3>
    
    <div class="flex items-center gap-2">
      <button
        @click="prevYear"
        :disabled="currentYear === 1"
        class="rounded-md border border-zinc-300 px-3 py-1 text-sm font-medium shadow-sm hover:bg-zinc-50 focus:border-red-500 focus:ring-red-500 disabled:opacity-50 dark:border-zinc-700 dark:bg-zinc-900 dark:text-zinc-300 dark:hover:bg-zinc-800 dark:focus:border-red-600 dark:focus:ring-red-600"
      >
        &lt;
      </button>
      
      <select
        v-model="currentYear"
        class="rounded-md border-zinc-300 shadow-sm focus:border-red-500 focus:ring-red-500 dark:border-zinc-700 dark:bg-zinc-900 dark:text-zinc-300 dark:focus:border-red-600 dark:focus:ring-red-600"
      >
        <option v-for="year in totalYears" :value="year" :key="year">
          Year {{ year }}
        </option>
      </select>
      
      <button
        @click="nextYear"
        :disabled="currentYear === totalYears"
        class="rounded-md border border-zinc-300 px-3 py-1 text-sm font-medium shadow-sm hover:bg-zinc-50 focus:border-red-500 focus:ring-red-500 disabled:opacity-50 dark:border-zinc-700 dark:bg-zinc-900 dark:text-zinc-300 dark:hover:bg-zinc-800 dark:focus:border-red-600 dark:focus:ring-red-600"
      >
        &gt;
      </button>
    </div>

    <div class="overflow-x-auto rounded-lg border border-zinc-300 dark:border-zinc-700">
      <table class="min-w-full divide-y divide-zinc-200 dark:divide-zinc-800">
        <thead class="bg-zinc-50 dark:bg-zinc-800/50">
          <tr>
            <th class="px-4 py-2 text-left text-sm font-medium text-zinc-900 dark:text-zinc-300">Month</th>
            <th class="px-4 py-2 text-left text-sm font-medium text-zinc-900 dark:text-zinc-300">Rate</th>
            <th class="px-4 py-2 text-right text-sm font-medium text-zinc-900 dark:text-zinc-300">Principal</th>
            <th class="px-4 py-2 text-right text-sm font-medium text-zinc-900 dark:text-zinc-300">Interest</th>
            <th class="px-4 py-2 text-right text-sm font-medium text-zinc-900 dark:text-zinc-300">Total</th>
            <th class="px-4 py-2 text-right text-sm font-medium text-zinc-900 dark:text-zinc-300">Remaining</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-zinc-200 bg-white dark:divide-zinc-800 dark:bg-zinc-900">
          <tr v-for="payment in visibleSchedule" :key="payment.month" class="hover:bg-zinc-50 dark:hover:bg-zinc-800/50">
            <td class="whitespace-nowrap px-4 py-2 text-sm text-zinc-900 dark:text-zinc-300">{{ payment.month }}</td>
            <td class="whitespace-nowrap px-4 py-2 text-sm text-zinc-900 dark:text-zinc-300">
              {{ Number(payment.rate).toFixed(2) }}%
            </td>
            <td class="whitespace-nowrap px-4 py-2 text-right text-sm text-zinc-900 dark:text-zinc-300">
              {{ Number(payment.principal).toFixed(2) }}
            </td>
            <td class="whitespace-nowrap px-4 py-2 text-right text-sm text-zinc-900 dark:text-zinc-300">
              {{ Number(payment.interest).toFixed(2) }}
            </td>
            <td class="whitespace-nowrap px-4 py-2 text-right text-sm text-zinc-900 dark:text-zinc-300">
              {{ Number(payment.total).toFixed(2) }}
            </td>
            <td class="whitespace-nowrap px-4 py-2 text-right text-sm text-zinc-900 dark:text-zinc-300">
              {{ Number(payment.remaining).toFixed(2) }}
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script setup>
import { ref, computed } from 'vue';

const props = defineProps({
  schedule: {
    type: Array,
    default: () => []
  }
});

const currentYear = ref(1);

const totalYears = computed(() => 
  Math.ceil(props.schedule.length / 12)
);

const visibleSchedule = computed(() => {
  const start = (currentYear.value - 1) * 12;
  const end = start + 12;
  return props.schedule.slice(start, end);
});

function nextYear() {
  if (currentYear.value < totalYears.value) {
    currentYear.value++;
  }
}

function prevYear() {
  if (currentYear.value > 1) {
    currentYear.value--;
  }
}
</script>