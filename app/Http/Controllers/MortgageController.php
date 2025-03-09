<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Mortgage;
use App\Models\Adjustable;

class MortgageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Mortgage $mortgage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mortgage $mortgage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Mortgage $mortgage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mortgage $mortgage)
    {
        //
    }

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

    public function save(Request $request, $slot)
    {
        if (!Auth::check()) {
            abort(403);
        }

        $validated = $request->validate([
            'home_price'             => 'required|numeric|min:0',
            'down_payment'           => 'required|numeric|min:0',
            'loan_type'              => 'required|in:fixed,adjustable',
            'interest_rate'          => 'required|numeric|min:0',
            'loan_term'              => 'required|integer|min:1',
            'monthly_property_tax'   => 'nullable|numeric|min:0',
            'monthly_home_insurance' => 'nullable|numeric|min:0',
            'monthly_hoa'            => 'nullable|numeric|min:0',
            'initial_term'           => 'sometimes|integer|min:1',
            'initial_rate'           => 'sometimes|numeric|min:0',
            'margin'                 => 'sometimes|numeric|min:0',
            'periodic_cap'           => 'sometimes|numeric|min:0',
            'lifetime_cap'           => 'sometimes|numeric|min:0',
            'interest_only_period'   => 'nullable|integer|min:0',
        ]);

        DB::transaction(function () use ($slot, $validated) {
            // Merge the slot into the mortgage data
            $mortgageData = array_merge($validated, ['slot' => $slot]);

            $mortgage = Mortgage::updateOrCreate(
                ['user_id' => Auth::id(), 'slot' => $slot],
                $mortgageData
            );

            // Handle adjustable mortgage details
            if ($validated['loan_type'] === 'adjustable') {
                Adjustable::updateOrCreate(
                    ['mortgage_id' => $mortgage->id],
                    [
                        'initial_term'         => $validated['initial_term']     ?? null,
                        'initial_rate'         => $validated['initial_rate']     ?? null,
                        'margin'               => $validated['margin']           ?? null,
                        'periodic_cap'         => $validated['periodic_cap']     ?? null,
                        'lifetime_cap'         => $validated['lifetime_cap']     ?? null,
                        'interest_only_period' => $validated['interest_only_period'] ?? null,
                    ]
                );
            } else {
                // If the mortgage is not adjustable, remove any existing adjustable data.
                $mortgage->adjustable()->delete();
            }
        });

        return redirect()->back();
    }
}
