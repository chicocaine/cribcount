<?php

use App\Http\Controllers\MortgageController;
use Illuminate\Support\Facades\Route;


Route::get('/mortgage', [MortgageController::class, 'calculator'])
    ->name('mortgage.calculator');

Route::post('/mortgage/save/{slot}', [MortgageController::class, 'save'])
->middleware('auth')
->name('mortgage.save');