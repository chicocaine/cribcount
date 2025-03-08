<?php

use App\Http\Controllers\MortgageController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Mortgage;
use App\Models\Adjustable;

// Route::get('/mortgage', function () {
//   $props = [];
//   if (Auth::check()) {
//     $user = Auth::user();
//     $mortgages = DB::table('mortgages')
//       ->where('user_id', $user->id)
//       ->get()
//       ->map(function ($mortgage) {
//       $mortgage->adjustables = DB::table('adjustables')
//       ->where('mortgage_id', $mortgage->id)
//       ->get();
//       return $mortgage;
//     });
//     $props['mortgages'] = $mortgages;
//   }
//   return Inertia::render('Mortgage/Calculator', $props);
// })->name('mortgage.calculator');

Route::get('/mortgage', function () {
  $props = [];
  
  if (Auth::check()) {
      $mortgages = Mortgage::with('adjustable')
          ->where('user_id', Auth::id())
          ->get()
          ->map(function ($mortgage) {
              return $mortgage->toArray();
          });
      
      $props['mortgages'] = $mortgages;
  }
  
  return Inertia::render('Mortgage/Calculator', $props);
})->name('mortgage.calculator');

Route::post('/mortgage/save/{slot}', function ($slot) {
  if (!Auth::check()) abort(403);
  
  $validated = request()->validate([
      'home_price' => 'required|numeric|min:0',
      'down_payment' => 'required|numeric|min:0',
      'loan_type' => 'required|in:fixed,adjustable',
      'interest_rate' => 'required|numeric|min:0',
      'loan_term' => 'required|integer|min:1',
      'monthly_property_tax' => 'nullable|numeric|min:0',
      'monthly_home_insurance' => 'nullable|numeric|min:0',
      'monthly_hoa' => 'nullable|numeric|min:0',
      'initial_term' => 'sometimes|integer|min:1',
      'initial_rate' => 'sometimes|numeric|min:0',
      'margin' => 'sometimes|numeric|min:0',
      'periodic_cap' => 'sometimes|numeric|min:0',
      'lifetime_cap' => 'sometimes|numeric|min:0',
      'interest_only_period' => 'nullable|integer|min:0',
  ]);

  DB::transaction(function () use ($slot, $validated) {
      $mortgageData = array_merge($validated, ['slot' => $slot]);

      $mortgage = Mortgage::updateOrCreate(
          ['user_id' => Auth::id(), 'slot' => $slot],
          $mortgageData
      );

      if ($validated['loan_type'] === 'adjustable') {
        Adjustable::updateOrCreate(
          ['mortgage_id' => $mortgage->id],
          [
              'initial_term' => $validated['initial_term'],
              'initial_rate' => $validated['initial_rate'],
              'margin' => $validated['margin'],
              'periodic_cap' => $validated['periodic_cap'],
              'lifetime_cap' => $validated['lifetime_cap'],
              'interest_only_period' => $validated['interest_only_period']
          ]
        );
      } else {
          $mortgage->adjustable()->delete();
      }
  });

  return redirect()->back();
})->middleware('auth')->name('mortgage.save');