<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValidCompanyIds;

class CreateClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (auth()->user()) {
            return true;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {//Rule::unique('clients')->ignore($model)
        return [
            'name' => 'required|string|min:3|max:100',
            'email' => ['required', 'email', 'min:3', 'max:255'],
            'phone' => 'required|string|size:12|regex:/^\+\d*$/u',
            'companies' => ['nullable', 'string', 'regex:/^(\d*,\s)*\d*$/u', new ValidCompanyIds]
        ];
    }
}