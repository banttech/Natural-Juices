<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddOfferRequest extends FormRequest
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
            'status' => 'required',
            'offer_category' => 'required',
            'target_url' => 'required',
            'offer_img' => 'mimes:jpeg,jpg,png|required',
        ];
    }

    public function messages()
    {
        return [
            'status.required' => 'Status field is required!',
            'offer_category.required' => 'Offer Category field is required',
            'target_url.required' => 'Target URL field is required',
            'offer_img.required' => 'Offer Image field is required',
            'offer_img.mimes' => 'Please updload image having format jpeg,jpg,png!'
        ];
    }
}
