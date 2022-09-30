<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddCouponCodeRequest extends FormRequest
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
            'coupon_code' => 'required',
            'coupon_type' => 'required',
            'valid_from' => 'required',
            'end_date' => 'required',
            'usage_allowed' => 'required',
            'limit_per_customer' => 'required',
            'minimum_apply_value' => 'required',
            'apply_on_specific_category' => 'required',
            'apply_on_specific_brand' => 'required'

        ];
    }

    public function messages()
    {
        return [
            'coupon_code.required' => 'Coupon Code field is required!',
            'coupon_type.required' => 'Coupon Type field is required!',
            'valid_from.required' => 'Valid From field is required!',
            'end_date.required' => 'End Date field is required!',
            'usage_allowed.required' => 'Usage Allowed field is required!',
            'limit_per_customer.required' => 'Limit Per Customer field is required!',
            'minimum_apply_value.required' => 'Apply Coupon Code on a minimum "Cart Value" of Rs field is required!',
            'apply_on_specific_category.required' => 'Apply Coupon Code on Specific Category field is required!',
            'apply_on_specific_brand.required' => 'Apply Coupon Code on Specific Brand field is required!',

        ];
    }
}
