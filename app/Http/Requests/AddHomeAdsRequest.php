<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddHomeAdsRequest extends FormRequest
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
            'home_page_ads' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'home_page_ads.required' => 'Upload Image field is required!',
        ];
    }
}
