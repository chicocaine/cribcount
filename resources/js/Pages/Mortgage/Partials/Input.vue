<template>
  <div class="space-y-4">
    <div>
      <label>Home Price ($)</label>
      <input 
        type="number" 
        v-model.number="form.home_price" 
        step="0.01"
        :class="{ 'input-error': errors.home_price }"
      />
      <ValidationError :message="errors.home_price" />
    </div>
    
    <div class="space-y-2">
    <div>
      <label>Down Payment</label>
      <div class="grid grid-cols-2 gap-4">
        <div>
          <input
            type="number"
            v-model="downPaymentAmountRaw"
            @input="updateDownPaymentAmount"
            @blur="formatDownPaymentAmount"
            @focus="isAmountFocused = true"
            step="0.01"
            placeholder="Amount"
            :class="{ 'input-error': errors.down_payment }"
          />
        </div>
        <div>
          <input
            type="number"
            v-model="downPaymentPercentRaw"
            @input="updateDownPaymentPercent"
            @blur="formatDownPaymentPercent"
            @focus="isPercentFocused = true"
            step="0.01"
            placeholder="Percentage"
            :class="{ 'input-error': errors.down_payment }"
          />
        </div>
      </div>
      <ValidationError :message="errors.down_payment" />
    </div>
  </div>

    <div>
      <label>Loan Type</label>
      <select v-model="form.loan_type">
        <option value="fixed">Fixed Rate</option>
        <option value="adjustable">Adjustable Rate</option>
      </select>
    </div>

    <div>
      <label>Interest Rate (%)</label>
      <input 
        type="number" 
        v-model.number="form.interest_rate" 
        step="0.01" 
        :class="{ 'input-error': errors.interest_rate }"  
      />
      <ValidationError :message="errors.interest_rate" />
    </div>

    <div>
      <label>Loan Term (years)</label>
      <input 
        type="number" 
        v-model.number="form.loan_term" 
        :class="{ 'input-error': errors.loan_term }"
      />
      <ValidationError :message="errors.loan_term" />
    </div>

    <!-- Additional monthly costs -->
    <div class="space-y-2">
      <div>
        <label>Monthly Property Tax ($)</label>
        <input type="number" v-model="form.monthly_property_tax" step="0.01" />
      </div>
      <div>
        <label>Monthly Home Insurance ($)</label>
        <input type="number" v-model="form.monthly_home_insurance" step="0.01" />
      </div>
      <div>
        <label>Monthly HOA Fees ($)</label>
        <input type="number" v-model="form.monthly_hoa" step="0.01" />
      </div>
    </div>
  </div>
  <div v-if="form.loan_type === 'adjustable'" class="space-y-4 border-t pt-4">
    <h3>Adjustable Rate Details</h3>
    <div>
      <label>Initial Fixed Period (years)</label>
      <input 
        type="number" 
        v-model.number="form.initial_term"
        :class="{ 'input-error': errors.initial_term }" 
      />
      <ValidationError :message="errors.initial_term" />
    </div>
    <div>
      <label>Initial Rate (%)</label>
      <input 
        type="number" 
        v-model.number="form.initial_rate" 
        step="0.01"
        :class="{ 'input-error': errors.initial_rate }" 
      />
      <ValidationError :message="errors.initial_rate" />
    </div>
    <div>
      <label>Margin (%)</label>
      <input 
        type="number" 
        v-model.number="form.margin" 
        step="0.01"
        :class="{ 'input-error': errors.margin }" 
      />
      <ValidationError :message="errors.margin" />
    </div>
    <div>
      <label>Periodic Rate Cap (%)</label>
      <input 
        type="number" 
        v-model.number="form.periodic_cap" 
        step="0.01"
        :class="{ 'input-error': errors.periodic_cap }" 
      />
      <ValidationError :message="errors.periodic_cap" />  
    </div>
    <div>
      <label>Lifetime Cap (%)</label>
      <input 
        type="number" 
        v-model.number="form.lifetime_cap" 
        step="0.01"
        :class="{ 'input-error': errors.lifetime_cap }" 
      />
      <ValidationError :message="errors.lifetime_cap" />
    </div>
    <div>
      <label>Interest Only Period (months)</label>
      <input 
        type="number" 
        v-model.number="form.interest_only_period" 
        :class="{ 'input-error': errors.interest_only_period }"
      />
      <ValidationError :message="errors.interest_only_period" />
    </div>
  </div>
</template>

<script setup>
import { reactive, watch, ref, computed } from 'vue';
import ValidationError from '@/Components/ValidationError.vue';

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
const downPaymentAmountRaw = ref(form.down_payment.toFixed(2));
const downPaymentPercentRaw = ref(((form.down_payment / form.home_price) * 100).toFixed(2));

watch(() => [form.home_price, form.down_payment], ([price, amount]) => {
  if (!isAmountFocused.value) {
    downPaymentAmountRaw.value = amount.toFixed(2);
  }
  if (!isPercentFocused.value) {
    downPaymentPercentRaw.value = ((amount / price) * 100).toFixed(2);
  }
});

const updateDownPaymentAmount = (event) => {
  const rawValue = event.target.value;
  downPaymentAmountRaw.value = rawValue;
  const amount = parseFloat(rawValue) || 0;
  form.down_payment = Math.min(amount, form.home_price);
};

const updateDownPaymentPercent = (event) => {
  const rawValue = event.target.value;
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
