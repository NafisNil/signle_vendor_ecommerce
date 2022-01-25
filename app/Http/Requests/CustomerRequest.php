<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'mobile' => ['required','regex: /(^(\+88|0088)?(01){1}[3456789]{1}(\d){8})$/'],
            'password' => 'min:6|required_with:confirmation_password|same:confirmation_password',
            'confirmation_password' => 'min:6'
        ];
    }
}
