<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateProposalValidation extends FormRequest
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
            'title' => 'required|min:3|max:30',
            'subject' => 'required|min:11|max:100',
            'body' => 'required|min:3|max:100',            
            'customer_name' => 'required|min:3|max:100',
            'starting_date' => 'required',
            'deadline_date' => 'required',
            'address' => 'required|min:2|max:50',
            'city' => 'required|min:2, max:50',
            'state' => 'required|min:2|max:50',
            'country' => 'required|min:2|max:50',
            'zip_code' => 'required|min:2|max:50',
            'email' => 'required|min:2|max:50',
            'phone' => 'required|min:11|max:11',
            'item' => 'required',
            'country' => 'required|min:2|max:50',
            'quantity' => 'required',
            'rate' => 'required',
            'status' => 'required',
        ];
    }
}