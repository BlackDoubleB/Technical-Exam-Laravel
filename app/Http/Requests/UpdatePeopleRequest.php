<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePeopleRequest extends FormRequest
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
            'first_name' => ['sometimes', 'string', 'max:255'],
            'last_name'  => ['sometimes', 'string', 'max:255'],
            'dni_id'     => [
                'sometimes',
                'string',
                'max:255',
                Rule::unique('people', 'dni_id')->ignore($this->route('person'))
            ],
            'email'      => [
                'sometimes',
                'email',
                'max:255',
                Rule::unique('people', 'email')->ignore($this->route('person'))
            ],
            'area_id'    => ['sometimes', 'exists:areas,id'],
        ];
    }
}
