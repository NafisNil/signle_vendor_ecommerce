<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BrandRequest extends FormRequest
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
        $brandID = $this->route('brand.id');
        return [
            //
            'name' => ['required','max:50', 
                Rule::unique('brands')->ignore($brandID)],
                'image' => ['mimes:jpeg,bmp,png,gif,svg,jpg']
            
           
        ];
    }
}
