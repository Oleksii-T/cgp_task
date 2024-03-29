<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValidCompanyIds;

//validaiton of client creating
class CreateClientRequest extends FormRequest
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
            'email' => 'required|email|min:3|max:255|unique:clients,email',
            'phone' => 'required|string|size:12|regex:/^\+\d*$/u',
            'companies' => ['nullable', 'string', 'regex:/^(\d*,\s)*\d*$/u', new ValidCompanyIds]
        ];
    }
}
