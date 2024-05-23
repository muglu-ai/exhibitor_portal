<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExhibitorRequest extends FormRequest
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
            //
            'exhibitor_name' => 'required|string|max:255',
            'fas_name' => 'required|string|max:255',
            'cp_title' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'cp_design' => 'required|string|max:255',
            'org_add' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'zip' => 'required|string|max:255',
            'email' => 'required|email|unique:exhibitors|max:255',
            'con_number' => 'required|string|max:255',
            'profile' => 'required|string',
            'exhibitor_id' => 'required|string|max:255',

            // 'captcha' => 'required|captcha',
        ];
    }
}
