
export function calculateMonthlyPayment(principal, annualRate, years) {
  if (years <= 0 || annualRate <= 0) return 0;
  
  const monthlyRate = annualRate / 100 / 12;
  const months = years * 12;
  return principal * monthlyRate / (1 - Math.pow(1 + monthlyRate, -months));
}

export function calculateAmortization(principal, terms) {
  let balance = principal;
  const schedule = [];
  let currentRate = terms.initial_rate;
  let rates = [];

  // Period Rate
  const totalMonths = terms.loan_term * 12;
  const initialFixedMonths = terms.initial_term * 12;
  
  for (let month = 1; month <= totalMonths; month++) {
    // Rate adjustment logic
    if (month > initialFixedMonths) {
      const adjustmentPeriod = month - initialFixedMonths;
      
      // Get index rate (simplified example) TODO: Replace with real data
      const indexRate = 2.5; 
      const newRate = indexRate + terms.margin;
      
      // Apply periodic cap (only every 12 months after initial term)
      if (adjustmentPeriod % 12 === 1) {
        const maxRate = currentRate + terms.periodic_cap;
        const minRate = currentRate - terms.periodic_cap;
        currentRate = Math.min(Math.max(newRate, minRate), maxRate);
      }
      
      // Apply lifetime cap
      currentRate = Math.min(currentRate, terms.initial_rate + terms.lifetime_cap);
    }

    rates.push(currentRate);
  }

  // Calculate payments
  let balanceRemaining = principal;
  
  rates.forEach((annualRate, index) => {
    const monthlyRate = annualRate / 100 / 12;
    let interestPayment = balanceRemaining * monthlyRate;
    let principalPayment = 0;

    // Handle interest-only period
    if (index < terms.interest_only_period) {
      principalPayment = 0;
    } else {
      // Recalculate payment based on remaining balance and term
      const remainingMonths = totalMonths - index;
      principalPayment = calculateMonthlyPayment(
        balanceRemaining,
        annualRate,
        remainingMonths / 12
      ) - interestPayment;
    }

    balanceRemaining -= principalPayment;

    schedule.push({
      month: index + 1,
      rate: annualRate,
      principal: principalPayment,
      interest: interestPayment,
      total: principalPayment + interestPayment,
      remaining: balanceRemaining
    });
  });

  return schedule;
}

function fixedRateAmortization(principal, { interest_rate, loan_term }) {
  const schedule = [];
  const monthlyRate = interest_rate / 100 / 12;
  const monthlyPayment = calculateMonthlyPayment(principal, interest_rate, loan_term);
  let balance = principal;

  for (let month = 1; month <= loan_term * 12; month++) {
    const interest = balance * monthlyRate;
    const principalPayment = monthlyPayment - interest;
    
    schedule.push({
      month,
      rate: interest_rate,
      principal: principalPayment,
      interest,
      total: monthlyPayment,
      remaining: balance - principalPayment
    });

    balance -= principalPayment;
  }

  return schedule;
}

function adjustableRateAmortization(principal, terms) {
  const schedule = [];
  let currentRate = terms.initial_rate;
  let balance = principal;
  const totalMonths = terms.loan_term * 12;
  const adjustmentFrequency = 12; // Annual adjustments

  for (let month = 1; month <= totalMonths; month++) {
    // Rate adjustment logic
    if (month > terms.initial_term * 12) {
      const monthsSinceAdjustment = (month - terms.initial_term * 12 - 1) % adjustmentFrequency;
      
      if (monthsSinceAdjustment === 0) {
        const indexRate = 2.5; // Should be dynamic in real implementation
        const uncappedRate = indexRate + terms.margin;
        
        // Apply caps
        currentRate = Math.min(
          Math.max(
            uncappedRate, 
            currentRate - terms.periodic_cap
          ), 
          currentRate + terms.periodic_cap
        );
        
        currentRate = Math.min(
          currentRate, 
          terms.initial_rate + terms.lifetime_cap
        );
      }
    }

    // Payment calculation
    const isInterestOnly = month <= terms.interest_only_period;
    const remainingMonths = totalMonths - month + 1;
    const monthlyRate = currentRate / 100 / 12;
    
    let payment;
    if (isInterestOnly) {
      payment = balance * monthlyRate;
    } else {
      payment = calculateMonthlyPayment(balance, currentRate, remainingMonths / 12);
    }

    const interest = balance * monthlyRate;
    const principalPayment = payment - interest;
    
    schedule.push({
      month,
      rate: currentRate,
      principal: principalPayment,
      interest,
      total: payment,
      remaining: balance - principalPayment
    });

    balance -= principalPayment;
  }

  return schedule;
}

export function calculateAmortizationSchedule(formData) {
  const principal = formData.home_price - formData.down_payment;
  
  if (formData.loan_type === 'fixed') {
    return fixedRateAmortization(principal, formData);
  }
  return adjustableRateAmortization(principal, formData);
}