<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValidClientIds;

// validation for company update and create
class CompanyRequest extends FormRequest
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
            'name' => 'required|string|min:3|max:100',
            'director' => 'required|string|min:3|max:100',
            'founded_at' => 'required|date',
            'clients' => ['nullable', 'string', 'regex:/^(\d*,\s)*\d*$/u', new ValidClientIds]
        ];
    }
}
