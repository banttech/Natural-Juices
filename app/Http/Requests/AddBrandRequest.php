<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddBrandRequest extends FormRequest
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
            'title' => 'required',
            'description' => 'required',
            'meta_description' => 'required',
            'url_slug' => 'required',
            'home_logo' => 'mimes:jpeg,jpg,png|required',
            'cover_img' => 'mimes:jpeg,jpg,png|required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Brand Name field is required!',
            'title.required' => 'Title field is required!',
            'description.required' => 'Brand Description field is required!',
            'meta_description.required' => 'Meta Description field is required!',
            'url_slug.required' => 'Url Slug field is required!',
            'home_logo.required' => 'Home Page Logo field is required!',
            'home_logo.mimes' => 'Please updload image having format jpeg,jpg,png!',
            'cover_img.required' => 'Brand Cover Image field is required!',
            'cover_img.mimes' => 'Please updload image having format jpeg,jpg,png!'
        ];
    }
}
