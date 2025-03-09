<script setup>
import { Head } from '@inertiajs/vue3';
import InputPartial from './Partials/Input.vue';
import ResultsPartial from './Partials/Results.vue';
import AmortizationPartial from './Partials/Amortization.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { calculateMonthlyPayment, calculateAmortizationSchedule } from './Util/calculations.js';
import { reactive, watch, ref } from 'vue';

const props = defineProps({
  mortgages: {
    type: Array,
    default: () => []
  }
});

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

function handleValidation(errors) {
  Object.keys(validationErrors).forEach(key => delete validationErrors[key]); 
  Object.assign(validationErrors, errors);
  showErrors.value = Object.keys(errors).length > 0;
}

const validationErrors = reactive({});
const showErrors = ref(false);

function calculateResults() {

  if (Object.keys(validationErrors).length > 0) {
    showErrors.value = true;
    return;
  }

  const principal = formData.home_price - formData.down_payment;

  const monthlyPrincipalInterest = calculateMonthlyPayment(
    principal,
    formData.interest_rate,
    formData.loan_term
  );

  const totalMonthlyPayment = monthlyPrincipalInterest + 
    Number(formData.monthly_property_tax) +
    Number(formData.monthly_home_insurance) +
    Number(formData.monthly_hoa);

  const totalLoanCost = totalMonthlyPayment * formData.loan_term * 12;
  const totalInterest = (monthlyPrincipalInterest * formData.loan_term * 12) - principal;

  Object.assign(results, {
    ...formData,
    monthlyPrincipalInterest,
    totalMonthlyPayment,
    totalLoanCost,
    totalInterest
  });

  amortizationSchedule.splice(0);
  if (principal > 0) {
      const newSchedule = calculateAmortizationSchedule(formData);
      amortizationSchedule.push(...newSchedule);
  }
}

watch(() => formData, calculateResults, { immediate: true });

</script>

<template>
  
  <Head title="Calculator" />
  
  <AuthenticatedLayout>
    <div class="py-12">
  <div class="mx-auto max-w-7xl sm:px-6 px-8 pt-16">
    <div class="overflow-hidden">
      
      <!-- Responsive Layout -->
      <div class="flex flex-col md:flex-row">
        <!-- InputPartial: Full width on sm & md, 1/5 width on lg+ -->
        <div class="w-full md:w-2/5 lg:w-1/5 mx-1">
          <InputPartial 
            @update="handleInputUpdate"
            @validation="handleValidation"
            :errors="validationErrors"
            :mortgages="mortgages"
          />
        </div>
        
        <!-- ResultsPartial: Full width on sm & md, 4/5 width on lg+ -->
        <div class="w-full md:w-3/5 lg:w-4/5">
          <ResultsPartial :results="results" />
        </div>
      </div>

      <!-- AmortizationPartial: Centered, full width -->
      <div class="flex justify-center">
        <AmortizationPartial :schedule="amortizationSchedule" />
      </div>
      
    </div>
  </div>
</div>


  </AuthenticatedLayout>  
</template>