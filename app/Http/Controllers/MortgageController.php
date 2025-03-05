<?php

namespace App\Http\Controllers;

use App\Models\Mortgage;
use App\Http\Requests\StoreMortgageRequest;
use App\Http\Requests\UpdateMortgageRequest;

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
    public function store(StoreMortgageRequest $request)
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
    public function update(UpdateMortgageRequest $request, Mortgage $mortgage)
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
}
