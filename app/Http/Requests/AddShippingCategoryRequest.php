<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddShippingCategoryRequest extends FormRequest
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
            'shipping_charges' => 'required',
            'delivery_time' => 'required',
            'countries' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Shipping Category Name field is required!',
            'shipping_charges.required' => 'Shipping Charges field is required!',
            'delivery_time.required' => 'Delivery Time field is required!',
            'countries.required' => 'Country Included field is required!'

        ];
    }
}
