<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class signUpValidation extends FormRequest
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
            'full_name' => 'required|min:3, max:30',
            'user_name' => 'required|min:3, max:30',
            'password' => 'required|min:8, max:20',
            'confirm_password' => 'required|min:8, max:20',
            'phone' => 'required|min:11, max:11',
            'address' => 'required|min:11, max:100',
            'company_name' => 'required|min:3, max:100',
            'city' => 'required|min:3, max:100',
            'email' => 'required|min:10, max:50'
        ];
    }

    public function messages(){
        return [
            'full_name.required'=> "Name cannot be empty!",
            'full_name.min'=> "At least 3 characters are required for Name!",
            'full_name.max'=> "At most 30 characters for Name!",

            'user_name.required'=> "User Name cannot be empty!",
            'user_name.min'=> "At least 3 characters are required for User Name!",
            'user_name.max'=> "At most 30 characters  for User Name!",

            'password.required'=> "Password cannot be empty!",
            'password.min'=> "At least 3 characters are required for Password!",
            'password.max'=> "At most 20 characters for Password!",

            'confirm_passwor.required'=> "Confirm Password cannot be empty!",
            'confirm_password.min'=> "At least 3 characters are required  for Confirm Password!",
            'confirm_password.max'=> "At most 20 characters for Confirm Password!",

            'phone.required'=> "Phone cannot be empty!",
            'phone.min'=> "At least 11 digits are required for Phone!",
            'phone.max'=> "At most 11 characters for Phone!",

            'address.required'=> "Address cannot be empty!",
            'address.min'=> "At least 3 charatcters are required for Address!",
            'address.max'=> "At most 100 characters for Address!",

            'company_name.required'=> "Company name cannot be empty!",
            'company_name.min'=> "At least 11 characters are required for Company name.!",
            'company_name.max'=> "At most 100 characters for Company Name!",

            'city.required'=> "City cannot be empty!",
            'city.min'=> "At least 3 characters are required for City!",
            'city.max'=> "At most 100 characters for City!",

            'email.required'=> "Email cannot be empty!",
            'email.min'=> "At least 10 characters are required for Email!",
            'email.max'=> "At most 50 characters for Email!",
        ];
    }
}