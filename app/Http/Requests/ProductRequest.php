<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            //
            'name' => 'required|max:100',
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'brand_id' => 'required',
            'short_desc' => 'required',
            'long_desc' => 'required',
            'price' => 'required',
            'shipping_price' => 'required',
            'delivery_date' => 'required',
            'return_date' => 'required',
            'seller' => 'required',
            'logo' => ['mimes:jpeg,bmp,png,gif,svg,jpg'],
            'availability' => 'required'
        ];
    }
}
