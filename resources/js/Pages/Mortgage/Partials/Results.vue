<template>
  <div class="max-w-4xl mx-auto p-4">
    <!-- Monthly Payment Breakdown Card -->
    <div class="bg-zinc-100 dark:bg-zinc-800 shadow rounded-lg p-6 mb-6">
      <h3 class="text-2xl font-semibold mb-4 text-zinc-800 dark:text-zinc-200">
        Monthly Payment Breakdown
      </h3>
      <div class="grid grid-cols-2 gap-4 text-zinc-600 dark:text-zinc-400">
        <div>
          <p>Principal & Interest:</p>
          <p class="text-lg font-bold">${{ results.monthlyPrincipalInterest.toFixed(2) }}</p>
        </div>
        <div>
          <p>Property Tax:</p>
          <p class="text-lg font-bold">${{ results.monthly_property_tax }}</p>
        </div>
        <div>
          <p>Home Insurance:</p>
          <p class="text-lg font-bold">${{ results.monthly_home_insurance }}</p>
        </div>
        <div>
          <p>HOA Fees:</p>
          <p class="text-lg font-bold">${{ results.monthly_hoa }}</p>
        </div>
      </div>
      <div class="mt-4 border-t pt-4">
        <p class="text-zinc-800 dark:text-zinc-200">Total Monthly Payment:</p>
        <p class="text-xl font-bold text-zinc-600 dark:text-zinc-400">
          ${{ results.totalMonthlyPayment.toFixed(2) }}
        </p>
      </div>
    </div>

    <!-- Total Costs Card -->
    <div class="bg-zinc-100 dark:bg-zinc-800 shadow rounded-lg p-6 mb-6">
      <h3 class="text-2xl font-semibold mb-4 text-zinc-800 dark:text-zinc-200">
        Total Costs
      </h3>
      <div class="grid grid-cols-2 gap-4">
        <div>
          <p class="text-zinc-800 dark:text-zinc-200">Total Loan Cost:</p>
          <p class="text-lg font-bold text-zinc-900 dark:text-zinc-100">
            ${{ results.totalLoanCost.toFixed(2) }}
          </p>
        </div>
        <div>
          <p class="text-zinc-800 dark:text-zinc-200">Total Interest Paid:</p>
          <p class="text-lg font-bold text-zinc-900 dark:text-zinc-100">
            ${{ results.totalInterest.toFixed(2) }}
          </p>
        </div>
      </div>
    </div>

    <!-- ApexCharts Donut Chart Card -->
    <div class="bg-zinc-100 dark:bg-zinc-800 shadow rounded-lg p-6">
      <h3 class="text-2xl font-semibold mb-4 text-zinc-800 dark:text-zinc-200">
        Payment Breakdown Chart
      </h3>
      <apexchart
        type="donut"
        :options="chartOptions"
        :series="chartSeries"
      />
    </div>
  </div>
</template>

<script setup>
import { ref, computed, onMounted } from 'vue';

const props = defineProps({
  results: Object
});

const chartSeries = computed(() => [
  props.results.monthlyPrincipalInterest,
  props.results.monthly_property_tax,
  props.results.monthly_home_insurance,
  props.results.monthly_hoa
]);

const isDarkMode = ref(document.documentElement.classList.contains('dark'));

onMounted(() => {
  const observer = new MutationObserver(() => {
    isDarkMode.value = document.documentElement.classList.contains('dark');
  });
  observer.observe(document.documentElement, {
    attributes: true,
    attributeFilter: ['class']
  });
});

const chartOptions = computed(() => ({
  chart: {
    type: 'donut',
    animations: {
      enabled: true,
      easing: 'linear'
    }
  },
  theme: {
    mode: isDarkMode.value ? 'dark' : 'light'
  },
  labels: [
    'Principal & Interest',
    'Property Tax',
    'Home Insurance',
    'HOA Fees'
  ],
  // Custom colors to ensure proper contrast in each mode
  colors: isDarkMode.value
    ? ['#A78BFA', '#6EE7B7', '#FBBF24', '#F87171']
    : ['#4F46E5', '#10B981', '#F59E0B', '#EF4444'],
  responsive: [{
    breakpoint: 100,
    options: {
      chart: {
        width: 100
      },
      legend: {
        position: 'bottom'
      }
    }
  }]
}));
</script>
