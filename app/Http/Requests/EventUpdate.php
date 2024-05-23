<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventUpdate extends FormRequest
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
            'event_name' => ['required', 'string', 'max:255'],
            'event_website' => ['required', 'string', 'max:255'],
            'event_year' => ['required', 'string', 'max:25'],
            'no_of_exhibitors' => ['required', 'string', 'max:12'],
        ];
    }
}
