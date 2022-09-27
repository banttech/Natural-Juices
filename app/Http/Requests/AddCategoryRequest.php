<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddCategoryRequest extends FormRequest
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
            'sort_order' => 'required',
            'home_banner_img' => 'mimes:jpeg,jpg,png|required',
            'cover_img' => 'mimes:jpeg,jpg,png|required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Category Name field is required!',
            'title.required' => 'Title field is required!',
            'url_slug.required' => 'URL Slug field is required!',
            'meta_description.required' => 'Meta Description field is required!',
            'sort_order.required' => 'Sort Order field is required!',
            'home_banner_img.required' => 'Home Banner Image field is required!',
            'home_banner_img.mimes' => 'Please updload image having format jpeg,jpg,png!',
            'cover_img.required' => 'Cover Image field is required!',
            'cover_img.mimes' => 'please updload image having format jpeg,jpg,png!'
        ];
    }
}
