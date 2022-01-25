<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
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
        $categoryID = $this->route('category.id');
        return [
            //
            'name' => ['required','max:50', 
                Rule::unique('categories')->ignore($categoryID)],
            'logo' => ['mimes:jpeg,bmp,png,gif,svg,jpg'],
            'link' => 'url'
            
           
        ];
    }
}
