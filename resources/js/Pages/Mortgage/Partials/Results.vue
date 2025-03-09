<template>
  <div class="max-w-4xl mx-auto p-4">

    <div class="bg-gray-50 dark:bg-zinc-800 shadow rounded-lg p-6 mb-6">
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

    <div class="bg-gray-50 dark:bg-zinc-800 shadow rounded-lg p-6 mb-6">
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

    <div class="bg-gray-50 dark:bg-zinc-800 shadow rounded-lg p-6 flex flex-col items-center">
      <h3 class="text-2xl font-semibold mb-4 text-zinc-800 dark:text-zinc-200">
        Payment Breakdown Chart
      </h3>
      <apexchart
        type="donut"
        width="500"
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
  Number(props.results.monthlyPrincipalInterest || 0),
  Number(props.results.monthly_property_tax || 0),
  Number(props.results.monthly_home_insurance || 0),
  Number(props.results.monthly_hoa || 0)
]);

const isDarkMode = ref(false);

onMounted(() => {
  isDarkMode.value = document.documentElement.classList.contains('dark');
  
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
    background: isDarkMode.value ? '#27272A' : '#F9FAFB',
    height: 500,
    width: 500,
    animations: {
      enabled: true,
      easing: 'linear'
    }
  },
  labels: [
    'Principal & Interest',
    'Property Tax',
    'Home Insurance',
    'HOA Fees'
  ],
  colors: isDarkMode.value
    ? ['#A78BFA', '#6EE7B7', '#FBBF24', '#F87171']
    : ['#4F46E5', '#10B981', '#F59E0B', '#EF4444'],
  legend: {
    labels: {
      colors: isDarkMode.value ? '#f8fafc' : '#1a202c'
    }
  },
  dataLabels: {
    style: {
      colors: [isDarkMode.value ? '#f8fafc' : '#1a202c']
    }
  },
  responsive: [
  {
    breakpoint: 1280, // lg (Large screens: Laptops)
    options: {
      chart: {
        width: 500,
        height: 500
      },
      legend: {
        position: 'right'
      }
    }
  },
  {
    breakpoint: 1024, // md (Medium screens: Tablets and small desktops)
    options: {
      chart: {
        width: 450,
        height: 450
      },
      legend: {
        position: 'right'
      }
    }
  },
  {
    breakpoint: 768, // sm (Small screens: Mobile landscape)
    options: {
      chart: {
        width: 350,
        height: 350
      },
      legend: {
        position: 'bottom'
      }
    }
  },
  {
    breakpoint: 640, // xs+ (Extra small landscape)
    options: {
      chart: {
        width: 320,
        height: 320
      },
      legend: {
        position: 'bottom'
      }
    }
  },
  {
    breakpoint: 480, // xs (Mobile)
    options: {
      chart: {
        width: 280,
        height: 280
      },
      legend: {
        position: 'bottom'
      }
    }
  }
]
}));
</script>
