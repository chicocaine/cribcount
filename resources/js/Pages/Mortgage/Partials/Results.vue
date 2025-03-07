<template>
  <div class="space-y-4">
    <div>
      <h3>Monthly Payment Breakdown</h3>
      <p>Principal & Interest: ${{ results.monthlyPrincipalInterest.toFixed(2) }}</p>
      <p>Property Tax: ${{ results.monthly_property_tax }}</p>
      <p>Home Insurance: ${{ results.monthly_home_insurance }}</p>
      <p>HOA Fees: ${{ results.monthly_hoa }}</p>
      <hr>
      <p>Total Monthly Payment: ${{ results.totalMonthlyPayment.toFixed(2) }}</p>
    </div>

    <div>
      <h3>Total Costs</h3>
      <p>Total Loan Cost: ${{ results.totalLoanCost.toFixed(2) }}</p>
      <p>Total Interest Paid: ${{ results.totalInterest.toFixed(2) }}</p>
    </div>
  </div>
</template>

<script setup>

defineProps({
  results: Object
});
</script>