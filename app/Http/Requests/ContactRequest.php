<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'notes' => 'required',
            'birthday' => 'required',
            'website' => 'required',
            'company' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is required',
            'notes.required' => 'Notes is required',
            'birthday.required' => 'Birthday is required',
            'website.required' => 'Website is required',
            'company.required' => 'Company is required'
        ];
    }
}
