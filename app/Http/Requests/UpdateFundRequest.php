<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFundRequest extends FormRequest
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
            'name' => 'sometimes|nullable|string',
            'start_year' => 'sometimes|nullable|integer',
            'fund_manager_id' => 'sometimes|nullable|integer',
            'companies' => 'sometimes|nullable|array',
            'aliases' => 'sometimes|nullable|array'
        ];
    }
}
