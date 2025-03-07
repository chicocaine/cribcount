<template>
  <div v-if="schedule.length">
    <h3>Amortization Schedule</h3>
    
    <div class="controls">
      <button @click="prevYear" :disabled="currentYear === 1">&lt;</button>
      <select v-model="currentYear">
        <option v-for="year in totalYears" :value="year" :key="year">
          Year {{ year }}
        </option>
      </select>
      <button @click="nextYear" :disabled="currentYear === totalYears">&gt;</button>
    </div>

    <table>
      <thead>
        <tr>
          <th>Month</th>
          <th>Rate</th>
          <th>Principal</th>
          <th>Interest</th>
          <th>Total</th>
          <th>Remaining</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="payment in visibleSchedule" :key="payment.month">
          <td>{{ payment.month }}</td>
          <td>{{ Number(payment.rate).toFixed(2) }}%</td>
          <td>{{ Number(payment.principal).toFixed(2) }}</td>
          <td>{{ Number(payment.interest).toFixed(2) }}</td>
          <td>{{ Number(payment.total).toFixed(2) }}</td>
          <td>{{ Number(payment.remaining).toFixed(2) }}</td>
        </tr>
      </tbody>
    </table>
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