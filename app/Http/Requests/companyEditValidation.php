<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class companyEditValidation extends FormRequest
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
            'company_name' => 'required|min:3, max:30',
            'contact_number' => 'required|min:11, max:11',
            'company_address' => 'required|min:11, max:100',            
            'type' => 'required|min:3, max:100',
        ];
    }
}