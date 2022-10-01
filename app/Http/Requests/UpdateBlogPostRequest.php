<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBlogPostRequest extends FormRequest
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
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
            'sub_category' => 'required',
            'seo_title' => 'required',
            'seo_description' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Title field is required!',
            'description.required' => 'Description field is required!',
            'category.required' => 'Choose Category field is required!',
            'sub_category.required' => 'Choose Sub Category field is required!',
            'seo_title.required' => 'Set SEO Title field is required!',
            'seo_description.required' => 'Set SEO Description field is required!',
        ];
    }
}
