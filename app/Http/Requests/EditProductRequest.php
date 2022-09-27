<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditProductRequest extends FormRequest
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
            'prod_name' => 'required',
            // 'prod_images' => 'mimes:jpeg,jpg,png|max:5',
            'prod_category' => 'required',
            'prod_brand' => 'required',
            'reg_sel_price' => 'required',
            'final_sel_price' => 'required',
            'prod_subscription_final_sel_price' => 'required',
            'prod_faq' => 'required',
            'prod_description' => 'required',
            'features' => 'required',
            'seo_title' => 'required',
            'url_slug' => 'required',
            'meta_description' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'prod_name.required' => 'Product Name field is required',
            // 'prod_images.mimes' => 'Please updload image having format jpeg,jpg,png',
            // 'prod_images.max' => 'Maximum five prduct images are allowed',
            'prod_category.required' => 'Product Category field is required',
            'prod_brand.required' => 'Product Brand field is required',
            'reg_sel_price.required' => 'Regular Selling Price field is required',
            'final_sel_price.required' => 'Final Selling Price field is required',
            'prod_subscription_final_sel_price.required' => 'Subscription Final Selling Price field is required',
            'prod_faq.required' => 'Product FAQ field is required',
            'prod_description.required' => 'Product Description field is required',
            'features.required' => 'Product Features field is required',
            'seo_title.required' => 'SEO Title field is required',
            'url_slug.required' => 'Url Slug field is required',
            'meta_description.required' => 'Meta Description field is required'
        ];
    }
}
