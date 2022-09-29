<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddNewCustomerOfferRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'discount' => 'required',
            'valid_from' => 'required',
            'end_date' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Offer Name field is required!',
            'discount.required' => 'Discount field is required!',
            'valid_from.required' => 'Valid From field is required!',
            'end_date.required' => 'End Date field is required!',
        ];
    }
}
