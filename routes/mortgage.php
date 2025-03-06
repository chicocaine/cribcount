<?php

use App\Http\Controllers\MortgageController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/Mortgage-Calculator', function () {
  return Inertia::render('Mortgage/Calculator');
})->name('mortgage.calculator');