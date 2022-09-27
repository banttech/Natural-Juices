<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddOrderRequest extends FormRequest
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
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'country' => 'required',
            'state' => 'required',
            'address' => 'required',
            'post_code' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'First Name Field is required!',
            'last_name.required' => 'Last Name Field is required!',
            'email.required' => 'Email Field is required!',
            'phone_number.required' => 'Phone Number Field is required!',
            'country.required' => 'Country Field is required!',
            'state.required' => 'State Field is required!',
            'address.required' => 'Address Field is required!',
            'post_code.required' => 'Post Code Field is required!',
        ];
    }
}
