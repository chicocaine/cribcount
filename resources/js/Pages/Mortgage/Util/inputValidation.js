export function validateMortgage(form, downPaymentPercentRaw) {
  const errors = {};

  if (form.home_price <= 0 || isNaN(form.home_price)) {
    errors.home_price = 'Must be a positive value';
  } 
  if (form.down_payment < 0 || form.down_payment > form.home_price) {
    errors.down_payment = 'Invalid down payment';
  }
  if (downPaymentPercentRaw !== null) {
    if (downPaymentPercentRaw < 0 || downPaymentPercentRaw > 100) {
      errors.down_payment = 'Percentage must be between 0-100';
    }
  }
  if (form.down_payment >= form.home_price) {
    errors.down_payment = 'Cannot exceed home price';
  }
  if (form.interest_rate <= 0 || form.interest_rate > 25) {
    errors.interest_rate = 'Must be between 0.01% and 25%';
  }
  if (![10, 15, 20, 25, 30, 35, 40].includes(form.loan_term)) {
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

  return errors;
}
