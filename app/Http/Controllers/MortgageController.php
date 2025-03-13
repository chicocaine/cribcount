<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Mortgage;
use App\Models\Adjustable;
use App\Http\Requests\SaveMortgageRequest;

class MortgageController extends Controller
{
    public function calculator()
    {
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
    }

    public function save(SaveMortgageRequest $request, $slot)
    {
    $validated = $request->validated();

    DB::transaction(function () use ($slot, $validated) {
        // Save the mortgage details
        $mortgageData = array_merge($validated, ['slot' => $slot]);
        $mortgage = Mortgage::updateOrCreate(
            ['user_id' => Auth::id(), 'slot' => $slot],
            $mortgageData
        );
        // Save the adjustable details
        if ($validated['loan_type'] === 'adjustable') {
            Adjustable::updateOrCreate(
                ['mortgage_id' => $mortgage->id],
                [
                    'initial_term'         => $validated['initial_term']         ?? null,
                    'initial_rate'         => $validated['initial_rate']         ?? null,
                    'margin'               => $validated['margin']               ?? null,
                    'periodic_cap'         => $validated['periodic_cap']         ?? null,
                    'lifetime_cap'         => $validated['lifetime_cap']         ?? null,
                    'interest_only_period' => $validated['interest_only_period'] ?? null,
                ]
            );
        } else {
            $mortgage->adjustable()->delete();
        }
    });
        return redirect()->back();
    }
}
