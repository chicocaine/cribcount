<template>
  <div class="space-y-2 p-4 lg:p-0">
    <InputField
      label="Home Price ($)"
      v-model.number="form.home_price"
      type="number"
      step="1000"
      :min="0"
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
      :min="0"
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
      :min="0"
    />

    <InputField
      label="Loan Term (years)"
      v-model.number="form.loan_term"
      type="number"
      :error="errors.loan_term"
      :min="0"
    />

    <DropToggleButton 
      @click="showAdditionalFields = !showAdditionalFields" 
      :rotate="showAdditionalFields"
    >
      {{ showAdditionalFields ? 'Hide' : 'Show' }} Additional Fields
    </DropToggleButton>

    <div v-if="showAdditionalFields" class="space-y-4 border-t pt-2">
      <h3 class="text-lg font-medium text-zinc-900 dark:text-zinc-100">
        Additional Costs
      </h3>

      <InputField
        label="Monthly Property Tax ($)"
        v-model.number="form.monthly_property_tax"
        type="number"
        step="100"
        :min="0"
        :error="errors.monthly_property_tax"
      />
      
      <InputField
        label="Monthly Home Insurance ($)"
        v-model.number="form.monthly_home_insurance"
        type="number"
        step="100"
        :min="0"
        :error="errors.monthly_home_insurance"
      />
      
      <InputField
        label="Monthly HOA Fees ($)"
        v-model.number="form.monthly_hoa"
        type="number"
        step="100"
        :min="0"
        :error="errors.monthly_hoa"
      />
    </div>

    <div v-if="form.loan_type === 'adjustable'" class="space-y-4 border-t py-4">
      <h3 class="text-lg font-medium text-zinc-900 dark:text-zinc-100">
        Adjustable Rate Details
      </h3>
      
      <InputField
        label="Initial Fixed Period (years)"
        v-model.number="form.initial_term"
        type="number"
        :error="errors.initial_term"
        :min="0"
      />
      
      <InputField
        label="Initial Rate (%)"
        v-model.number="form.initial_rate"
        type="number"
        step="0.1"
        :error="errors.initial_rate"
        :min="0"
      />
      
      <InputField
        label="Margin (%)"
        v-model.number="form.margin"
        type="number"
        step="0.1"
        :error="errors.margin"
        :min="0"
      />
      
      <InputField
        label="Periodic Rate Cap (%)"
        v-model.number="form.periodic_cap"
        type="number"
        step="0.1"
        :error="errors.periodic_cap"
        :min="0"
      />
      
      <InputField
        label="Lifetime Cap (%)"
        v-model.number="form.lifetime_cap"
        type="number"
        step="0.1"
        :error="errors.lifetime_cap"
        :min="0"
      />
      
      <InputField
        label="Interest Only Period (months)"
        v-model.number="form.interest_only_period"
        type="number"
        :error="errors.interest_only_period"
        :min="0"
      />
    </div>
    <div v-if="!$page.props.auth.user" class="border-t pt-2">
      <p class="text-sm text-zinc-500 dark:text-zinc-400">
        Log in to save or load mortgage calculations.
      </p>
    </div>
    <div v-if="$page.props.auth.user" class="space-x-2 border-t pt-2 flex">
      <PrimaryButton @click="showSaveModal = true" class="w-full">
        Save
      </PrimaryButton>
      <SecondaryButton @click="showLoadModal = true" class="w-full">
        Load
      </SecondaryButton>
    </div>
  </div>

  <SlotModal
    :show="showSaveModal"
    @close="showSaveModal = false"
    title="Save to Slot"
    :slots="saveSlots"
    :dim-empty="false"
    @select="saveToSlot"
  />

  <SlotModal
    :show="showLoadModal"
    @close="showLoadModal = false"
    title="Load from Slot"
    :slots="loadSlots"
    :dim-empty="true"
    @select="loadFromSlot"
  />
  
  <AlertModal
    :show="showAlert"
    :type="alertType"
    :title="alertTitle"
    :message="alertMessage"
    @close="showAlert = false"
  />

</template>

<script setup>
import { reactive, watch, ref, computed } from 'vue';
import InputField from '@/Components/InputField.vue';
import SelectInput from '@/Components/SelectInput.vue';
import InputGroup from '@/Components/InputGroup.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import { router } from '@inertiajs/vue3';
import DropToggleButton from '@/Components/DropToggleButton.vue';
import SlotModal from '@/Components/SlotModal.vue';
import AlertModal from '@/Components/AlertModal.vue';

const emit = defineEmits(['update', 'validation']);
const props = defineProps({ 
  errors: Object,
  mortgages: {
    type: Object,
    default: () => [],
  } 
});

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
    downPaymentAmountRaw.value = Number(amount).toFixed(0);
  }
  if (!isPercentFocused.value) {
    downPaymentPercentRaw.value = ((Number(amount) / price) * 100).toFixed(0);
  }
});

const updateDownPaymentAmount = (rawValue) => {
  downPaymentAmountRaw.value = rawValue;
  const amount = Math.max(parseFloat(rawValue) || 0, 0);
  form.down_payment = Math.min(amount, form.home_price);
};

const updateDownPaymentPercent = (rawValue) => {
  downPaymentPercentRaw.value = rawValue;
  const percent = Math.max(parseFloat(rawValue) || 0, 0);
  const amount = (percent / 100) * form.home_price;
  form.down_payment = Math.min(amount, form.home_price);
};

const formatDownPaymentAmount = () => {
  isAmountFocused.value = false;
  const formatted = parseFloat(downPaymentAmountRaw.value || 0);
  downPaymentAmountRaw.value = formatted;
  form.down_payment = parseFloat(formatted);
};

const formatDownPaymentPercent = () => {
  isPercentFocused.value = false;
  const formatted = parseFloat(downPaymentPercentRaw.value || 0);
  downPaymentPercentRaw.value = formatted;
  const amount = (parseFloat(formatted) / 100) * form.home_price;
  form.down_payment = Math.min(amount, form.home_price);
};

watch(() => form.loan_type, () => {
  if (form.loan_type === 'fixed') {
    delete props.errors.initial_term;
    delete props.errors.margin;
    delete props.errors.periodic_cap;
    delete props.errors.lifetime_cap;
  }
});

// Validation rules
const validate = () => {
  const errors = {};

  if (form.home_price <= 0 || isNaN(form.home_price)) {
    errors.home_price = 'Must be a positive value';
  } 
  if (form.down_payment < 0 || form.down_payment > form.home_price) {
    errors.down_payment = 'Invalid down payment';
  }

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

  if (form.monthly_property_tax < 0) {
    errors.monthly_property_tax = 'Cannot be negative';
  }
  if (form.monthly_home_insurance < 0) {
    errors.monthly_home_insurance = 'Cannot be negative';
  }
  if (form.monthly_hoa < 0) {
    errors.monthly_hoa = 'Cannot be negative';
  }

  emit('validation', errors);
  return errors;
};

// Validate on form change
watch(form, (values) => {
  const errors = validate();
  emit('update', { ...values, isValid: Object.keys(errors).length === 0 });
  emit('validation', errors);
}, { deep: true, immediate: true });

// Load and Saving
const showSaveModal = ref(false);
const showLoadModal = ref(false);

const getSlotMortgage = (slot) => 
    props.mortgages.find(m => m.slot === slot);

const saveToSlot = async (slot) => {
    if (Object.keys(validate()).length > 0) return;
  
  try {
    await router.post(route('mortgage.save', { slot }), form);
    showFeedback('success', 'Saved!', `Mortgage details saved to slot ${slot}`);
    router.reload({ only: ['mortgages'] });
  } catch (error) {
    showFeedback('error', 'Error!', 'Failed to save mortgage details');
  }
};

const loadFromSlot = (slot) => {
    const mortgage = getSlotMortgage(slot);
    if (!mortgage) {
      showFeedback('error', 'Error!', 'No saved data found');
      return;
    }

    try {
      Object.keys(form).forEach(key => {
        if (typeof form[key] === 'number') form[key] = 0;
        else if (typeof form[key] === 'string') form[key] = '';
      });

      form.home_price = Number(mortgage.home_price).toFixed(0);
      form.down_payment = Number(mortgage.down_payment).toFixed(0);
      form.loan_type = mortgage.loan_type;
      form.interest_rate = parseFloat(mortgage.interest_rate).toFixed(1);
      form.loan_term = Number(mortgage.loan_term);
      form.monthly_property_tax = formatDecimal(mortgage.monthly_property_tax);
      form.monthly_home_insurance = formatDecimal(mortgage.monthly_home_insurance);
      form.monthly_hoa = formatDecimal(mortgage.monthly_hoa);

      if (mortgage.adjustables?.length > 0) {
          const adj = mortgage.adjustables[0];
          form.initial_term = Number(adj.initial_term);
          form.initial_rate = parseFloat(adj.initial_rate).toFixed(1);
          form.margin = parseFloat(adj.margin).toFixed(1);
          form.periodic_cap = parseFloat(adj.periodic_cap).toFixed(1);
          form.lifetime_cap = parseFloat(adj.lifetime_cap).toFixed(1);
          form.interest_only_period = adj.interest_only_period ? 
              Number(adj.interest_only_period) : 0;
      } else {
          form.initial_term = 5;
          form.initial_rate = 3.5;
          form.margin = 2.0;
          form.periodic_cap = 2.0;
          form.lifetime_cap = 5.0;
          form.interest_only_period = 0;
      }

      showLoadModal.value = false;
      showFeedback('success', 'Loaded!', `Mortgage details loaded from slot ${slot}`);
    } catch (error) {
      showFeedback('error', 'Error!', 'Failed to load mortgage details');
    }
};

const saveSlots = computed(() => [1, 2, 3].map(slot => ({
  number: slot,
  savedDate: getSlotMortgage(slot)?.updated_at
})));

const loadSlots = computed(() => [1, 2, 3].map(slot => ({
  number: slot,
  savedDate: getSlotMortgage(slot)?.updated_at
})));

const formatDecimal = (value) => {
    const num = Number(value);
    return num % 1 === 0 ? num.toFixed(0) : num.toFixed(2);
};

// Alert 
const showAlert = ref(false);
const alertType = ref('success');
const alertTitle = ref('');
const alertMessage = ref('');

const showFeedback = (type, title, message, duration = 3000) => {
  alertType.value = type;
  alertTitle.value = title;
  alertMessage.value = message;
  showAlert.value = true;
  
  if (duration > 0) {
    setTimeout(() => {
      showAlert.value = false;
    }, duration);
  }
};
</script>
