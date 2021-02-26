<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class signInValidation extends FormRequest
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
            'email' => 'required|min:10, max:30',
            'password' => 'required|min:3, max:20',
        ];
    }

    public function messages(){
        return [
            'password.required'=> "Password cannot be empty!",
            'password.min'=> "At least 3 characters are required for Password!",
           
            'email.required'=> "Email cannot be empty!",
            'email.min'=> "At least 10 characters are required for Email!",
            'email.max'=> "At most 50 characters for Email!",
        ];
    }
}