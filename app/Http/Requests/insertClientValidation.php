<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class insertClientValidation extends FormRequest
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
            'password' => 'required|min:8, max:20',
            'phone' => 'required|min:11, max:11',
            'address' => 'required|min:2, max:100',            
            'city' => 'required|min:3, max:100',
            'country' => 'required|min:10, max:50',
            'website' => 'required|min:7, max:50',
            'billing_state' => 'required|min:2, max:50',
            'billing_city' => 'required|min:2, max:50',
            'billing_zip' => 'required|min:4, max:6',
            'billing_country' => 'required|min:2, max:50',
            'email' => 'required|min:10, max:50',
        ];
    }
}