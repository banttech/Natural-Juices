<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOfferRequest extends FormRequest
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
            'offer_category' => 'required',
            'target_url' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'offer_category.required' => 'Offer Category field is required',
            'target_url.required' => 'Target URL field is required',
        ];
    }
}
