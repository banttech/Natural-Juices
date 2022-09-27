<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddFeatureRequest extends FormRequest
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
            'icon' => 'mimes:jpeg,jpg,png|required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Feature Name field is required!',
            'icon.required' => 'Feature Icon field is required!',
            'icon.mimes' => 'Please updload image having format jpeg,jpg,png!',
        ];
    }
}
