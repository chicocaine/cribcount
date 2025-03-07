<script setup>
import { reactive, watch, ref } from 'vue';
import InputPartial from './Partials/Input.vue';
import ResultsPartial from './Partials/Results.vue';
import AmortizationPartial from './Partials/Amortization.vue';
import { calculateMonthlyPayment, calculateAmortization, calculateAmortizationSchedule } from './Util/calculations.js';

const formData = reactive({
  home_price: 0,
  down_payment: 0,
  loan_type: 'fixed',
  interest_rate: 3.5,
  loan_term: 30,
  monthly_property_tax: 0,
  monthly_home_insurance: 0,
  monthly_hoa: 0,
});

const results = reactive({
  monthlyPrincipalInterest: 0,
  totalMonthlyPayment: 0,
  totalLoanCost: 0,
  totalInterest: 0,
});

const amortizationSchedule = reactive([]);

function handleInputUpdate(newData) {
  Object.assign(formData, newData);
  calculateResults();
}

const validationErrors = reactive({});
const showErrors = ref(false);

function calculateResults() {

  // Check if there are errors
  if (Object.keys(validationErrors).length > 0) {
    showErrors.value = true;
    return;
  }

  const principal = formData.home_price - formData.down_payment;

  // Calculate base mortgage payment
  const monthlyPrincipalInterest = calculateMonthlyPayment(
    principal,
    formData.interest_rate,
    formData.loan_term
  );

  // Calculate total monthly payment
  const totalMonthlyPayment = monthlyPrincipalInterest + 
    Number(formData.monthly_property_tax) +
    Number(formData.monthly_home_insurance) +
    Number(formData.monthly_hoa);

  // Calculate totals
  const totalLoanCost = totalMonthlyPayment * formData.loan_term * 12;
  const totalInterest = (monthlyPrincipalInterest * formData.loan_term * 12) - principal;

  Object.assign(results, {
    ...formData,
    monthlyPrincipalInterest,
    totalMonthlyPayment,
    totalLoanCost,
    totalInterest
  });

  // Generate amortization schedule
  amortizationSchedule.splice(0);
  if (principal > 0) {
      const newSchedule = calculateAmortizationSchedule(formData);
      amortizationSchedule.push(...newSchedule);
  }
}

// Initial calculation
watch(() => formData, calculateResults, { immediate: true });

// Add validation handler
function handleValidation(errors) {
  Object.keys(validationErrors).forEach(key => delete validationErrors[key]); 
  Object.assign(validationErrors, errors);
  showErrors.value = Object.keys(errors).length > 0;
}
</script>

<template>
  <div class="mortgage-calculator">
    <!-- <div v-if="showErrors && Object.keys(validationErrors).length" class="error-banner">
      Please fix the validation errors before proceeding
    </div> -->
    
    <InputPartial 
      @update="handleInputUpdate"
      @validation="handleValidation"
      :errors="validationErrors"
    />
    <ResultsPartial :results="results" />
    <AmortizationPartial :schedule="amortizationSchedule" />
    
  </div>
</template>

<style>
.input-error {
  @apply border-red-500 ring-red-500;
}

.error-banner {
  @apply bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4;
}
</style>x