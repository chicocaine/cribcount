# Mortgage Calculator Web Application

[![University of Mindanao](https://img.shields.io/badge/University%20of%20Mindanao-blue.svg)](https://www.umindanao.edu.ph)

A modern web application for calculating mortgage payments and amortization schedules, built with Laravel, Vue.js, and Inertia.js.

## Features

### Core Functionality
- 🏠 Mortgage payment calculations for both fixed and adjustable rate loans
- 📈 Amortization schedule generator with yearly pagination
- 💾 Save/Load system with 5 configurable slots (game save-style)
- 🔄 Real-time calculations and updates
- ✅ Input validation and error handling

### Features
- 🔧 Adjustable Rate Mortgage (ARM) calculations with:
  - Initial fixed period
  - Margin and index rates
  - Periodic and lifetime caps
  - Interest-only period support
- 📊 Detailed payment breakdown:
  - Principal & Interest
  - Property Tax
  - Home Insurance
  - HOA Fees
- 🌓 Dark/Light mode toggle
- 📱 Responsive design

### Special Functionality
- 💰 Down payment input in both dollar amount and percentage
- 📅 Amortization schedule export (CSV)
- ⚠️ Payment shock warnings for ARMs
- 🔄 Loan comparison history

## Technologies Used

- **Backend**: Laravel 12.x
- **Frontend**: Vue 3 + Inertia.js
- **Styling**: Tailwind CSS 3.x
- **Database**: MySQL 8.x
- **Build Tool**: Vite
- **PHP**: 8.1+
- **Node.js**: 16.x+

## Installation

### Prerequisites
- PHP 8.1+
- Composer 2.x
- Node.js 16.x+
- MySQL 8.x

### Setup Steps

1. **Clone the repository**
   ```bash
   git clone https://github.com/chicocaine/cribcount.git
   cd cribcount