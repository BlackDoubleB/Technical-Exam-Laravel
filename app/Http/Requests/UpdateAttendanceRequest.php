<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAttendanceRequest extends FormRequest
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
            'person_id' => ['sometimes', 'exists:people,id'],
            'date' => ['sometimes', 'date'],
            'status' => [
                'sometimes',
                Rule::in(['Presente', 'Falta', 'Tardanza', 'Permiso'])
            ],
        ];
    }
}
