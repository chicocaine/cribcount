<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class SaveMortgageRequest extends FormRequest
{
    public function authorize()
    {
        return Auth::check();
    }

    public function rules()
    {
        return [
            'home_price'             => 'required|numeric|min:0',
            'down_payment'           => 'required|numeric|min:0',
            'loan_type'              => 'required|in:fixed,adjustable',
            'interest_rate'          => 'required|numeric|min:0',
            'loan_term'              => 'required|integer|min:1',
            'monthly_property_tax'   => 'nullable|numeric|min:0',
            'monthly_home_insurance' => 'nullable|numeric|min:0',
            'monthly_hoa'            => 'nullable|numeric|min:0',
            'initial_term'           => 'required_if:loan_type,adjustable|integer|min:1',
            'initial_rate'           => 'required_if:loan_type,adjustable|numeric|min:0',
            'margin'                 => 'required_if:loan_type,adjustable|numeric|min:0',
            'periodic_cap'           => 'required_if:loan_type,adjustable|numeric|min:0',
            'lifetime_cap'           => 'required_if:loan_type,adjustable|numeric|min:0',
            'interest_only_period'   => 'nullable|integer|min:0',
        ];
    }
}
