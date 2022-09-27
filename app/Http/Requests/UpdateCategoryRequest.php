<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
            'url_slug' => 'required',
            'meta_description' => 'required',
            'home_banner_img' => 'mimes:jpeg,jpg,png',
            'cover_img' => 'mimes:jpeg,jpg,png'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Category Name Field is required!',
            'title.required' => 'Title Field is required',
            'url_slug.required' => 'URL Slug Field is required',
            'meta_description.required' => 'Meta Description Field is required',
            'home_banner_img.mimes' => 'please updload image having format jpeg,jpg,png!',
            'cover_img.mimes' => 'please updload image having format jpeg,jpg,png!'
        ];
    }
}
