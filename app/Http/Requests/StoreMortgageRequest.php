<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreMortgageRequest extends FormRequest
{
    public function rules()
    {
        return [
            // Mortgage fields
            'home_price' => 'required|numeric|min:0|max:1000000000',
            'down_payment' => 'required|numeric|min:0|max:100',
            'loan_type' => ['required', Rule::in(['fixed', 'arm'])],
            'interest_rate' => [
                'required',
                'numeric',
                'min:0',
                'max:25',
                'regex:/^\d+(\.\d{1,2})?$/'
            ],
            'loan_term' => 'required|integer|min:1|max:50',
            'monthly_property_tax' => 'nullable|numeric|min:0|max:10000',
            'monthly_home_insurance' => 'nullable|numeric|min:0|max:10000',
            'monthly_hoa' => 'nullable|numeric|min:0|max:10000',

            // Adjustable rate fields 
            'adjustable.initial_term' => [
                'required_if:loan_type,arm',
                'integer',
                'min:1',
                'max:10'
            ],
            'adjustable.initial_rate' => [
                'required_if:loan_type,arm',
                'numeric',
                'min:0',
                'max:25',
                'regex:/^\d+(\.\d{1,2})?$/'
            ],
            'adjustable.margin' => [
                'required_if:loan_type,arm',
                'numeric',
                'min:0',
                'max:10',
                'regex:/^\d+(\.\d{1,2})?$/'
            ],
            'adjustable.periodic_cap' => [
                'required_if:loan_type,arm',
                'numeric',
                'min:0',
                'max:10',
                'regex:/^\d+(\.\d{1,2})?$/'
            ],
            'adjustable.lifetime_cap' => [
                'required_if:loan_type,arm',
                'numeric',
                'min:0',
                'max:25',
                'regex:/^\d+(\.\d{1,2})?$/'
            ],
            'adjustable.interest_only_period' => [
                'nullable',
                'integer',
                'min:0',
                'max:360'
            ],
        ];
    }

    public function messages()
    {
        return [
            'interest_rate.regex' => 'Interest rate must have up to 2 decimal places',
            'adjustable.initial_rate.regex' => 'Initial rate must have up to 2 decimal places',
            'adjustable.margin.regex' => 'Margin must have up to 2 decimal places',
            'adjustable.periodic_cap.regex' => 'Periodic cap must have up to 2 decimal places',
            'adjustable.lifetime_cap.regex' => 'Lifetime cap must have up to 2 decimal places',
            
            'adjustable.initial_term.required_if' => 'Initial term is required for ARM loans',
            'adjustable.initial_rate.required_if' => 'Initial rate is required for ARM loans',
            'adjustable.margin.required_if' => 'Margin is required for ARM loans',
            'adjustable.periodic_cap.required_if' => 'Periodic cap is required for ARM loans',
            'adjustable.lifetime_cap.required_if' => 'Lifetime cap is required for ARM loans',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'home_price' => (float) $this->home_price,
            'down_payment' => (float) $this->down_payment,
            'interest_rate' => (float) $this->interest_rate,
            'loan_term' => (int) $this->loan_term,
            'monthly_property_tax' => $this->monthly_property_tax ? (float) $this->monthly_property_tax : null,
            'monthly_home_insurance' => $this->monthly_home_insurance ? (float) $this->monthly_home_insurance : null,
            'monthly_hoa' => $this->monthly_hoa ? (float) $this->monthly_hoa : null,
        ]);
    }
}