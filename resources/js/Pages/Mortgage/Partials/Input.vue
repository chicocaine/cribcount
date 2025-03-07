<template>
  <div class="space-y-2">
    <InputField
      label="Home Price ($)"
      v-model.number="form.home_price"
      type="number"
      step="1000"
      :error="errors.home_price"
    />

    <InputGroup
      label="Down Payment"
      :amount="downPaymentAmountRaw"
      :percent="downPaymentPercentRaw"
      @update:amount="updateDownPaymentAmount"
      @update:percent="updateDownPaymentPercent"
      @format:amount="formatDownPaymentAmount"
      @format:percent="formatDownPaymentPercent"
      @focus:amount="isAmountFocused = true"
      @focus:percent="isPercentFocused = true"
      :error="errors.down_payment"
    />

    <SelectInput
      label="Loan Type"
      v-model="form.loan_type"
      :error="errors.loan_type"
    >
      <option value="fixed">Fixed Rate</option>
      <option value="adjustable">Adjustable Rate</option>
    </SelectInput>

    <InputField
      label="Interest Rate (%)"
      v-model.number="form.interest_rate"
      type="number"
      step="0.1"
      :error="errors.interest_rate"
    />

    <InputField
      label="Loan Term (years)"
      v-model.number="form.loan_term"
      type="number"
      :error="errors.loan_term"
    />

    <button @click="showAdditionalFields = !showAdditionalFields" class="pt-2 text-zinc-800 dark:text-zinc-200">
      {{ showAdditionalFields ? 'Hide' : 'Show' }} Additional Fields
    </button>

    <div v-if="showAdditionalFields" class="space-y-4 border-t pt-2">
      <h3 class="text-lg font-medium text-zinc-900 dark:text-zinc-100">
        Additional Costs
      </h3>

      <InputField
      label="Monthly Property Tax ($)"
      v-model.number="form.monthly_property_tax"
      type="number"
      step="100"
      />
      
      <InputField
      label="Monthly Home Insurance ($)"
      v-model.number="form.monthly_home_insurance"
      type="number"
      step="100"
      />
      
      <InputField
      label="Monthly HOA Fees ($)"
      v-model.number="form.monthly_hoa"
      type="number"
      step="100"
      />
    </div>

    <div v-if="form.loan_type === 'adjustable'" class="space-y-4 border-t pt-4">
      <h3 class="text-lg font-medium text-zinc-900 dark:text-zinc-100">
        Adjustable Rate Details
      </h3>
      
      <InputField
        label="Initial Fixed Period (years)"
        v-model.number="form.initial_term"
        type="number"
        :error="errors.initial_term"
      />
      
      <InputField
        label="Initial Rate (%)"
        v-model.number="form.initial_rate"
        type="number"
        step="0.1"
        :error="errors.initial_rate"
      />
      
      <InputField
        label="Margin (%)"
        v-model.number="form.margin"
        type="number"
        step="0.1"
        :error="errors.margin"
      />
      
      <InputField
        label="Periodic Rate Cap (%)"
        v-model.number="form.periodic_cap"
        type="number"
        step="0.1"
        :error="errors.periodic_cap"
      />
      
      <InputField
        label="Lifetime Cap (%)"
        v-model.number="form.lifetime_cap"
        type="number"
        step="0.1"
        :error="errors.lifetime_cap"
      />
      
      <InputField
        label="Interest Only Period (months)"
        v-model.number="form.interest_only_period"
        type="number"
        :error="errors.interest_only_period"
      />
    </div>
  </div>
</template>

<script setup>
import { reactive, watch, ref } from 'vue';
import InputField from '@/Components/InputField.vue';
import SelectInput from '@/Components/SelectInput.vue';
import InputGroup from '@/Components/InputGroup.vue';

const emit = defineEmits(['update', 'validation']);
const props = defineProps({ errors: Object });

const form = reactive({
  home_price: 100000,
  down_payment: 10000,
  loan_type: 'fixed',
  interest_rate: 3.5,
  loan_term: 30,
  monthly_property_tax: 0,
  monthly_home_insurance: 0,
  monthly_hoa: 0,
  initial_term: 5,
  initial_rate: 3.5,
  margin: 2.0,
  periodic_cap: 2.0,
  lifetime_cap: 5.0,
  interest_only_period: 0,
});

const isAmountFocused = ref(false);
const isPercentFocused = ref(false);
const downPaymentAmountRaw = ref(form.down_payment);
const downPaymentPercentRaw = ref(((form.down_payment / form.home_price) * 100));

const showAdditionalFields = ref(false);

watch(() => [form.home_price, form.down_payment], ([price, amount]) => {
  if (!isAmountFocused.value) {
    downPaymentAmountRaw.value = amount.toFixed(2);
  }
  if (!isPercentFocused.value) {
    downPaymentPercentRaw.value = ((amount / price) * 100).toFixed(2);
  }
});

const updateDownPaymentAmount = (rawValue) => {
  downPaymentAmountRaw.value = rawValue;
  const amount = parseFloat(rawValue) || 0;
  form.down_payment = Math.min(amount, form.home_price);
};

const updateDownPaymentPercent = (rawValue) => {
  downPaymentPercentRaw.value = rawValue;
  const percent = parseFloat(rawValue) || 0;
  const amount = (percent / 100) * form.home_price;
  form.down_payment = Math.min(amount, form.home_price);
};

const formatDownPaymentAmount = () => {
  isAmountFocused.value = false;
  const formatted = parseFloat(downPaymentAmountRaw.value || 0).toFixed(2);
  downPaymentAmountRaw.value = formatted;
  form.down_payment = parseFloat(formatted);
};

const formatDownPaymentPercent = () => {
  isPercentFocused.value = false;
  const formatted = parseFloat(downPaymentPercentRaw.value || 0).toFixed(2);
  downPaymentPercentRaw.value = formatted;
  const amount = (parseFloat(formatted) / 100) * form.home_price;
  form.down_payment = Math.min(amount, form.home_price);
};

// Validation rules
const validate = () => {
  const errors = {};
   
  Object.keys(form).forEach(key => delete errors[key]);

  if (form.home_price <= 0 || isNaN(form.home_price)) errors.home_price = 'Must be a positive value';
  if (form.down_payment < 0 || form.down_payment > form.home_price) errors.down_payment = 'Cannot be negative';
  if (downPaymentPercentRaw.value !== null) {
    if (downPaymentPercentRaw.value < 0 || downPaymentPercentRaw.value > 100) {
      errors.down_payment = 'Percentage must be between 0-100';
    }
  }
  if (form.down_payment >= form.home_price) {
    errors.down_payment = 'Cannot exceed home price';
  }
  if (form.interest_rate <= 0 || form.interest_rate > 25) {
    errors.interest_rate = 'Must be between 0.01% and 25%';
  }
  if (![10, 15, 20, 25, 30].includes(form.loan_term)) {
    errors.loan_term = 'Invalid loan term';
  }

  if (form.loan_type === 'adjustable') {
    if (form.initial_term >= form.loan_term) {
      errors.initial_term = 'Must be less than total loan term';
    }
    if (form.margin < 0) errors.margin = 'Margin cannot be negative';
    if (form.lifetime_cap < form.periodic_cap) {
      errors.lifetime_cap = 'Must be greater than periodic cap';
    }
  }

  watch(() => form.loan_type, () => {
    if (form.loan_type === 'fixed') {
      delete errors.initial_term;
      delete errors.margin;
      delete errors.periodic_cap;
      delete errors.lifetime_cap;
    }
  });

  emit('validation', errors);
  return errors;
};

// Validate on form change
watch(form, (values) => {
  const errors = validate();
  emit('update', { ...values, isValid: Object.keys(errors).length === 0 });
  emit('validation', errors);
}, { deep: true, immediate: true });

</script>
