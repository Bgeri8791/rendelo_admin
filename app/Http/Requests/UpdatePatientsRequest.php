<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePatientsRequest extends FormRequest
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
        $patientId = $this->route('patient')?->id;
        return [
            'id_number'  => [
                'required',
                'string',
                'max:50',
                Rule::unique('patients', 'id_number')->ignore($patientId),
            ],
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'id_type' => 'required|string|in:TAJ,PASSPORT,PERSONAL_ID',
            'email' => 'nullable|email|max:150',
            'phone' => 'nullable|string|max:50',
            'birth_date' => 'nullable|date',
            'is_active' => 'required|boolean',
        ];
    }
}
