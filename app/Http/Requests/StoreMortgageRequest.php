<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMortgageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'home_price' => 'required|numeric|min:0',
            'down_payment' => 'required|numeric|min:0',
            'loan_type' => 'required|in:fixed,arm',
            'interest_rate' => 'required|decimal:0,2|between:0,99.99',
            'loan_term' => 'required|integer|between:1,50',
            'monthly_property_tax' => 'nullable|numeric|min:0',
            'monthly_home_insurance' => 'nullable|numeric|min:0',
            'monthly_hoa' => 'nullable|numeric|min:0',
            
            'adjustable.initial_term' => 'required_if:loan_type,arm|integer|min:1',
            'adjustable.initial_rate' => 'required_if:loan_type,arm|decimal:0,2|between:0,99.99',
            'adjustable.margin' => 'required_if:loan_type,arm|decimal:0,2|between:0,99.99',
            'adjustable.periodic_cap' => 'required_if:loan_type,arm|decimal:0,2|between:0,99.99',
            'adjustable.lifetime_cap' => 'required_if:loan_type,arm|decimal:0,2|between:0,99.99',
            'adjustable.interest_only_period' => 'nullable|integer|min:0',
        ];
    }
}
