export function currency(value) {
  return parseFloat(value).toLocaleString('en-US', {
    style: 'currency',
    currency: 'PHP',
    minimumFractionDigits: 2,
    maximumFractionDigits: 2
  });
}

export function percentage(value) {
  return parseFloat(value).toFixed(2) + '%';
}